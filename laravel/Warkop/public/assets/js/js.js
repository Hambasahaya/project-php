window.addEventListener('DOMContentLoaded', event => {
    const addToCartButtons = document.querySelectorAll('.addtocart');

    // Fungsi Throttle untuk mencegah spam klik pada tombol
    function throttle(func, delay) {
        let lastCall = 0;
        return function(...args) {
            const now = new Date().getTime();
            if (now - lastCall < delay) {
                return;
            }
            lastCall = now;
            return func(...args);
        };
    }

    addToCartButtons.forEach(button => {
        const throttledClick = throttle((event) => {
            let id_produk = button.getAttribute("data-id_produk");
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let xhr = new XMLHttpRequest();
            let url = '/AddToCart';
            let params = 'id_produk=' + id_produk + '&_token=' + csrfToken;
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status == 200) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Produk ditambahkan ke keranjang",
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "Stok Produk Habis!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            };

            xhr.onerror = function() {
                console.error('Request failed. Network error.');
            };

            xhr.send(params);
        }, 500); // Delay 500 ms

        button.addEventListener("click", throttledClick);
    });
});
