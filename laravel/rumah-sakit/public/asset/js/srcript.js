function GanjilGenap(number=0){
  if (number%2 !==0) {
    return true
  }
}
document.addEventListener("DOMContentLoaded",()=>{
  var swiper = new Swiper(".homeswiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    freeMode: true,
          autoplay: {
            delay: 1000,
            disableOnInteraction: true,
          },
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 25,
      stretch: 0,
      depth: 600,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
  });
        var swiper = new Swiper(".mySwiper4", {
          slidesPerView: 4,
          spaceBetween: 30,
          centeredSlides: true,
          freeMode: true,
          autoplay: {
            delay: 900,
            disableOnInteraction: true,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
        VanillaTilt.init(document.querySelectorAll(".content_spesialis .card"), {
          max: 30,
          speed: 2000,
          scale:1.1
      });
        var swiper = new Swiper(".mySwiper", {
            direction: "vertical",
            slidesPerView: "auto",
            freeMode: true,
            scrollbar: {
                el: ".swiper-scrollbar",
            },
            mousewheel: true,
        });
        VanillaTilt.init(document.querySelectorAll(".spesialisasi .card"), {
            max: 30,
            speed: 2000,
            scale:1.1
        });
        var swiper = new Swiper(".mySwiper1", {
            effect: "coverflow",
            grabCursor: true,
            autoplay: {
              delay: 2500,
              disableOnInteraction: false,
            },
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
              rotate: 25,
              stretch: 0,
              depth: 300,
              modifier: 1,
              slideShadows: true,
            },
            pagination: {
              el: ".swiper-pagination",
            },
          });
          var swiper = new Swiper(".mySwiper2", {
            slidesPerView: 1,
            spaceBetween: 10,
            grabCursor: true,
            freeMode: true,
            autoplay: {
              delay: 1800,
              disableOnInteraction: false,
            },
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
          });
          const provinceSelect = document.getElementById('provinceSelect');
          const citySelect = document.getElementById('citySelect');

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
    });
    document.addEventListener("DOMContentLoaded",()=>{
      let click = 0;
      const loginbox = document.querySelector(".loginbox");
      const registerbox = document.querySelector(".registerbox");
      const btn = document.querySelector(".btnlogin");
      const question = document.querySelector("#question");
      btn.addEventListener("click", () => {
        click += 1;
        if (GanjilGenap(click)) {
          loginbox.classList.add("animate__animated", "animate__backOutUp");
          setTimeout(() => {
            loginbox.classList.remove("d-flex");
            loginbox.classList.add("d-none");
            registerbox.classList.remove("d-none");
            registerbox.classList.add("d-flex");
            question.innerHTML = "Sudah Punya Akun?";
            btn.innerHTML = "Sign In";
            loginbox.classList.remove("animate__animated", "animate__backOutUp");
          }, 600);
        } else {
          registerbox.classList.add("animate__animated", "animate__bounceOutDown");
          setTimeout(() => {
          registerbox.classList.remove("d-flex");
          registerbox.classList.add("d-none");
          loginbox.classList.remove("d-none");
          loginbox.classList.add("d-flex");
          question.innerHTML = "Belum Punya Akun?";
          btn.innerHTML = "Sign Up!";
          registerbox.classList.remove("animate__animated", "animate__bounceOutDown");
        },900);
      }
      });

});
document.addEventListener("DOMContentLoaded", () => {
  const Showbtn = document.querySelector('#password');
  const password = document.querySelector("#passwordfild");
  let clickCount = 0;
  
  Showbtn.addEventListener("click", () => {
    if (GanjilGenap(clickCount)) {
      password.type = "text";
      Showbtn.classList.remove("bi-eye-slash-fill");
      Showbtn.classList.add("bi-eye");
    } else {
      password.type = "password";
      Showbtn.classList.remove("bi-eye");
      Showbtn.classList.add("bi-eye-slash-fill");
    }
    clickCount += 1;
  });
});

    