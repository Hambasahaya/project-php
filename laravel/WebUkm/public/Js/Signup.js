document.addEventListener("DOMContentLoaded", () => {
    let navbar = document.querySelector('.navbar');
    let imgbox=document.querySelector('.sign .row .img-form img')
    let signbox=document.querySelector('.sign .row .sign-in')
    let signupbox=document.querySelector('.sign .row .signup')
    let signupbtn=signbox.querySelector('#signup')
    let signinpbtn=signupbox.querySelector('.sign .row .signup #sign')
    let statusform=true

    let tl= gsap.timeline()
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 1) {
            navbar.classList.add('navbar-scroll');
        } else {
            navbar.classList.remove('navbar-scroll');
        }
    });
    signupbtn.addEventListener("click", () => {
        if (statusform === true) {
          const tl = gsap.timeline({
            onComplete: () => {
              imgbox.classList.add('heigtup')
              signupbox.classList.add('upz')
              
            }
        });
          signbox.classList.remove("d-flex");  
          signbox.classList.add("d-none");    
          signupbox.classList.remove("d-none");
          signupbox.classList.add('d-flex');
          tl.to(imgbox, { x: 658, duration: 2 });
          tl.to(signupbox, { x: -629, duration: 2 });
          statusform = false;
        }
      });
      
      signinpbtn.addEventListener('click', () => {
        if (statusform === false) {
          
          imgbox.classList.remove('heigtup')
          signbox.classList.remove("d-none");
          signbox.classList.add("d-flex");
          signupbox.classList.remove("d-flex");
          signupbox.classList.add('d-none');
          tl.to(imgbox, { x: -0, duration: 2 });
          statusform = true;
        }
      });
});
