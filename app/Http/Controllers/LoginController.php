<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // ✅ VALIDASI + CAPTCHA
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'captcha'  => 'required|captcha'
        ]);

        $user = DB::table('users')
            ->where('username', $request->username)
            ->first();

        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        session([
            'user_id' => $user->id,
            'username' => $user->username,
            'nama_lengkap' => $user->nama_lengkap,
            'role' => $user->role
        ]);

        return $user->role === 'admin'
            ? redirect()->route('dashboard')
            : redirect()->route('dashboard-anggota');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
