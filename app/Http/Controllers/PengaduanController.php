<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Pengguna;
use App\Models\Petugas;

class PengaduanController extends Controller
{

    public function index(Request $request)
    {
        $user = session('user');

        // 🔹 default menu
        $menu = $request->menu ?? 'semua';

        if ($menu == 'saya') {
            $data = Pengaduan::with('pengguna')
                ->where('pengguna_id', $user['id'])
                ->latest()
                ->get();
        } else {
            $data = Pengaduan::with('pengguna')
                ->latest()
                ->get();
        }

        $counts = Pengaduan::where('pengguna_id', $user['id'])
            ->selectRaw("
            SUM(status='pending') as pending,
            SUM(status='proses') as proses,
            SUM(status='selesai') as selesai")
            ->first();

        return view('service', compact('data', 'menu', 'counts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi_laporan' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = session('user');

        // upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/pengaduan'), $namaFile);

            $foto = $namaFile;
        } else {
            $foto = null;
        }

        // 🔹 SIMPAN KE DB
        Pengaduan::create([
            'pengguna_id' => $user['id'],
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $foto,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Pengaduan berhasil dikirim');
    }

    public function admin(Request $request)
    {
        $menu = $request->menu ?? 'dashboard';

        // 🔹 statistik dashboard
        $jumlahPetugas = Petugas::count();
        $jumlahPengguna = Pengguna::count();
        $pending = Pengaduan::where('status', 'pending')->count();
        $proses = Pengaduan::where('status', 'proses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();

        // 🔹 data pengaduan
        $data = Pengaduan::with('pengguna')->latest()->get();

        // 🔥 DETAIL (kalau klik tanggapan)
        $detail = null;
        if ($request->id) {
            $detail = Pengaduan::with(['pengguna', 'tanggapan.petugas'])
                ->find($request->id);
        }

        return view('dashboard_admin', compact(
            'menu',
            'data',
            'detail',
            'jumlahPetugas',
            'jumlahPengguna',
            'pending',
            'proses',
            'selesai'
        ));
    }
}
