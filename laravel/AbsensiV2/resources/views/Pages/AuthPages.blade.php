<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Absensi Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="min-h-screen flex items-center justify-center px-4" style="background: #38B6FF;
background: linear-gradient(207deg, rgba(56, 182, 255, 1) 0%, rgba(0, 0, 0, 1) 50%, rgba(255, 102, 196, 1) 100%);">
    <div class="max-w-md w-full bg-white rounded-lg shadow-xl overflow-hidden transform transition-all hover:scale-105 duration-300">
        @if (session('login_gagal'))
        <x-showerror type="danger" title="Gagal!" :message="session('login_gagal')" />
        @endif

        <div class="px-6 py-8 md:p-8">

            <div id="errorBox" class="hidden bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6" role="alert">
                <p id="errorMsg"></p>
            </div>
            @php
            $routeName = Route::currentRouteName();
            @endphp

            <div class="px-6 py-8 md:p-8">
                @if ($routeName === 'login')
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login Absensi Karyawan</h2>
                @elseif ($routeName === 'verifemail')
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Verifikasi Email</h2>
                @elseif ($routeName === 'veriftoken')
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Reset Password</h2>
                @endif

                <form
                    id="loginForm"
                    class="space-y-6"
                    action="@if($routeName === 'login') {{ route('login') }}
                @elseif($routeName === 'verifemail') {{ route('verifikasiemail') }}
                @elseif($routeName === 'veriftoken') {{ route('resetpassword') }}
                @endif"
                    method="POST">
                    @csrf

                    @if(in_array($routeName, ['login', 'verifemail']))
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="masukkan email"
                            required />
                    </div>
                    @endif

                    {{-- Password Input (Only for login) --}}
                    @if($routeName === 'login')
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="masukkan password"
                            required />
                    </div>
                    <div class="text-sm ms-auto">
                        <a href="/verifemail" class="font-medium text-blue-600 hover:text-blue-500">Lupa password?</a>
                    </div>
                    @endif
                    @if($routeName === 'veriftoken')
                    <div>
                        <label for="token" class="block text-sm font-medium text-gray-700 mb-1">Token Verifikasi</label>
                        <input
                            id="token"
                            type="text"
                            name="token"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="masukkan token"
                            required />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="masukkan password baru"
                            required />
                    </div>
                    @endif

                    {{-- Submit Button --}}
                    <div>
                        <button
                            type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            @if($routeName === 'login')
                            Masuk
                            @elseif($routeName === 'verifemail')
                            Verifikasi Email
                            @elseif($routeName === 'veriftoken')
                            Reset Password
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
        <script>
            const form = document.getElementById("loginForm");
            const emailInput = document.getElementById("email");
            const passwordInput = document.getElementById("password");
            const errorBox = document.getElementById("errorBox");
            const errorMsg = document.getElementById("errorMsg");
        </script>
</body>

</html>