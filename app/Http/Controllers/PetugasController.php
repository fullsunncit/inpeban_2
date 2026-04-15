<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Petugas;

class PetugasController extends Controller
{
    // ==================================================
    // 🔐 AUTH (LOGIN - LOGOUT)
    // ==================================================

    public function loginPage()
    {
        return view('login_petugas');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $petugas = Petugas::where('username', $request->username)->first();

        if ($petugas && Hash::check($request->password, $petugas->password)) {

            Session::put('petugas', [
                'id' => $petugas->id,
                'username' => $petugas->username,
                'nama_petugas' => $petugas->nama_petugas,
                'kontak_petugas' => $petugas->kontak_petugas,
                'level' => $petugas->level
            ]);

            return redirect('/dashboard_admin');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        Session::forget('petugas');
        return redirect('/login_petugas');
    }

    // ==================================================
    // 🧑‍💼 CRUD PETUGAS (ADMIN DASHBOARD)
    // ==================================================

    public function index(Request $request)
    {
        $menu = $request->menu ?? 'dashboard';
        $data = Petugas::all();

        return view('dashboard_admin', compact('menu', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'kontak_petugas' => 'required',
            'level' => 'required',
        ]);

        Petugas::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_petugas' => $request->nama_petugas,
            'kontak_petugas' => $request->kontak_petugas,
            'level' => $request->level,
        ]);

        return redirect('/dashboard_admin?menu=petugas');
    }

    public function edit($id)
    {
        $menu = 'petugas_edit';
        $petugas = Petugas::findOrFail($id);

        return view('dashboard_admin', compact('menu', 'petugas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);

        $data = [
            'username' => $request->username,
            'nama_petugas' => $request->nama_petugas,
            'kontak_petugas' => $request->kontak_petugas,
            'level' => $request->level,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $petugas->update($data);

        return redirect('/dashboard_admin?menu=petugas');
    }

    public function destroy($id)
    {
        Petugas::destroy($id);

        return back();
    }
}
