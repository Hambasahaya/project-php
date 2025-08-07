<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>

<body>
    <h2>Reset Password</h2>
    <p>Halo {{ $user->nama }},</p>
    <p>Kami menerima permintaan untuk reset password akun HRIS Anda.</p>
    <p>Silakan gunakan token berikut untuk melanjutkan:</p>

    <h3 style="color: #1f2937;">{{ $token }}</h3>

    <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
    <br>
    <p>Salam,<br>Tim HRIS PT. WINICODE</p>
</body>

</html>