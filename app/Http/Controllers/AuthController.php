<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // 🔹 VIEW LOGIN
    public function login()
    {
        return view('login');
    }

    // 🔹 PROSES LOGIN
    public function loginProses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = Pengguna::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::regenerate();
            Session::put('user', $user);
            return redirect('/service');
        }

        return back()->with('error', 'Username atau password salah');
    }

    // 🔹 VIEW REGISTER
    public function register()
    {
        return view('register');
    }

    // 🔹 PROSES REGISTER
    public function registerProses(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:100',
            'email' => 'required|email|unique:pengguna,email',
            'kontak' => 'required|max:15',
            'username' => 'required|min:4|unique:pengguna,username',
            'password' => 'required|min:6'
        ]);

        Pengguna::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Berhasil daftar!');
    }
    // 🔹 LOGOUT
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
