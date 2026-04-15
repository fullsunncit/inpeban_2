<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Pengguna;
use App\Models\Pengaduan;

class DashboardAdminController extends Controller
{

    public function index(Request $request)
    {
        $menu = $request->menu ?? 'dashboard';

        // 🔹 COUNT DATA
        $jumlahPetugas = Petugas::count();
        $jumlahPengguna = Pengguna::count();

        $pending = Pengaduan::where('status', 'pending')->count();
        $proses = Pengaduan::where('status', 'proses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();

        // 🔹 DATA (untuk menu lain)
        $data = null;
        $detail = null;

        if ($menu == 'pengaduan') {
            $data = Pengaduan::with('pengguna')->latest()->get();

            if ($request->id) {
                $detail = Pengaduan::with(['pengguna', 'tanggapan.petugas'])
                    ->find($request->id);
            }
            
        } elseif ($menu == 'petugas') {
            $data = Petugas::all();

        } elseif ($menu == 'pengguna'){
            $data = Pengguna::all();
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
