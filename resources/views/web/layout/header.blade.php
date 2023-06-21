<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ setting('app_name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('web/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2136f01711.js" crossorigin="anonymous"></script>
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('web/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('web/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="/admin/dashboard" class="navbar-brand d-flex align-items-center text-center">
                    <div class="p-2 me-2">
                        <img class="img-fluid" src="{{ asset(setting('logo')) }}" alt="Icon"
                            style="width: 50px">
                    </div>
                    <h3 class="m-0 text-black text-left" style="text-align: left; line-height: .9;"><span class="text-primary">Puskesmas</span> <br>Loa Kulu</h3>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a>
                        <a href="/tentang" class="nav-item nav-link {{ Request::is('tentang') ? 'active' : '' }}">Tentang</a>
                        <a href="/halaman" class="nav-item nav-link {{ Request::is('halaman') ? 'active' : '' }}">Halaman</a>
                        <a href="/galeri" class="nav-item nav-link {{ Request::is('galeri') ? 'active' : '' }}">Galeri</a>
                        <a href="/lampiran" class="nav-item nav-link {{ Request::is('lampiran') ? 'active' : '' }}">Lampiran</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->
