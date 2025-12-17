<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // Dummy login admin
        if ($username === 'admin' && $password === '123') {
            return redirect()->route('dashboard');
        }

        // Dummy login anggota
        if ($username === 'anggota' && $password === '123') {
            return redirect()->route('dashboard-anggota');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        return redirect()->route('login');
    }
}
