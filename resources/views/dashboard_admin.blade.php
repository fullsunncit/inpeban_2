<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - INPEBAN</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            margin: 0;
        }

        /* 🔹 Navbar */
        .navbar-custom {
            position: sticky;
            top: 0;
            z-index: 999;
            background: #F6FFF8;
            padding: 10px 20px;
        }

        .navbar-custom h4,
        .navbar-custom p,
        .navbar-custom a {
            color: #6B9080;
            font-weight: 700;
            text-decoration: none;
        }

        /* 🔹 Layout */
        .main-wrapper {
            min-height: 100vh;
        }

        .sidebar {
            background: #CCE3DE;
            min-height: 100vh;
            padding: 20px;
        }

        .content {
            background: #EAF4F4;
            min-height: 100vh;
            padding: 25px;
        }

        /* 🔹 Profile */
        .profile-icon {
            font-size: 60px;
            color: white;
            background: #6B9080;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
        }

        .menu-link {
            display: block;
            padding: 10px;
            margin: 8px 0;
            border-radius: 10px;
            color: #6B9080;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
        }

        .menu-link:hover,
        .menu-active {
            background: #6B9080;
            color: white;
        }

        .text-white-custom {
            color: #6B9080;
        }

        /* 🔹 Responsive */
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
            }
        }
    </style>
</head>

