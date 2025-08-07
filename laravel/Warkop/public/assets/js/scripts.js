window.addEventListener('DOMContentLoaded', event => {
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function calculateTotal() {
        let totalPrice = 0;
        let totalItems = 0;
        document.querySelectorAll('.row').forEach(row => {
            const quantityInput = row.querySelector('input[name="quantity[]"]');
            const priceElement = row.querySelector('.col-md-3.col-lg-2.col-xl-2.offset-lg-1 h6');
            if (quantityInput && priceElement) {
                const quantity = parseInt(quantityInput.value) || 0;
                const price = parseInt(priceElement.innerText.replace('Rp. ', '').replace(/\./g, '')) || 0;

                totalItems += quantity;
                totalPrice += quantity * price;
            }
        });
        document.querySelector('#total-items').innerText = `${totalItems} items`;
        document.querySelector('#total-price').innerText = 'Rp. ' + totalPrice.toLocaleString();
    }
    function updateQuantity(productId, quantity) {
        fetch('/update-cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update total items dan total price dari data backend
                document.querySelector('#total-items').innerText = `${data.total_items} items`;
                document.querySelector('#total-price').innerText = 'Rp. ' + data.total_price.toLocaleString();
            } else {
                alert('Gagal memperbarui kuantitas. Coba lagi.');
            }
        })
        .catch(error => {
            console.error('Error updating quantity:', error);
            alert('Terjadi kesalahan saat memperbarui kuantitas.');
        });
    }

    document.querySelectorAll('.btn-increment').forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('.row');
            const quantityInput = row.querySelector('input[name="quantity[]"]');
            const productId = row.querySelector('input[name="product_id[]"]').value;
            let quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity;

            updateQuantity(productId, quantity);
        });
    });

    document.querySelectorAll('.btn-decrement').forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('.row');
            const quantityInput = row.querySelector('input[name="quantity[]"]');
            const productId = row.querySelector('input[name="product_id[]"]').value;
            let quantity = Math.max(parseInt(quantityInput.value) );
            quantityInput.value = quantity;
            updateQuantity(productId, quantity);
        });
    });

    // Hitung total saat halaman pertama kali dimuat
    calculateTotal();
    document.querySelector('.btn-pesan').addEventListener('click', function() {
        const selectedProducts = Array.from(document.querySelectorAll('input[name="selected_products[]"]:checked'))
            .map(checkbox => checkbox.value);
            const notes = document.querySelector('input[name="notes"]').value;
        
        if (selectedProducts.length === 0) {
            alert('Pilih produk yang ingin di-checkout.');
            return;
        }
    
        fetch('/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                selected_products: selectedProducts,
                notes: notes
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Pesanan berhasil dibuat!');
                window.location.href = '/thx'; 
            } else {
                alert('Gagal membuat pesanan. Coba lagi.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memproses pesanan.');
        });
    });
    
    
});
