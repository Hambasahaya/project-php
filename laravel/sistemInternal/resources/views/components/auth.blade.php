<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(request()->routeIs('login'))
    <title>Login</title>
    @endif
    @if(request()->routeIs('forgetpassword'))
    <title>Forget Password</title>
    @endif
    @if(request()->routeIs('resetpassword'))
    <title>reset Password</title>
    @endif
    <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth ">
                <div class="row flex-grow ">
                    @if(session("login_success"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <p>{{session("login_success")}}</p>
                        <hr>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session("login_error"))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Well Fail!</h4>
                        <p>{{session("login_error")}}</p>
                        <hr>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo d-flex justify-content-center">
                                <img src="../img/logo.png" class="rounded-3">
                            </div>
                            @error('login_error')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @enderror
                            @if(request()->routeIs('login'))
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            @endif
                            @if(request()->routeIs('forgetpassword'))
                            <h6 class="font-weight-light">Enter You Email To Proses</h6>
                            @endif
                            @if(request()->routeIs('resetpassword'))
                            <h6 class="font-weight-light">Enter You New Password!</h6>
                            @endif
                            @if(request()->routeIs('login'))
                            <form class="pt-3" action="{{route('login')}}" method="post">
                                @endif
                                @if(request()->routeIs('forgetpassword'))
                                <form class="pt-3" action="" method="post">
                                    @endif
                                    @if(request()->routeIs('resetpassword'))
                                    <form class="pt-3" action="" method="post">
                                        @endif

                                        @csrf
                                        @if(request()->routeIs('forgetpassword') || request()->routeIs('login'))
                                        <div class="form-group">
                                            <input required type="email" class="form-control form-control-lg" id="exampleInput requiredEmail1" placeholder="email" name="email">
                                        </div>
                                        @endif
                                        @if(request()->routeIs('resetpassword')|| request()->routeIs('login'))
                                        <div class="form-group">
                                            <input required type="password" class="form-control form-control-lg" id="exampleInput requiredPassword1" placeholder="Password" name="password">
                                        </div>
                                        @endif
                                        <div class="mt-3 d-grid gap-2">
                                            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">{{request()->routeIs('login')? "SIGN IN":"PROCESS"}}</button>
                                        </div>
                                        @if(request()->routeIs('login'))
                                        <div class="my-2 d-flex justify-content-between align-items-center">
                                            <a href="{{route('forgetpassword')}}" class="auth-link text-primary">Forgot password?</a>
                                        </div>
                                        @endif
                                        @if(request()->routeIs('forgetpassword')||request()->routeIs('resetpassoword'))
                                        <div class="my-2 d-flex justify-content-between align-items-center">
                                            <a href="{{route('login')}}" class="auth-link text-primary"><i class="bi bi-arrow-bar-left"></i>Back To login?</a>
                                        </div>
                                        @endif
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(request()->routeIs('resetpassoword')
    <script>
        window.addEventListener("beforeunload", function() {
            navigator.sendBeacon("{{ route('forget.session') }}");
        });
    </script>
    @endif
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <script src="../js/off-canvas.js"></script>
    <script src="../js/misc.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
    <script src="../js/jquery.cookie.js"></script>
</body>

</html>