<body>

    <!-- 🔹 NAVBAR -->
    <div class="navbar-custom d-flex justify-content-between align-items-center">

        <!-- LEFT -->
        <div class="d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" width="20px" height="50px" class="me-2">
            <h4 class="mb-0">INPEBAN</h4>
        </div>

        <!-- RIGHT -->
        <p class="mb-0">
            <a href="/logout_petugas">
                <i class="bi bi-box-arrow-right"></i> Logout Petugas
            </a>
        </p>

    </div>

    <!-- 🔹 MAIN -->
    <div class="container-fluid main-wrapper">
        <div class="row">

            <!-- 🔹 SIDEBAR -->
            <div class="col-md-3 col-lg-2 sidebar text-center">

                @php $petugasSession = session('petugas'); @endphp

                <!-- PROFILE -->
                <div class="profile-icon mb-3">
                    <i class="bi bi-person-fill"></i>
                </div>

                <p class="mb-0 text-white-custom">{{ strtoupper($petugasSession['username'] ?? '-') }}</p>

                <small class="text-white-custom">
                    {{ $petugasSession['nama_petugas'] ?? '-' }} <br>
                    {{ $petugasSession['kontak_petugas'] ?? '-' }} <br>
                    {{ $petugasSession['level'] ?? '-' }}
                </small>

                <hr>

                <!-- MENU -->
                <a href="/dashboard_admin?menu=dashboard"
                    class="menu-link {{ ($menu ?? 'dashboard') == 'dashboard' ? 'menu-active' : '' }}">
                    Dashboard
                </a>

                <a href="/dashboard_admin?menu=pengaduan"
                    class="menu-link {{ ($menu ?? '') == 'pengaduan' ? 'menu-active' : '' }}">
                    Pengaduan
                </a>

                <a href="/dashboard_admin?menu=petugas"
                    class="menu-link {{ ($menu ?? '') == 'petugas' ? 'menu-active' : '' }}">
                    Petugas
                </a>

                <a href="/dashboard_admin?menu=pengguna"
                    class="menu-link {{ ($menu ?? '') == 'pengguna' ? 'menu-active' : '' }}">
                    Pengguna
                </a>

            </div>

            <!-- 🔹 CONTENT -->
            <div class="col-md-9 col-lg-10 content">

                @php $menu = $menu ?? 'dashboard'; @endphp

                {{-- 🔹 DASHBOARD --}}
                @if ($menu == 'dashboard')
                    <h3 class="mb-4 text-center fw-bold" style="color:#6B9080;">
                        Dashboard Admin
                    </h3>

                    <div class="row g-3 justify-content-center">

                        <!-- Petugas -->
                        <div class="col-md-4 col-lg-2">
                            <div class="card text-center p-3 shadow-sm">
                                <h6>Petugas</h6>
                                <h4>{{ $jumlahPetugas }}</h4>
                            </div>
                        </div>

                        <!-- Masyarakat -->
                        <div class="col-md-4 col-lg-2">
                            <div class="card text-center p-3 shadow-sm">
                                <h6>Masyarakat</h6>
                                <h4>{{ $jumlahPengguna }}</h4>
                            </div>
                        </div>

                        <!-- Pending -->
                        <div class="col-md-4 col-lg-2">
                            <div class="card text-center p-3 shadow-sm">
                                <h6>Pending</h6>
                                <h4>{{ $pending }}</h4>
                            </div>
                        </div>

                        <!-- Proses -->
                        <div class="col-md-4 col-lg-2">
                            <div class="card text-center p-3 shadow-sm">
                                <h6>Proses</h6>
                                <h4>{{ $proses }}</h4>
                            </div>
                        </div>

                        <!-- Selesai -->
                        <div class="col-md-4 col-lg-2">
                            <div class="card text-center p-3 shadow-sm">
                                <h6>Selesai</h6>
                                <h4>{{ $selesai }}</h4>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($menu == 'pengaduan')

                    @if (!$detail)

                        <h3 class="mb-4 text-center fw-bold" style="color:#6B9080;">
                            Data Pengaduan
                        </h3>

                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Judul</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pengguna->username }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>
                                                @if ($item->foto)
                                                    <img src="{{ asset('uploads/pengaduan/' . $item->foto) }}"
                                                        width="60">
                                                @endif
                                            </td>
                                            <td><span
                                                    class="badge
                                                    {{ $item->status == 'pending' ? 'bg-warning' : ($item->status == 'proses' ? 'bg-primary' : 'bg-success') }}">
                                                    {{ $item->status }}
                                                </span></td>
                                            <td>
                                                <a href="/dashboard_admin?menu=pengaduan&id={{ $item->id }}"
                                                    class="btn btn-sm btn-success">
                                                    Tanggapi
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    @endif

                    @if ($detail)

                        <a href="/dashboard_admin?menu=pengaduan" class="btn btn-secondary mb-3">
                            ← Kembali
                        </a>
                        <h3 class="mb-4 text-center fw-bold" style="color:#6B9080;">
                            Detail Pengaduan
                        </h3>

                        <div class="card p-4 shadow-sm">

                            <table class="table table-borderless">

                                <tr>
                                    <th width="150">Username</th>
                                    <td>{{ $detail->pengguna->username }}</td>
                                </tr>

                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $detail->pengguna->nama_lengkap }}</td>
                                </tr>

                                <tr>
                                    <th>Judul</th>
                                    <td>{{ $detail->judul }}</td>
                                </tr>

                                <tr>
                                    <th>Isi Laporan</th>
                                    <td>{{ $detail->isi_laporan }}</td>
                                </tr>

                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <span
                                            class="badge
                                             @if ($detail->status == 'pending') bg-warning
                                            @elseif($detail->status == 'proses') bg-primary
                                            @else bg-success @endif">
                                            {{ strtoupper($detail->status) }}
                                        </span>
                                    </td>
                                </tr>

                                @if ($detail->foto)
                                    <tr>
                                        <th>Foto</th>
                                        <td>
                                            <img src="{{ asset('uploads/pengaduan/' . $detail->foto) }}" width="200"
                                                class="rounded shadow-sm">
                                        </td>
                                    </tr>
                                @endif

                            </table>

                        </div>

                        {{-- 🔥 FORM --}}
                        @if ($detail->status != 'selesai')
                            <div class="card p-4 mt-3">
                                <form action="/tanggapan/store/{{ $detail->id }}" method="POST">
                                    @csrf

                                    <textarea name="isi_tanggapan" class="form-control mb-2" required placeholder="Tulis Tanggapan ... "></textarea>

                                    <select name="status" class="form-control mb-2">
                                        <option value="pending">Pending</option>
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    </select>

                                    <button class="btn btn-success">Simpan</button>
                                </form>
                            </div>
                        @endif

                        {{-- 🔥 HASIL TANGGAPAN --}}
                        @if ($detail->tanggapan)
                            <div class="card p-4 mt-3">
                                <h6>Tanggapan</h6>
                                <p>{{ $detail->tanggapan->isi_tanggapan }}</p>
                            </div>
                        @endif

                    @endif

                @endif

                {{-- 🔹 PETUGAS --}}
                @if ($menu == 'petugas')
                    <h3 class="mb-4 text-center fw-bold" style="color:#6B9080;">
                        Data Petugas
                    </h3>

                    <a href="/dashboard_admin?menu=petugas_create" class="btn mb-3 text-white"
                        style="background:#6B9080;">
                        + Tambah Petugas
                    </a>

                    <div class="table-responsive">

                        <table class="table table-striped table-hover align-middle">

                            <thead style="background:#CCE3DE;">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Kontak</th>
                                    <th>Level</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $i => $p)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $p->username }}</td>
                                        <td>{{ $p->nama_petugas }}</td>
                                        <td>{{ $p->kontak_petugas }}</td>
                                        <td>{{ $p->level }}</td>
                                        <td>

                                            <a href="/petugas/edit/{{ $p->id }}"
                                                class="btn btn-sm btn-warning text-white">
                                                Update
                                            </a>

                                            <a href="/petugas/delete/{{ $p->id }}"
                                                onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">
                                                Delete
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>

                @endif

                @if ($menu == 'petugas_create')
                    <a href="/dashboard_admin?menu=petugas" class="btn btn-secondary mb-3">
                        ← Kembali
                    </a>
                    <h3 class="mb-4 text-center fw-bold" style="color:#6B9080;">
                        Tambah Petugas
                    </h3>
                    <div class="card p-4">
                        <form action="/petugas/store" method="POST">
                            @csrf

                            <input type="text" name="username" class="form-control mb-2" placeholder="Username">
                            <input type="password" name="password" class="form-control mb-2" placeholder="Password">
                            <input type="text" name="nama_petugas" class="form-control mb-2" placeholder="Nama">
                            <input type="text" name="kontak_petugas" class="form-control mb-2"
                                placeholder="Kontak">

                            <select name="level" class="form-control mb-3">
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>

                            <button class="btn text-white w-100" style="background:#6B9080;">
                                Simpan
                            </button>
                        </form>

                    </div>
                @endif

                @if ($menu == 'petugas_edit')
                    <div class="container-fluid">

                        <a href="/dashboard_admin?menu=petugas" class="btn btn-secondary mb-3">
                            ← Kembali
                        </a>

                        <h4 class="mb-4 fw-bold text-center" style="color:#6B9080;">
                            Edit Petugas
                        </h4>

                        <div class="row justify-content-center">

                            <div class="col-md-6">

                                <div class="card shadow-sm p-4" style="border-radius:15px;">

                                    <form action="/petugas/update/{{ $petugas->id }}" method="POST">
                                        @csrf

                                        <!-- Username -->
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Username</label>
                                            <input type="text" name="username" class="form-control"
                                                value="{{ $petugas->username }}" required>
                                        </div>

                                        <!-- Nama Petugas -->
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Nama Petugas</label>
                                            <input type="text" name="nama_petugas" class="form-control"
                                                value="{{ $petugas->nama_petugas }}" required>
                                        </div>

                                        <!-- Kontak -->
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Kontak</label>
                                            <input type="text" name="kontak_petugas" class="form-control"
                                                value="{{ $petugas->kontak_petugas }}" required>
                                        </div>

                                        <!-- Level -->
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Level</label>
                                            <select name="level" class="form-control" required>
                                                <option value="Admin"
                                                    {{ $petugas->level == 'Admin' ? 'selected' : '' }}>
                                                    Admin
                                                </option>
                                                <option value="Petugas"
                                                    {{ $petugas->level == 'Petugas' ? 'selected' : '' }}>
                                                    Petugas
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Password (opsional)</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Kosongkan jika tidak diubah">
                                        </div>

                                        <!-- Button -->
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn text-white"
                                                style="background:#6B9080;">
                                                Update
                                            </button>
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>
                @endif
                @if ($menu == 'pengguna')

                    <div class="container-fluid">

                        <h3 class="mb-4 text-center fw-bold" style="color:#6B9080;">
                            Data Pengguna
                        </h3>

                        <div class="card shadow-sm p-3" style="border-radius:15px;">

                            <div class="table-responsive">

                                <table class="table table-hover align-middle">

                                    <thead style="background:#CCE3DE; color:#6B9080;">
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Kontak</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($data as $i => $item)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td class="fw-bold">{{ $item->username }}</td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->kontak }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">Data tidak tersedia</td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>
    </div>

    <!-- 🔹 FOOTER -->
    <div style="background-color: #6B9080;" class="py-3">
        <p class="mb-0 text-center text-white fw-bold">
            Inpeban &copy;Copyright 2023
        </p>
    </div>

</body>

</html>
