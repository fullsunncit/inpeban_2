<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inpeban</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }

        * {
            font-weight: 700 !important;
        }

        /* 🔹 HERO */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)),
                url("{{ asset('images/background.jpg') }}");
            background-size: cover;
            background-position: center;
            height: 100vh;

            display: flex;
            flex-direction: column;
        }

        /* 🔹 NAVBAR */
        .custom-navbar {
            min-height: 80px;
            position: relative;
            z-index: 10;
        }

        .navbar-collapse.show {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #6B9080;
            z-index: 20;
        }

        .nav-link {
            font-size: 18px;
            font-weight: 700;
            color: white !important;
        }

        .navbar-brand img {
            width: 20px;
            height: 54px;
        }

        /* 🔹 HERO CONTENT (FIX WARNA PUTIH) */
        .hero-content {
            flex-grow: 1;
            color: white;
        }

        .hero-content * {
            color: white !important;
        }

        .hero h1 {
            font-size: 80px;
            font-weight: 700;
        }

        .hero p {
            font-size: 18px;
            font-weight: 600;
            max-width: 700px;
            margin: auto;
        }

        /* 🔹 BUTTON */
        .btn-login {
            background-color: #6B9080;
            color: white;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 6px;
        }

        .btn-login:hover {
            background-color: #5a7a6c;
        }

        /* 🔹 ANIMATION */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1s ease forwards;
        }

        .fade-in-delay {
            animation-delay: 0.5s;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 🔹 RESPONSIVE */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 40px;
            }

            .hero p {
                font-size: 16px;
                padding: 0 15px;
            }

            .btn-login {
                width: 100%;
            }
        }

        /* 🔹 DESKRIPSI */
        .section-deskripsi {
            background-color: #6B9080;
            color: white;
        }

        .section-deskripsi h1 {
            font-size: 36px;
            font-weight: 700;
        }

        .section-deskripsi p {
            font-size: 16px;
        }

        .section-deskripsi img {
            max-height: 300px;
        }

        /* 🔹 REKOMENDASI */
        .section-rekomendasi {
            background-color: #F6FFF8;
        }

        .section-rekomendasi h1 {
            color: #6B9080;
            font-weight: 700;
        }

        .card-custom {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: 0.3s;
        }

        .card-custom:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-img {
            height: 180px;
        }

        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-body-custom {
            background-color: #6B9080;
            color: white;
            padding: 15px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-body-custom h5 {
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .card-body-custom p {
            margin: 0;
        }

        /* 🔹 GALLERY */
        .section-gallery {
            background-color: #6B9080;
        }

        .section-gallery h1 {
            color: white;
            font-weight: 700;
        }

        /* Card Gallery */
        .gallery-card {
            border-radius: 12px;
            overflow: hidden;
            background-color: white;
            text-align: center;
        }

        .gallery-img {
            height: 200px;
        }

        .gallery-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-body {
            padding: 10px;
            font-weight: 600;
            color: #6B9080;
        }

        .gallery-card {
            transition: 0.3s;
        }

        .gallery-card:hover {
            transform: scale(1.05);
        }

        /* 🔹 ABOUT */
        .section-about {
            background-color: #6B9080;
            color: white;
        }

        .section-about h1 {
            font-weight: 700;
        }

        /* 🔹 Foto Anggota */
        .team-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
        }

        .team-name {
            margin-top: 10px;
            font-weight: 700;
        }

        .team-role {
            font-size: 14px;
        }

        .team-img {
            transition: 0.3s;
        }

        .team-img:hover {
            transform: scale(1.1);
        }

        /* 🔹 ABOUT WRAPPER (container dalam) */
        .about-box {
            background-color: #F6FFF8;
            border-radius: 20px;
            padding: 40px 20px;
        }

        /* 🔹 Semua teks dalam about jadi hijau & bold */
        .about-box h1,
        .about-box p {
            color: #6B9080;
            font-weight: 700;
        }

        footer img {
            transition: 0.3s;
        }

        footer img:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <!-- 🔹 HERO -->
    <div class="hero">

        <!-- 🔹 NAVBAR -->
        <nav class="navbar navbar-expand-lg custom-navbar">
            <div class="container">

                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo.png') }}">
                </a>

                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

                    <ul class="navbar-nav mx-auto gap-3 text-center">
                        <li class="nav-item"><a class="nav-link" href="#section-deskripsi">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#rekomendasi">Recommendation</a></li>
                        <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="/service">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                    </ul>

                    <div class="text-center mt-3 mt-lg-0">
                        @if (Session::has('user'))
                            <span class="text-white me-2">
                                {{ Session::get('user')['username'] }}
                            </span>

                            <a href="/logout" class="btn btn-danger btn-sm">
                                Logout
                            </a>
                        @else
                            <a href="/login" class="btn btn-login">
                                Login
                            </a>
                        @endif
                    </div>

                </div>

            </div>
        </nav>

        <!-- 🔹 HERO CONTENT -->
        <div class="d-flex justify-content-center align-items-center text-center hero-content">
            <div>
                <h1 class="fade-in">WELCOME TO <br> INPEBAN</h1>

                <p class="mt-3 fade-in fade-in-delay">
                    INPEBAN atau informasi layanan Tuban merupakan sebuah sistem
                    informasi Kabupaten Tuban yang menyajikan informasi dan potensi
                    serta sebagai platform pelayanan publik untuk memberikan wadah kepada
                    masyarakat Tuban dalam menyampaikan keluhan atau masalah
                </p>
            </div>
        </div>

    </div>

    <!-- 🔹 DESKRIPSI -->
    <section id="section-deskripsi" class="section-deskripsi py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-8 col-12">
                    <h1>Kabupaten Tuban</h1>
                    <p class="mt-3">
                        Kabupaten Tuban adalah salah satu wilayah di Provinsi
                        Jawa Timur yang terletak di jalur Pantai Utara (Pantura) Pulau Jawa.
                        Dengan luas sekitar 1.904,70 km² dan garis pantai sepanjang 65 km,
                        Tuban dihuni oleh sekitar 1 juta jiwa. Dikenal sebagai <strong>Kota Wali</strong>,
                        Tuban memiliki peran penting dalam penyebaran Islam di Jawa, serta
                        juga dikenal sebagai penghasil minuman tradisional dari pohon siwalan
                        seperti legen dan tuak.
                    </p>
                </div>

                <div class="col-lg-4 col-12 text-center">
                    <img src="{{ asset('images/peta_tuban.png') }}" class="img-fluid">
                </div>

            </div>
        </div>
    </section>

    <!-- 🔹 REKOMENDASI -->
    <section id="rekomendasi" class="section-rekomendasi py-5">
        <div class="container">

            <h1 class="text-center mb-5">Recommendation</h1>

            <div class="row g-4">

                @foreach ($rekomendasi as $item)
                    <div class="col-lg-3 col-md-6 col-12">

                        <a href="/detail/{{ $item['id'] }}" style="text-decoration: none;">
                            <div class="card-custom">

                                <div class="card-img">
                                    <img src="{{ trim($item['image']) }}">
                                </div>

                                <div class="card-body-custom">
                                    <h5>{{ $item['name'] }}</h5>
                                    <p>⭐ {{ $item['rating'] }}</p>
                                </div>

                            </div>
                        </a>

                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- 🔹 GALLERY -->
    <section id="gallery" class="section-gallery py-5">
        <div class="container">

            <!-- Judul -->
            <h1 class="text-center mb-5">Gallery</h1>

            <div class="row g-4">

                @foreach ($gallery as $item)
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="gallery-card">

                            <!-- 🔹 Gambar -->
                            <div class="gallery-img">
                                <img src="{{ $item['image'] }}">
                            </div>

                            <!-- 🔹 Nama -->
                            <div class="gallery-body">
                                {{ $item['name'] }}
                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <!-- 🔹 ABOUT US -->
    <section id="about" class="section-about py-5">
        <div class="container">

            <!-- 🔹 BOX DALAM -->
            <div class="about-box">

                <!-- Judul -->
                <h1 class="text-center mb-5">About Us</h1>

                <div class="row text-center">

                    <!-- 🔹 MEMBER 1 -->
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <img src="{{ asset('images/anthon.png') }}" class="team-img">
                        <p class="team-name">
                            Anthonio Akbar <br><br>
                            Pengembang Back-End & UI/UX <br>
                            Universitas Pendidikan Indonesia
                        </p>
                    </div>

                    <!-- 🔹 MEMBER 2 -->
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <img src="{{ asset('images/nurunnaf.jpg') }}" class="team-img">
                        <p class="team-name">
                            Nurun Nafisah <br><br>
                            Pengembang Front-End & UI/UX <br>
                            Universitas Negeri Surabaya
                        </p>
                    </div>

                    <!-- 🔹 MEMBER 3 -->
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <img src="{{ asset('images/lidya.jpeg') }}" class="team-img">
                        <p class="team-name">
                            Lidya Gabriella Tarigan <br><br>
                            Pengembang Back-End & UI/UX <br>
                            Universitas Sumatera Utara
                        </p>
                    </div>

                    <!-- 🔹 MEMBER 4 -->
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <img src="{{ asset('images/rossy.jpg') }}" class="team-img">
                        <p class="team-name">
                            Nur Rosydatun Nafiah <br><br>
                            Pengembang Front-End & UI/UX <br>
                            UPN "Veteran" Yogyakarta
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- 🔹 FOOTER -->
    <footer style="background-color: #F6FFF8;" class="pt-5">

        <div class="container text-center">

            <!-- LOGO BESAR -->
            <img src="{{ asset('images/logo_besar.png') }}" alt="Logo Inpeban"
                style="width: 300px; height: 240px; object-fit: contain;" class="img-fluid">

        </div>

        <!-- COPYRIGHT BAR -->
        <div style="background-color: #6B9080;" class="mt-4 py-3">

            <p class="mb-0 text-center text-white fw-bold">
                Inpeban &copy;Copyright 2023
            </p>

        </div>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
