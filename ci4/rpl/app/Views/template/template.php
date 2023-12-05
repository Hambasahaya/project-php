<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UKM PENCAK SILAT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins&display=swap" rel="stylesheet">

</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"> <img src="/img/logo1.png" alt="" srcset="" width="90vh" height="90vh" class="rounded">Pencak Silat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse p-8" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto ">
                    <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    <a class="nav-link" href="#about">About</a>
                    <a class="nav-link" href="#pres">prestasi</a>
                    <a class="nav-link" href="#pendaftaran">Pendaftaran</a>
                </div>
            </div>
        </div>
    </nav>
    <?= $this->renderSection('home') ?>
    <?= $this->renderSection('about') ?>
    <?= $this->renderSection('pres') ?>
    <?= $this->renderSection('pendaftaran') ?>
    <!-- footer -->
    <div class="footer">
        <div class="logo-socialmedia">
            <a href=""><i class="bi bi-instagram" style="font-size: 2rem; color: pink"></i></a>
            <a href=""><i class="bi bi-youtube" style="font-size: 2rem; color: red"></i></a>
            <a href=""><i class="bi bi-whatsapp" style="font-size: 2rem; color: green"></i></a>
        </div>
        <div class="copyringht">
            <h4><i class="bi bi-c-circle" style="font-size: 1.5rem;"></i> Pencak Silat UMB - All Rights Reserved</h4>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });

        // cheking input
        let nimInput = document.querySelector('#nim');
        let noInput = document.querySelector("#no");
        let pesanNim = document.querySelector("#cheknim");
        let pesanNo = document.querySelector("#chkno");
        let btnDaftar = document.querySelector("#btn-daftar");

        let emailchek = document.querySelector('#email')

        let pesanemail = document.querySelector('#emailchek');
        let cheking = [];
        nimInput.addEventListener('input', () => {
            if (nimInput.value.length == 11) {
                cheking[0] = true;
                pesanNim.innerHTML = '';
            } else {
                cheking[0] = false;
                pesanNim.innerHTML = 'masukan nim yang valid!'
                pesanNim.style.color = 'red';
            }
            updateBtnDaftar();
        });


        function isValidEmail(email) {
            // Pola regex untuk validasi email
            var emailRegex = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
            return emailRegex.test(email);
        }
        emailchek.addEventListener('input', () => {
            if (isValidEmail(emailchek.value) == true) {
                cheking[0] = true;
                pesanemail.innerHTML = '';
            } else {
                cheking[0] = false;
                pesanemail.innerHTML = 'masukan email yang valid!';
                pesanemail.style.color = 'red';
            }
            updateBtnDaftar();
        });


        noInput.addEventListener('input', () => {
            if (noInput.value.length >= 12 && noInput.value.length <= 14) {
                cheking[1] = true;
                pesanNo.innerHTML = '';
            } else {
                cheking[1] = false;
                pesanNo.innerHTML = 'masukan nomor telfon yang falid'
                pesanNo.style.color = 'red';
            }
            updateBtnDaftar();
        });

        function updateBtnDaftar() {
            if (cheking[0] == false || cheking[1] == false) {
                btnDaftar.style.display = "none";
            } else {
                btnDaftar.style.display = 'flex';
            }
        }
        let fakultas = document.querySelector("#fakultas");
        let jurusanDropdown = document.querySelector("#jurusan");
        fakultas.addEventListener("change", () => {
            if (fakultas.value !== "") {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "/getdata/" + fakultas.value, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            let jurusanData = JSON.parse(xhr.responseText);
                            jurusanDropdown.innerHTML = "";
                            jurusanData.forEach(function(jurusan) {
                                var option = document.createElement("option");
                                option.textContent = jurusan.nama_jurusan;
                                option.value = jurusan.id_jurusan;
                                jurusanDropdown.appendChild(option);
                            });
                        } else {
                            console.error("Terjadi kesalahan dalam permintaan AJAX.");
                        }
                    }
                };
                xhr.send();
            }
        });
        // input nama chek
    </script>
</body>

</html>