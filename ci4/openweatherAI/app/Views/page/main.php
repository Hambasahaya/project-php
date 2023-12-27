<?= $this->extend('template/header'); ?>

<?= $this->Section('main'); ?>
<!-- main content area -->

<main class="main_content">
    <div class="side-left">
        <div class="city d-flex">
            <form action="">
                <div class="mb-3">
                    <input class="form-control form-control-sm city-serch" type="text" placeholder="search for the destination city..." aria-label=".form-control-sm example">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-info">GO!</button>
                </div>
            </form>
        </div>
        <div class="content-suhu">
            <?php
            date_default_timezone_set("asia/jakarta");
            $Time = date('Y-m-d');
            ?>
            <?php
            foreach ($perdays as $day) : ?>
                <?php if ($day["date"] == $Time) : ?>
                    <h4><?= $day["day_name"] ?></h4>
                    <h4><?= $day["date"] ?></h4>
                    <h4><?= intval(round($day["max_temperature"] - 273.15, 1)) ?>°C</h4>
                    <img src="https://openweathermap.org/img/w/<?= $day['icon']; ?>.png" alt="" srcset="">
                    <h4><?= $day["desk"] ?></h4>

                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="card-details">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">feels like</h5>
                    <?php foreach ($perdays as $suhuday) : ?>
                        <?php if ($suhuday["date"] == $Time) : ?>
                            <?php
                            $fls = 0;
                            foreach ($suhuday['felslike'] as $felslike) {
                                $fls += $felslike;
                            }
                            $averageFeelsLike = intval(round($fls / count($suhuday['felslike']) - 273.15, 1));
                            ?>
                            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $averageFeelsLike ?>°C</h6>
                            <?php if ($averageFeelsLike > 29) : ?>
                                <p class="card-text">Terasa sangat panas hari ini.</p>
                            <?php endif; ?>
                            <?php if ($averageFeelsLike < 30 && $averageFeelsLike !== 20) : ?>
                                <p class="card-text">hari yang cukup sejuk</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">humidity</h5>
                    <?php foreach ($perdays as $suhuday) : ?>
                        <?php if ($suhuday["date"] == $Time) : ?>
                            <?php
                            $fls = 0;
                            foreach ($suhuday['humidity'] as $felslike) {
                                $fls += $felslike;
                            }
                            $averageFeelsLike = intval(round($fls / count($suhuday['humidity']), 1));
                            ?>
                            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $averageFeelsLike ?>%</h6>
                            <?php if ($averageFeelsLike > 29) : ?>
                                <p class="card-text">Terasa sangat panas hari ini.</p>
                            <?php endif; ?>
                            <?php if ($averageFeelsLike < 30 && $averageFeelsLike !== 20) : ?>
                                <p class="card-text">hari yang cukup sejuk</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="side-right">
        <div class="card-suhu-hours">
            <h4><i class="bi bi-clock"></i>HOURLY FORECAST</h4>
            <div class="suhu-card d-flex">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($time as $suhu) : ?>
                            <div class="swiper-slide">
                                <h4><?= $suhu["date"] ?></h4>
                                <h4><?= intval(round($suhu["temperature"] - 273.15, 1)) ?>°C</h4>
                                <img src="https://openweathermap.org/img/w/<?= $suhu['icon']; ?>.png" alt="" srcset="">
                                <p><?= $suhu["desk"] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="card-suhu-day">
            <h4><i class="bi bi-clock"></i>5-DAY FORECAST</h4>
            <div class="suhu-card d-flex">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($perdays as $suhu) : ?>
                            <div class="swiper-slide">
                                <h4><?= $suhu["day_name"] ?></h4>
                                <h4><?= $suhu["date"] ?></h4>
                                <h4><?= intval(round($suhu["max_temperature"] - 273.15, 1)) ?>°C</h4>
                                <img src="https://openweathermap.org/img/w/<?= $suhu['icon']; ?>.png" alt="" srcset="">
                                <p><?= $suhu["desk"] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="card-suhu-ai-sugets">
            <h4><i class="bi bi-clock"></i>protection for your body and health</h4>
            <div class="suhu-card d-flex">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">Slide 1</div>
                        <div class="swiper-slide">Slide 2</div>
                        <div class="swiper-slide">Slide 3</div>
                        <div class="swiper-slide">Slide 4</div>
                        <div class="swiper-slide">Slide 5</div>
                        <div class="swiper-slide">Slide 6</div>
                        <div class="swiper-slide">Slide 7</div>
                        <div class="swiper-slide">Slide 8</div>
                        <div class="swiper-slide">Slide 9</div>
                        <div class="swiper-slide">Slide 10</div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
</main>

<!-- end main content area -->
<?= $this->endSection();
