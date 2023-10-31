<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Log In</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    </head>

    <body>
        <div class="container d-flex justify-content-center vh-100 align-items-center" ><br>
            <div class="col-md-4 col-md-offset-4 shadow p-3">
                <h2 class="text-center">BLUD Sekolah</h2>
                <hr>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <br>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <hr>
                    <p class="text-center">Belum punya akun? <a href="{{ route('register') }}">Register</a> sekarang!
                    <br>
                </form>
            </div>
        </div>
    </body>
</html>
