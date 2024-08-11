document.addEventListener("DOMContentLoaded", function() {
  const boxlogin = document.querySelectorAll(".form-login");
  const addToCartButtons = document.querySelectorAll('.addtocart');

  // Throttling function
  function throttle(func, limit) {
      let inThrottle;
      return function() {
          const context = this;
          const args = arguments;
          if (!inThrottle) {
              func.apply(context, args);
              inThrottle = true;
              setTimeout(() => inThrottle = false, limit);
          }
      };
  }

  boxlogin.forEach(element => {
      const regisbtn = element.querySelector("#registers");
      const loginbtn = element.querySelector("#login");
      const loginForm = element.querySelector("#loginf");
      const forget = element.querySelector("#forgets");
      const formRegister = element.querySelector("#register");
      const hform = element.querySelector("#hform");
      
      regisbtn.addEventListener("click", () => {
          loginForm.style.display = "none";
          formRegister.style.display = "flex";
          hform.textContent = "REGISTER";
      });

      loginbtn.addEventListener("click", () => {
          formRegister.style.display = "none";
          hform.textContent = "login";
          loginForm.style.display = "flex";
      });

      forget.addEventListener("click", () => {
          Swal.fire({
            title: "Check Your Email!",
            html: `
              <input id="email" class="swal2-input" placeholder="Email" type="email" autocapitalize="off">
              <input id="password" class="swal2-input" placeholder="New Password" type="password" autocapitalize="off">
            `,
            showCancelButton: true,
            confirmButtonText: "Look up",
            showLoaderOnConfirm: true,
            preConfirm: async () => {
              const email = document.getElementById('email').value;
              const newPassword = document.getElementById('password').value;
              try {
                const emailUrl = `/changepassword`;
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const response = await fetch(emailUrl, {
                  method: 'POST',
                  body: JSON.stringify({ 
                    email, 
                    newPassword,
                    _token: csrfToken
                  }),
                  headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': csrfToken 
                  }
                });
                if (!response.ok) {
                  throw new Error(`${response.status} - ${response.statusText}`);
                }
                return response.json();
              } catch (error) {
                throw new Error(`Request failed: ${error}`);
              }
            },
            allowOutsideClick: () => !Swal.isLoading()
          }).then(async (result) => {
            if (result.isConfirmed) {
              if (result.value.message === "berhasil merubah password") { // Menyesuaikan kondisi dengan pesan yang dikembalikan oleh controller
                Swal.fire({
                  icon: 'success',
                  title: 'Password Changed Successfully!',
                  text: 'Your password has been changed successfully.'
                });
              } else { // Email tidak ditemukan atau ada kesalahan lain
                throw new Error('Failed to change password');
              }
            }
          }).catch((error) => {
            Swal.fire({
              icon: 'error',
              title: 'Request Failed',
              text: error.message
            });
          });
        });
  });

  // Add throttled event listener to each "Add to Cart" button
  addToCartButtons.forEach(button => {
      const throttledClick = throttle((event) => {
          let id_produk = button.getAttribute("data-id_produk");
          let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          let xhr = new XMLHttpRequest();
          let url = '/add-to-cart';
          let params = 'id_produk=' + id_produk + '&_token=' + csrfToken;
          xhr.open('POST', url, true);
          xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          
          xhr.onload = function() {
              if (xhr.status == 200) {
                  Swal.fire({
                      position: "top-end",
                      icon: "success",
                      title: "Produk di tambahkan ke keranjang",
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
      }, 500);

      button.addEventListener("click", throttledClick);
  });
  const rupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(number.toFixed(2)).replace(",00", "");
  }
  const plusButtons = document.querySelectorAll('.bi-plus-circle-fill');
  const minusButtons = document.querySelectorAll('.bi-dash-circle-fill');
  const qtyInputs = document.querySelectorAll('.qty-input');
  const productIds = document.querySelectorAll('.product-id');

  const produkStokElement = document.querySelector('.produk-stok');
  const stok = produkStokElement ? produkStokElement.getAttribute('data-stok') : null;

  if (stok && parseInt(stok) > 0) {
      plusButtons.forEach(function(button, index) {
          button.addEventListener('click', function() {
              qtyInputs[index].value = parseInt(qtyInputs[index].value) + 1;
              sendQtyAndProductIdToUrl(qtyInputs[index].value, productIds[index].value);
              calculateTotal();
          });
      });

      minusButtons.forEach(function(button, index) {
          button.addEventListener('click', function() {
              qtyInputs[index].value = Math.max(parseInt(qtyInputs[index].value) - 1, 1);
              sendQtyAndProductIdToUrl(qtyInputs[index].value, productIds[index].value);
              calculateTotal();
          });
      });
  }

  function sendQtyAndProductIdToUrl(qty, productId) {
      const url = '/update-qty';
      const formData = new FormData();
      formData.append('qty', qty);
      formData.append('id_produk', productId);
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      const headers = new Headers();
      headers.append('X-CSRF-TOKEN', csrfToken);

      // Kirim permintaan POST menggunakan fetch API dengan header yang disetel
      fetch(url, {
          method: 'POST',
          headers: headers,
          body: formData
      })
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          return response.json();
      })
      .then(data => {
          console.log('Qty and productId sent successfully:', data);
      })
      .catch(error => {
          console.error('Error sending qty and productId:', error);
          // Tangani kesalahan jika diperlukan
      });
  }

  const selectAllCheckbox = document.getElementById('exampleCheck1');
  if (selectAllCheckbox) {
      selectAllCheckbox.addEventListener('change', function() {
          const checkboxes = document.querySelectorAll('.product-checkbox');
          checkboxes.forEach(function(checkbox) {
              checkbox.checked = selectAllCheckbox.checked;
          });
          calculateTotal();
      });
  }

  const productCheckboxes = document.querySelectorAll('.product-checkbox');
  productCheckboxes.forEach(function(checkbox) {
      checkbox.addEventListener('change', function() {
          calculateTotal();
      });
  });

  function calculateTotal() {
      const checkboxes = document.querySelectorAll('.product-checkbox');
      let total = 0;
      checkboxes.forEach(function(checkbox) {
          if (checkbox.checked) {
              const parent = checkbox.closest('.carts-produk');
              const priceElement = parent.querySelector('.produk-pricee h4');
              const priceString = priceElement.innerText.replace('Rp.', '').replace(',', '');
              const price = parseFloat(priceString);
              const qtyInput = parent.querySelector('.qty-input');
              const qty = parseFloat(qtyInput.value);
              total += price * qty;
          }
      });
      document.getElementById('total').innerText = 'Total: Rp.' +rupiah(total);
  }

  function sendSelectedProducts() {
      const checkboxes = document.querySelectorAll('.product-checkbox');
      const selectedProducts = [];
      checkboxes.forEach(function(checkbox) {
          if (checkbox.checked) {
              const parent = checkbox.closest('.carts-produk');
              const cartId = parent.querySelector('.product-id').value;
              selectedProducts.push({                 
                  cartId: cartId,
              });
          }
      });
      let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      let formData = new FormData();
      formData.append('_token', csrfToken);
      formData.append('selectedProducts', JSON.stringify(selectedProducts));

      let xhr = new XMLHttpRequest();
      let url = '/checkout';
      xhr.open('POST', url, true);

      xhr.onload = function() {
          if (xhr.status == 200) {
              console.log(xhr.responseText);
          } else {
              console.error('Request failed. Status: ' + xhr.status);
          }
      };

      xhr.onerror = function() {
          console.error('Request failed. Network error.');
      };
      xhr.send(formData);
  }

  const checkoutButton = document.getElementById('checkoutButton');

  if (checkoutButton) {
      checkoutButton.addEventListener('click', function() {
          sendSelectedProducts();
          window.location = "/checkout";
      });
  }

  function onSubmit(token) {
      document.getElementsByTagName("form")[0].submit();
  }
  const searchInput = document.getElementById('search-input');
  const searchForm = document.getElementById('search-form');
  const cards = document.querySelectorAll('.card');

  searchForm.addEventListener('keyup', function(event) {
      event.preventDefault();
      const query = searchInput.value.toLowerCase();

      cards.forEach(card => {
          const title = card.querySelector('.card-title').textContent.toLowerCase();
          const category = card.querySelector('.card-text').textContent.toLowerCase();

          if (title.includes(query) || category.includes(query)) {
              card.style.display = 'block';
          } else {
              card.style.display = 'none';
          }
      });
  });

  
  
});
