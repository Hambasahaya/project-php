<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('bni/logo.png') }}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <section class="">
        <div class="d-flex justify-content-center align-items-center vh-100"
            style="background-image: linear-gradient(to left, #FFA500, #FF6347)">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card border-0 shadow"
                            style="background-image: linear-gradient(to left, #FFA500, #FF6347)">
                            <div class="card-body py-5 px-md-5">
                                <form action="{{ route('authenticate') }}" method="POST">
                                    @csrf

                                    <div class="text-white">
                                        <h1 class="fw-bold mb-5">TYAS ASTAN</h1>
                                        <h3 class="fw-bold">Login to your account</h3>
                                        <p class="mb-3">Let's get started</p>
                                    </div>

                                    @if (session('logout'))
                                        <div class="alert alert-sm alert-primary">
                                            {{ session('logout') }}
                                        </div>
                                    @endif


                                    <div class="form-outline mb-4 text-white">
                                        <label class="form-label" for="typeEmailX-2">Email</label>
                                        <input type="email" id="typeEmailX-2"
                                            class="form-control border border-white text-white @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}"
                                            style="background-color: transparent;" />
                                        @if ($errors->has('email'))
                                            <span class="text-white">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4 text-white">
                                        <label class="form-label" for="typePasswordX-2">Password</label>
                                        <input type="password" id="typePasswordX-2"
                                            class="form-control border border-white text-white" name="password"
                                            style="background-color: transparent;" />
                                        @if ($errors->has('password'))
                                            <span class="text-white">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary rounded-md"
                                            style="border-radius: 25px;">Sign In</button>
                                    </div>
                                    <p class="text-center mt-3 text-white">Dont have an account? <a href="/register"
                                            class="text-white">Sign Up</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="my-5 display-3 fw-bold ls-tight">
                            <img src="{{ asset('bni/logo.png') }}" class="img-fluid">
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
