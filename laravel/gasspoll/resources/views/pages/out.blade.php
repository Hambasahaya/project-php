@extends("layout.header")
@section("content")

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="carts-pages d-flex">
    <div class="carts d-flex flex-column">
        <h4>ChekOut</h4>
        <div class="cart-btn d-flex flex-column">
            <div class="mb-3">
                <div class="form-floating">
                    <textarea class="form-control" id="address" placeholder="Leave a comment here" style="height: 100px" required></textarea>
                    <label for="address">Alamat lengkap/Patokan</label>
                </div>
            </div>
            <div class="mb-3">
                <select id="provinceSelect" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                    <option selected>Provinsi</option>
                </select>
            </div>
            <div class="mb-3">
                <select id="citySelect" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                    <option selected>Kota/kabupaten</option>
                </select>
            </div>
            <div class="mb-3">
                <select id="shippingSelect" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                    <option selected>Pilih Pengiriman</option>
                </select>
            </div>

        </div>
        @foreach($data_cart as $data)
        <div class="carts-produk">
            <div class="mb-3 form-check">
                <label class="form-check-label">{{$data->produk->nama_produk}}</label>
            </div>
            <div class="carts-detail d-flex">
                <div class="carts-img d-flex">
                    <img src="{{ asset('storage/imgPrd/' . $data->produk->foto) }}" alt="">
                </div>
                <div class="carts-deskirpsi d-flex">
                    <p></p>
                </div>
                <div class="produk-pricee d-flex">
                    <h4>Rp.{{number_format($data->produk->harga)}}</h4>
                </div>
            </div>
            <div class="carts-act d-flex">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end align-items-baseline">
                    <p>Subtotal: Rp.{{number_format($data->subtotal)}}</p>
                    <label for="">Qty</label>
                    <input type="text" class="form-control qty-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" width="20px" value="{{$data->qty}}" readonly>
                </div>
            </div>
        </div>
        @php
        $totals += $data->subtotal;
        @endphp
        @endforeach
    </div>
    <div class="ringkasan d-flex flex-column">
        <h4>Ringksan Belanja</h4>
        <p id="totalsk"></p>
        <h5 id="totals">Total Belanja:Rp.{{ number_format($totals)}}</h5>
        <button id="checkoutButton_final" class="btn btn-primary chekouts" type="button">Checkout</button>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number.toFixed(2)).replace(",00", "");
        }
        let total_belanja = 0
        const provinceSelect = document.getElementById('provinceSelect');
        const citySelect = document.getElementById('citySelect');
        const shippingSelect = document.getElementById('shippingSelect');
        const totalsElement = document.getElementById('totals');
        const totalskElement = document.getElementById('totalsk');
        const checkoutButton = document.getElementById('checkoutButton_final');
        const addressElement = document.getElementById('address');

        function fetchData(url, callback) {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.rajaongkir && data.rajaongkir.results) {
                        callback(data.rajaongkir.results);
                    } else {
                        console.error('Invalid response format:', data);
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        // Load provinces when the page loads
        fetchData('/provinces', (results) => {
            provinceSelect.innerHTML = '<option selected>Provinsi</option>';
            results.forEach(province => {
                const option = document.createElement('option');
                option.text = province.province;
                option.value = province.province_id;
                provinceSelect.add(option);
            });
        });

        provinceSelect.addEventListener('change', () => {
            const selectedProvinceId = provinceSelect.value;
            fetchData(`/cities?province_id=${selectedProvinceId}`, (results) => {
                citySelect.innerHTML = '<option selected>Kota/kabupaten</option>';
                results.forEach(city => {
                    const option = document.createElement('option');
                    option.text = city.city_name;
                    option.value = city.city_id;
                    citySelect.add(option);
                });
            });
        });

        citySelect.addEventListener('change', () => {
            cost();
        });

        function cost() {
            const selectedProvinceId = provinceSelect.value;
            const selectedCityId = citySelect.value;
            const weight = 120; // weight in grams

            fetch('/shipping-cost', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        destination: selectedCityId,
                        weight: weight
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data && data.length) {
                        shippingSelect.innerHTML = '<option selected>Pilih Pengiriman</option>';
                        data.forEach(cost => {
                            const option = document.createElement('option');
                            option.text = `${cost.service} - Rp.${cost.cost[0].value}`;
                            option.value = cost.cost[0].value;
                            shippingSelect.add(option);
                        });
                    } else {
                        console.error('Invalid response format for shipping cost:', data);
                    }
                })
                .catch(error => {
                    console.error('Error getting shipping cost:', error);
                    alert('Terjadi kesalahan saat mengambil data biaya pengiriman.');
                });
        }

        shippingSelect.addEventListener('change', () => {
            updateTotal();
        });

        function updateTotal() {
            const shippingCost = parseFloat(shippingSelect.value);
            if (!isNaN(shippingCost)) {
                total_belanja = shippingCost + parseFloat("{{$totals}}");
                totalskElement.textContent = "Total Ongkos Kirim: Rp." + shippingCost;
                totalsElement.textContent = `Total Belanja:${rupiah(total_belanja)}`;
            } else {
                console.error('Invalid shipping cost format:', shippingSelect.value);
                alert('Terjadi kesalahan pada biaya pengiriman.');
            }
        }

        checkoutButton.addEventListener('click', () => {
            const address = addressElement.value;
            const province = provinceSelect.selectedOptions[0].text;
            const city = citySelect.selectedOptions[0].text;
            const shippingValue = shippingSelect.value;
            const shippingText = shippingSelect.selectedOptions[0].text;
            const total = total_belanja
            if (address === "" || province === "" || city === "" || shippingValue === "" || shippingText === "") {
                Swal.fire({
                    position: "top-center",
                    icon: "error",
                    title: "Periksa Alamat Pengiriman barang!",
                    showConfirmButton: true,
                    timer: 2500
                });
            } else {
                fetch('/chekout_proses', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            address: address,
                            province: province,
                            city: city,
                            shippingv: shippingValue,
                            shipping: shippingText,
                            total: total
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.redirect) {
                            document.write(data.redirect);
                            if (data.pdfUrl != null) {
                                link.download = 'receipt.pdf';
                                document.body.appendChild(link);
                                link.click();
                                document.body.removeChild(link);
                            }
                        } else {
                            alert('Gagal mendapatkan snapToken dari server');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat mengirim permintaan ke server');
                    });
            }
        });
    });
</script>
@endsection