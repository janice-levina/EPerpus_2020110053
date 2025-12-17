<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - EPerpus</title>
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5 col-md-7">
            <div class="card shadow-lg my-5">
                <div class="card-body p-4">

                    <h1 class="h4 text-center mb-4">Login E-Perpus</h1>

                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="username"
                                   class="form-control"
                                   placeholder="Username" required>
                        </div>

                        <div class="form-group mt-3">
                            <input type="password" name="password"
                                   class="form-control"
                                   placeholder="Password" required>
                        </div>

                        <!-- CAPTCHA -->
                        <div class="form-group mt-3 text-center">
                            {!! captcha_img('flat') !!}
                        </div>

                        <div class="form-group mt-2">
                            <input type="text" name="captcha"
                                   class="form-control"
                                   placeholder="Masukkan captcha" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-4">
                            Login
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('register') }}" class="small">
                            Register
                        </a>
                    </div>

                    <div class="text-center mt-2">
    <a href="{{ route('password.request') }}" class="small">
        Lupa password?
    </a>
</div>


                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
