<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12 text-center">
            <h4 class="mb-3 fw-bold">Scanning...</h4>
            <h4 class="mb-3">Scan the QR code to provided</h4>
            <h4 class="mb-3">by your lecturer</h4>
            <div id="qr-reader" class="mx-auto" style="width: 100%; max-width: 400px;"></div>
            <div id="qr-result" class="mt-4"></div>
        </div>
    </div>
</div>

<style>
    #qr-reader {
        aspect-ratio: 1 / 1;
    }

    @media (max-width: 576px) {
        #qr-reader {
            width: 100% !important;
        }
    }
</style>

<script>
    const resultContainer = document.getElementById('qr-result');
    let html5QrcodeScanner;

    let scannerTimeout = setTimeout(resetScanner, 60000);

    function resetScanner() {
        if (html5QrcodeScanner) {
            html5QrcodeScanner.clear().then(() => {
                html5QrcodeScanner.render(onScanSuccess);
            }).catch(err => {
                console.error("Failed to reset scanner", err);
            });
        }
        resultContainer.innerHTML = '';
        scannerTimeout = setTimeout(resetScanner, 60000);
    }

    function onScanSuccess(decodedText, decodedResult) {
        clearTimeout(scannerTimeout);

        html5QrcodeScanner.clear().then(() => {
            submitScan(decodedText);
        }).catch(err => {
            console.error("Failed to clear QR scanner", err);
        });
    }

    function submitScan(qrcode) {
        fetch("{{ route('absen.scan') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    qrcode
                })
            })
            .then(res => res.json())
            .then(data => {
                let status = data?.status || 'error';
                let message = data?.message || 'Terjadi kesalahan saat memproses data.';
                let alertClass = {
                    success: 'success',
                    warning: 'warning',
                    error: 'danger'
                } [status] || 'danger';

                let detail = '';
                if (data?.data) {
                    detail = `
                    <strong>Kelas:</strong> ${data.data.kelas}<br>
                    <strong>Waktu:</strong> ${data.data.waktu}<br>
                    <strong>Keterangan:</strong> ${data.data.keterangan}<br>
                `;
                }

                resultContainer.innerHTML = `
                <div class="alert alert-${alertClass}">
                    <strong>${status.toUpperCase()}:</strong> ${message}<br>
                    ${detail}
                </div>
            `;

                if (status === 'success') {
                    setTimeout(() => {
                        window.location.href = "/absen";
                    }, 30000);
                } else {
                    setTimeout(() => {
                        resetScanner();
                    }, 6000);
                }
            })
            .catch(error => {
                resultContainer.innerHTML = `
                <div class="alert alert-danger">Gagal mengirim data: ${error.message || error}</div>
            `;
                console.error("Fetch error:", error);
                setTimeout(() => {
                    resetScanner();
                }, 6000);
            });
    }

    window.onload = () => {
        html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", {
            fps: 60,
            qrbox: {
                width: 250,
                height: 250
            }
        });
        html5QrcodeScanner.render(onScanSuccess);

        scannerTimeout = setTimeout(resetScanner, 60000);
    };
</script>