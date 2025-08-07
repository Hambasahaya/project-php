window.addEventListener('DOMContentLoaded', () => {
  
    const authcontainer = document.querySelector('.auth');
    const btnRegister = document.querySelector('#btnregister');
    const btnLoginBack = document.querySelector('#btnloginback');
    const togglePasswordButton = document.querySelectorAll('#togglePassword');
    const loginform = document.querySelector('.login');
    const registerform = document.querySelector('.register');
    const col1 = document.querySelector('#col1');
    const col2 = document.querySelector('#col2');
    const col3 = document.querySelector('#col3');
    const fotouser= document.querySelector("foto_user")
    const showRegisterForm = () => {
        col1.classList.add('d-none');
        col3.classList.remove('d-none');
        col2.classList.add('swapped');
        col3.classList.add('swapped');
    };
    if (fotouser) {
     fotouser.addEventListener("change", (event)=> {
      const file = event.target.files[0];
      if (file) {
          const reader = new FileReader();
  
          reader.onload = (e) =>{
              const preview = document.getElementById("preview");
              preview.src = e.target.result;
              preview.style.display = "block"; 
          };
  
          reader.readAsDataURL(file);
      }
  }); 
    }
    const showLoginForm = () => {
        col1.classList.remove('d-none');
        col3.classList.add('d-none');
        col2.classList.remove('swapped');
        col3.classList.remove('swapped');
    };
    btnRegister.addEventListener('click', () => {
        showRegisterForm();
    });
    btnLoginBack.addEventListener('click', () => {
        showLoginForm();
    });

    if (registerform.classList.contains('error-active')) {
        showRegisterForm();
    } 
    else if (loginform.classList.contains('error-active')) {
        showLoginForm();
    }
    togglePasswordButton.forEach(button => {
        button.addEventListener('click', function () {
            const container = button.closest('.password-container');
            const input = container.querySelector('#passwordInput');
            const icon = button.querySelector('i');
    
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi', 'bi-eye-slash-fill');
                icon.classList.add('bi', 'bi-eye-fill');
            } else {
                input.type = 'password';
                icon.classList.remove('bi', 'bi-eye-fill');
                icon.classList.add('bi', 'bi-eye-slash-fill');
            }   
        });
    });
});
