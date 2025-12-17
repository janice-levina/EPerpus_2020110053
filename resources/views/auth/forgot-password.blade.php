<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
</head>
<body>

<h3>Lupa Password</h3>

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif



@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
<p><a href="{{ session('link') }}">{{ session('link') }}</a></p>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Kirim Link</button>
</form>

</body>
</html>
