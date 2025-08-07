<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SnapAbsen Auth</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <div class="login-container">
        <div class="logo-banner mb-3">
            <img src="/img/authBg.png" alt="person" />
        </div>

        <div class="mb-3 text-center">
            @if (session('fail_login'))
            <x-showerror type="danger" title="Gagal!" :message="session('fail_login')" />
            @endif
            @if (session('login_berhasil'))
            <x-showerror type="success" title="Berhasil!" :message="session('login_berhasil')" />
            @endif
            <h2>Welcome To SnapAbsen</h2>
            @if (request()->routeIs('login'))
            <p>Log in to your account</p>
            @elseif (request()->routeIs('forgot.password'))
            <p>Forgot your password? We'll help you reset it.</p>
            @elseif (request()->routeIs('verify.token'))
            <p>Enter the token and new password to recover your account</p>
            @endif
        </div>
        @if (request()->routeIs('login'))
        <form action="{{ route('login.auth') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label class="form-label fw-bold">Username</label>
                <input type="text" class="form-control" placeholder="Enter Username" name="nim">
            </div>
            <div class="mb-3 text-start">
                <label class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password">
            </div>
            <a href="{{ route('forgot.password') }}" class="forgot-password mt-2 d-block">Forgot password?</a>
            <button type="submit" class="btn btn-login w-100 py-2">Log in</button>
        </form>
        @endif
        @if (request()->routeIs('forgot.password'))
        <form action="{{ route('forgot.password.send') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" placeholder="Enter your registered email" name="email">
            </div>
            <button type="submit" class="btn btn-login w-100 py-2">Send Reset Link</button>
        </form>
        @endif

        @if (request()->routeIs('verify.token'))
        <form action="{{ route('password.reset.update') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label class="form-label fw-bold">Verification Token</label>
                <input type="text" class="form-control" placeholder="Enter token" name="token">
            </div>
            <div class="mb-3 text-start">
                <label class="form-label fw-bold">New Password</label>
                <input type="password" class="form-control" placeholder="New Password" name="password">
            </div>
            <button type="submit" class="btn btn-login w-100 py-2">Reset Password</button>
        </form>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</body>

</html>