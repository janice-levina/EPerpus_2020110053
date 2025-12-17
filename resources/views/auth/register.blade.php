<!DOCTYPE html>

@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - EPerpus</title>
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5 col-md-7">
            <div class="card shadow-lg my-5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Register Anggota</h1>
                    </div>

                    <form action="{{ route('register.process') }}" method="POST">
    @csrf

    <div class="form-group">
        <input type="text" name="nama_lengkap" class="form-control"
               placeholder="Nama Lengkap" required>
    </div>

<div class="form-group mt-3">
    <input type="text" name="username" class="form-control"
           placeholder="Username" required>
</div>


    <div class="form-group mt-3">
        <input type="text" name="alamat" class="form-control"
               placeholder="Alamat" required>
    </div>

    <div class="form-group mt-3">
        <input type="text" name="no_telp" class="form-control"
               placeholder="No Telp" required>
    </div>

    <div class="form-group mt-3">
        <input type="email" name="email" class="form-control"
               placeholder="Email" required>
    </div>

    <div class="form-group mt-3">
        <input type="password" name="password" class="form-control"
               placeholder="Password" required>
    </div>

    <div class="form-group mt-3">
        <input type="password" name="password_confirmation" class="form-control"
               placeholder="Confirm Password" required>
    </div>

    <button type="submit" class="btn btn-primary btn-block mt-4">
        Daftar
    </button>
</form>


                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- VALIDASI PASSWORD MATCH -->
<script>
document.querySelector("form").addEventListener("submit", function(e) {
    const pass = document.getElementById("password").value;
    const confirm = document.getElementById("password_confirmation").value;

    if (pass !== confirm) {
        e.preventDefault();
        alert("Password dan Confirm Password harus sama!");
    }
});
</script>

</body>
</html>
