<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service - INPEBAN</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            min-height: 100vh;
            background: #F6FFF8;
        }

        /* 🔹 Background Split */
        .bg-top {
            background: #6B9080;
            height: 50vh;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: -1;
        }

        .bg-bottom {
            background: #F6FFF8;
            height: 50vh;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: -1;
        }

        /* 🔹 Navbar */
        .top-nav {
            position: static;
            z-index: 2;
            padding: 20px 0;
            color: white;
        }

        .top-nav h4,
        .top-nav p,
        .top-nav a,
        .top-nav small {
            color: white;
            font-weight: 700;
            text-decoration: none;
        }

        /* 🔹 Main Center */
        .main-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 60px;
        }

        .main-container {
            max-width: 1100px;
        }

        /* 🔹 Card */
        .card-box {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .card-box:hover {
            transform: translateY(-5px);
        }

        /* 🔹 Profile */
        .profile-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #6B9080;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .text-green {
            color: #6B9080;
            font-weight: 600;
        }

        /* 🔹 Status */
        .status-box {
            text-align: center;
        }

        .status-box h6 {
            color: #6B9080;
            font-weight: 700;
        }

        .status-box p {
            font-weight: 700;
        }

        /* 🔹 Logout Button */
        .btn-logout {
            background-color: #F6FFF8;
            color: #6B9080 !important;
            padding: 6px 16px;
            border-radius: 10px;
            font-weight: 700;
            border: none;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background-color: #e4f2ed;
        }

        /* 🔹 Responsive */
        @media (max-width: 768px) {
            .top-nav .row {
                text-align: center;
            }

            .main-wrapper {
                padding-top: 80px;
            }

            .btn-logout {
                margin-top: 10px;
            }
        }

        .menu-btn {
            background: #CCE3DE;
            color: #6B9080;
            font-weight: 700;
            border-radius: 20px;
            padding: 8px 20px;
        }

        .menu-active {
            background: #6B9080;
            color: white;
            font-weight: 700;
            border-radius: 20px;
            padding: 8px 20px;
        }

        .profile-mini {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #6B9080;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <!-- 🔹 BACKGROUND -->
    <div class="bg-top"></div>
    <div class="bg-bottom"></div>

    <!-- 🔹 NAVBAR -->
    <div class="top-nav container">
        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-md-6 col-12">
                <h4 class="m-0">INPEBAN</h4>
                <small>Pengaduan Masyarakat</small>
            </div>

            <!-- RIGHT -->
            <div class="col-md-6 col-12 text-md-end mt-3 mt-md-0">
                <a href="/" class="me-3">Home</a>

                <a href="/logout" class="btn-logout">Logout</a>
            </div>

        </div>
    </div>

    <!-- 🔹 MAIN -->
    <div class="main-wrapper">
        <div class="container main-container">

            @php $user = session('user'); @endphp

            <div class="row g-4">

                <!-- 🔹 LEFT -->
                <div class="col-md-4">
                    <div class="card-box">

                        <!-- PROFILE -->
                        <div class="d-flex align-items-center mb-3">
                            <div class="profile-circle me-3">
                                {{ strtoupper(substr($user['username'] ?? 'U', 0, 1)) }}
                            </div>

                            <div>
                                <h5 class="mb-0">
                                    {{ $user['username'] ?? '-' }}
                                </h5>

                                <p class="mb-0">
                                    {{ $user['nama_lengkap'] ?? '-' }}
                                </p>

                                <small class="text-green">
                                    {{ $user['email'] ?? '-' }} <br>
                                    {{ $user['kontak'] ?? '-' }}
                                </small>
                            </div>
                        </div>

                        <hr>

                        <!-- STATUS -->
                        <div class="row text-center">

                            <div class="col-4 status-box">
                                <h6>Pending</h6>
                                {{ $counts->pending ?? 0 }}
                            </div>

                            <div class="col-4 status-box">
                                <h6>Proses</h6>
                                {{ $counts->proses ?? 0 }}
                            </div>

                            <div class="col-4 status-box">
                                <h6>Selesai</h6>
                                {{ $counts->selesai ?? 0 }}
                            </div>

                        </div>

                    </div>
                </div>

                <!-- 🔹 RIGHT -->
                <div class="col-md-8">
                    <div class="card-box">

                        <h5 style="color:#6B9080; font-weight:700;" class="mb-3">
                            Form Pengaduan
                        </h5>

                        {{-- NOTIF --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- ERROR --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="/pengaduan/store" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Judul -->
                            <div class="mb-3">
                                <label class="text-green">Judul</label>
                                <input type="text" name="judul" class="form-control"
                                    placeholder="Masukkan judul pengaduan">
                            </div>

                            <!-- Isi -->
                            <div class="mb-3">
                                <label class="text-green">Isi Laporan</label>
                                <textarea name="isi_laporan" rows="4" class="form-control" placeholder="Tulis laporan kamu..."></textarea>
                            </div>

                            <!-- Foto -->
                            <div class="mb-3">
                                <label class="text-green">Upload Foto (Opsional)</label>
                                <input type="file" name="foto" class="form-control">
                            </div>

                            <!-- Button -->
                            <button type="submit" class="btn w-100"
                                style="background:#6B9080; color:white; font-weight:700;">
                                Kirim Pengaduan
                            </button>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container mt-5 mb-5">

        <!-- 🔹 MENU -->
        <div class="d-flex justify-content-center mb-4 flex-wrap gap-2">

            <a href="/service?menu=semua" class="btn {{ $menu == 'semua' ? 'menu-active' : 'menu-btn' }}">
                Semua
            </a>

            <a href="/service?menu=saya" class="btn {{ $menu == 'saya' ? 'menu-active' : 'menu-btn' }}">
                Pengaduan Saya
            </a>

        </div>

        <!-- 🔹 DATA -->
        <div class="row g-4">

            @forelse ($data as $item)
                <div class="col-lg-6 col-12">
                    <div class="card-box">

                        {{-- USERNAME hanya muncul di SEMUA --}}
                        @if ($menu == 'semua')
                            <div class="d-flex align-items-center mb-2">

                                <!-- 🔹 ICON BULAT -->
                                <div class="profile-mini me-2">
                                    {{ strtoupper(substr($item->pengguna->username ?? 'U', 0, 1)) }}
                                </div>

                                <!-- 🔹 USERNAME -->
                                <h6 class="text-green mb-0">
                                    {{ $item->pengguna->username ?? '-' }}
                                </h6>

                            </div>
                        @endif

                        <h5>{{ $item->judul }}</h5>

                        <p>{{ $item->isi_laporan }}</p>

                        @if ($item->foto)
                            <img src="{{ asset('uploads/pengaduan/' . $item->foto) }}" class="img-fluid rounded mb-2">
                        @endif

                        {{-- STATUS --}}
                        <p>
                            Status:
                            <span
                                class="badge
                            {{ $item->status == 'pending' ? 'bg-warning' : ($item->status == 'proses' ? 'bg-primary' : 'bg-success') }}">
                                {{ $item->status }}
                            </span>
                        </p>

                        {{-- TANGGAL --}}
                        <small>
                            {{ $item->created_at }}
                        </small>

                        {{-- TANGGAPAN --}}
                        @if ($item->tanggapan)
                            <div class="mt-3 p-2" style="background:#EAF4F4; border-radius:10px;">
                                <strong>Tanggapan:</strong>
                                <p class="mb-0">
                                    {{ $item->tanggapan->isi_tanggapan }}
                                </p>
                            </div>
                        @endif

                    </div>
                </div>
            @empty
                <div class="text-center">
                    <p style="color:#6B9080; font-weight:700;">
                        Belum ada pengaduan
                    </p>
                </div>
            @endforelse

        </div>

    </div>

</body>

</html>
