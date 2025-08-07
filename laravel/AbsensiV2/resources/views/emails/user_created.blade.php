<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Akun Absensi</title>
</head>

<body>
    <h2>Selamat datang, {{ $user->nama }}!</h2>
    <p>Akun Anda di sistem absensi PT. WINICODE telah berhasil dibuat.</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Password sementara:</strong> {{ $password }}</p>
    <p>Silakan login dan segera ubah password Anda demi keamanan akun.</p>
    <br>
    <p>Terima kasih,<br>HRD PT. WINICODE</p>
</body>

</html>