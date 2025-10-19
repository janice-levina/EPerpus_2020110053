<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - EPerpus</title>
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5 col-md-7">
            <div class="card shadow-lg my-5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login EPerpus</h1>
                    </div>

                    <!-- Tombol login dummy -->
                    <div class="text-center mb-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-block mb-2">Login sebagai Admin</a>
                        <a href="{{ route('dashboard-anggota') }}" class="btn btn-success btn-block">Login sebagai Anggota</a>
                    </div>

                    <small class="text-muted d-block text-center mt-3">
                        Hanya dummy login, tidak perlu password
                    </small>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
