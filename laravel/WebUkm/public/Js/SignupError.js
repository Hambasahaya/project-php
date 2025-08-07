
    document.addEventListener('DOMContentLoaded', function() {
        let imgbox = document.querySelector('.sign .row .img-form img');
        let signbox = document.querySelector('.sign .row .sign-in');
        let signupbox = document.querySelector('.sign .row .signup');
        let signupbtn = signbox.querySelector('#signup');
        let signinpbtn = signupbox.querySelector('.sign .row .signup #sign');
        let statusform = true;

        const tl = gsap.timeline({
            onComplete: () => {
                imgbox.classList.add('heigtup');
                signupbox.classList.add('upz');
            }
        });

        signbox.classList.remove("d-flex");
        signbox.classList.add("d-none");
        signupbox.classList.remove("d-none");
        signupbox.classList.add('d-flex');

        tl.to(imgbox, {
            x: 658,
            duration: 2
        });
        tl.to(signupbox, {
            x: -629,
            duration: 2
        });
    });
