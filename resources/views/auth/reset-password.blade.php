<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>

<h3>Reset Password</h3>

@if (session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <!-- WAJIB -->
    <input type="hidden" name="email" value="{{ $email }}">
    <input type="hidden" name="token" value="{{ $token }}">

    <input type="password" name="password" placeholder="Password baru" required>
    <br><br>
    <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
    <br><br>

    <button type="submit">Reset Password</button>
</form>

</body>
</html>
