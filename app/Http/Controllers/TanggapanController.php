<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class TanggapanController extends Controller
{
    // 🔹 SIMPAN TANGGAPAN + UPDATE STATUS
    public function store(Request $request, $id)
    {
        $request->validate([
            'isi_tanggapan' => 'required',
            'status' => 'required|in:pending,proses,selesai'
        ]);

        // 🔹 ambil pengaduan
        $pengaduan = Pengaduan::findOrFail($id);

        // 🔹 update status pengaduan
        $pengaduan->update([
            'status' => $request->status,
            'petugas_id' => session('petugas')['id'] ?? null
        ]);

        // 🔹 cek apakah sudah ada tanggapan
        $tanggapan = Tanggapan::where('pengaduan_id', $id)->first();

        if ($tanggapan) {
            // update jika sudah ada
            $tanggapan->update([
                'isi_tanggapan' => $request->isi_tanggapan,
                'petugas_id' => session('petugas')['id'] ?? null
            ]);
        } else {
            // create jika belum ada
            Tanggapan::create([
                'pengaduan_id' => $id,
                'petugas_id' => session('petugas')['id'] ?? null,
                'isi_tanggapan' => $request->isi_tanggapan
            ]);
        }

        return redirect()->back()->with('success', 'Tanggapan berhasil disimpan!');
    }
}
