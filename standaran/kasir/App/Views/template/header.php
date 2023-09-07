<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data["judul"]?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=Base_url?>/css/css.css">
</head>
<body id="body">
    <div class="nav">
        <!-- side-bar -->
        <div class="sidebar">
            <div class="header-sidebar">
                <h4>Dasbor Admin</h4>
            </div>
            <div class="menuu">
                <h4>MENU</h4>
            </div>
            <div class="menu">
                <ul>
                    <li> <span><i class="bi bi-archive-fill" style="color:rgb(89, 89, 185);font-size: 1.2rem; margin-left: 2px;"></i></span><a href="<?=Base_url?>Produk/index">Daftar Produk</a></li>
                </ul>
                <ul>
                <li> <span><i class="bi bi-person-fill" style="color: yellow; font-size: 1.2rem;"></i></span>   <a href="<?=Base_url?>Karyawan/index">Daftar Karyawan</a></li></a>
                </ul>
                <ul>
                    <li> <span><i class="bi bi-cart-check" style="font-size: 1rem; color: yellow;"></i></span>   <a href="http://">Daftar Penjulan</a></li>
                </ul>
                <ul>
                    <li> <span><i class="bi bi-calculator" style="font-size: 1rem; color: cadetblue;"></i></span>  <a href="<?=Base_url?>App_Kasir/index">App kasir</a></li>
                </ul>
            </div>
        </div>
        <!-- end side bar -->

        <!-- kotak main konten -->
        <div class="main">
            <!-- top-nav -->
            <div class="top-nav">
            <div class="search-bar">
                <form action="" method="post">
                    <input type="text" placeholder="Search">
                </form>
            </div>
            <div class="user">
                <div class="menu-user">
                    <ul>
                        <li> <span><i class="bi bi-person-fill" style="color: yellow; font-size: 1.2rem;"></i></span>|Haloo</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end top nav -->
