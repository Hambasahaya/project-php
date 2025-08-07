<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Admin Blog Rio
    </title>
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="{{asset('/css/soft-ui-dashboard.css?v=1.1.0')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
    @if(Auth::user()->level=="admin")
    @include('components.sidebarAdmin')
    @endif
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @if(Auth::user()->level=="admin")
        @include('components.AdminNavbar')
        @endif

        <div class="container-fluid py-4">
            @yield('admincontent')
        </div>
        <script src="/js/core/popper.min.js"></script>
        <script src="/js/core/bootstrap.min.js"></script>
        <script src="/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="/js/plugins/chartjs.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
</body>

</html>