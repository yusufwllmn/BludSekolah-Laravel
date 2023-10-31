<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Badan Layanan Usaha Sekolah</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>

</head>
<body class="d-flex flex-column min-vh-100" style="background: rgb(230, 230, 230)">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid d-flex align-items-center p-3" style="background: rgb(22, 22, 29);">
            <h4 class="navbar-brand">Badan Layanan Usaha Sekolah</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customerPage') }}">Home</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('sewaAula') }}">Aula</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('sewaKantin') }}">Kantin</a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="post">
                @csrf
                    <button type="submit" class="btn btn-outline-light" onclick="return confirm('Apakah anda ingin Logout?')">Log out</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container m-auto">
        @yield('customerKonten')
    </div>
    <div class="col-md-12 text-center text-white p-3 mt-auto" style="background: rgb(22, 22, 29);">
        BLUD Sekolah
    </div>
</body>
</html>
