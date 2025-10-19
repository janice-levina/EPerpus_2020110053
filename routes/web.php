<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard'); // sesuaikan nama view dashboard kamu
})->name('dashboard');

Route::get('/buku', function () {
    return view('admin.buku');

});
Route::get('/anggota', function () {
    return view('admin.anggota');
})->name('anggota');

Route::get('/peminjaman', function () {
    return view('admin.peminjaman');
})->name('peminjaman');

Route::get('/pengembalian', function () {
    return view('admin.pengembalian');
})->name('pengembalian');

Route::get('/laporan', function () {
    return view('admin.laporan');
})->name('laporan');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::get('/logout', function () {
    return redirect()->route('login');
})->name('logout');


// INI BUAT ANGGOTA ?

// Dashboard anggota
Route::get('/dashboard-anggota', function () {
    return view('anggota.dashboard');
})->name('dashboard-anggota');

// Halaman anggota
Route::get('/buku-anggota', function () {
    return view('anggota.buku');
})->name('buku-anggota');

Route::get('/peminjaman-anggota', function () {
    return view('anggota.peminjaman');
})->name('peminjaman-anggota');

Route::get('/pengembalian-anggota', function () {
    return view('anggota.pengembalian');
})->name('pengembalian-anggota');

Route::get('/laporan-anggota', function () {
    return view('anggota.laporan');
})->name('laporan-anggota');

