<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Singgle Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <div class="single-page">
    <div class="image-produk">
      <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
        <div class="swiper-wrapper">
          <?php foreach ($data_prd as $img) : ?>
            <?php
            $data_img = explode(",", $img['photo_prd']);
            ?>
            <?php for ($i = 0; $i < sizeof($data_img); $i++) : ?>
              <div class="swiper-slide">
                <img src="<?= $data_img[$i] ?>" />
              </div>
            <?php endfor; ?>
          <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
      <div class="img-thumb">
        <div thumbsSlider="" class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php foreach ($data_prd as $img) : ?>
              <?php
              $data_img = explode(",", $img['photo_prd']);
              ?>
              <?php for ($i = 0; $i < sizeof($data_img); $i++) : ?>
                <div class="swiper-slide">
                  <img src="<?= $data_img[$i] ?>" />
                </div>
              <?php endfor; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="produk-details">
      <?php foreach ($data_prd as $dataa) : ?>
        <div class="produk-name">
          <?= $dataa['name_product'] ?>
        </div>
        <div class="produk-descprip">
          <?= $dataa['description'] ?>
        </div>
        <div class="produk-descprip">
          Stok:<?= $dataa['stok'] ?>
        </div>
        <div class="produk-descprip">
          price:<?= number_format($dataa['price']) ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    var mySwiper = new Swiper(".mySwiper", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });

    var mySwiperThumbs = new Swiper(".mySwiper2", {
      loop: true,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: mySwiper, // Use the correct variable name here
      },
    });
  </script>

</body>

</html>