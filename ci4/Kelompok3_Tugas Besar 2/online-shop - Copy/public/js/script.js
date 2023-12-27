
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.send-data');
    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/add_cart', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 400) {
                    console.log("Data berhasil dikirim");
                } else {
                    console.error("Gagal mengirim data: " + xhr.responseText);
                }
            };
            const data = 'prd=' + encodeURIComponent(productId);
            console.log(productId);
            xhr.send(data);
        });
    });
    
});
