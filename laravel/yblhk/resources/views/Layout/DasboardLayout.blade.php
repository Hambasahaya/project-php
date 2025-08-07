<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Yblhk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <link rel="stylesheet" href="/Assets/fonts/tabler-icons.min.css">
    <link rel="stylesheet" href="/Assets/fonts/feather.css">
    <link rel="stylesheet" href="/Assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="/Assets/fonts/material.css">
    <link rel="stylesheet" href="/Assets/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="/Assets/css/style-preset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/Assets/css/style2.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <x-SideBar />
    <x-Navbar />

    <div class="pc-container">
        <div class="pc-content">
            @if(request()->routeIs('dasboard'))
            <h4 class="text-center">Grarfik Laporan</h4>
            <div class="row w-100">
                <x-Cardlist />
            </div>
            @endif
            @yield('content')
        </div>
    </div>
    <x-Footer />