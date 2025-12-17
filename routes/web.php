<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;

// =======================
//        LOGIN
// =======================
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// =======================
//        REGISTER
// =======================
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');

// =======================
//      DASHBOARD
// =======================
Route::get('/', [LoginController::class, 'showForm']);

Route::get('/dashboard', [BukuController::class, 'dashboardAdmin'])
    ->name('dashboard');


Route::get('/dashboard-anggota', [BukuController::class, 'dashboardAnggota'])
    ->name('dashboard-anggota');


// =======================
//  MENU ADMIN
// =======================

Route::get('/admin/anggota', [BukuController::class, 'dataAnggota'])
    ->name('anggota');

Route::delete('/admin/anggota/{id}', [BukuController::class, 'hapusAnggota'])
    ->name('anggota.hapus');

Route::get('/peminjaman', fn() => view('admin.peminjaman'))->name('peminjaman');

Route::get('/admin/peminjaman', [BukuController::class, 'peminjamanAdmin'])
    ->name('peminjaman.admin');

Route::get('/admin/pengembalian', [BukuController::class, 'pengembalianAdmin'])
    ->name('pengembalian.admin');



// =======================
//  MENU ANGGOTA
// =======================
Route::get('/peminjaman-anggota', fn() => view('anggota.peminjaman'))->name('peminjaman-anggota');
Route::get('/pengembalian-anggota', [BukuController::class, 'denda'])
    ->name('pengembalian-anggota');

// =======================
//  LAPORAN ANGGOTA
// =======================
Route::get('/laporan-anggota', [BukuController::class, 'laporanAnggota'])
    ->name('laporan.anggota');

Route::get('/laporan-anggota/print', [BukuController::class, 'printLaporanAnggota'])
    ->name('laporan.anggota.print');

// =======================
//        BUKU CRUD
// =======================
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

// =======================
//  BUKU ANGGOTA
// =======================
Route::get('/buku-anggota', [BukuController::class, 'anggotaIndex'])->name('buku.anggota');
Route::get('/buku-anggota/{id}', [BukuController::class, 'detailAnggota'])->name('buku.anggota.detail');
Route::get('/anggota/buku', [BukuController::class, 'anggotaIndex'])->name('buku.anggota');
// =======================
//  PROSES PINJAM BUKU
// =======================
Route::post('/buku-anggota/{id}/pinjam', [BukuController::class, 'pinjam'])->name('buku.anggota.pinjam');

// =======================
//  PEMINJAMAN ANGGOTA
// =======================
Route::get('/peminjaman-anggota', [BukuController::class, 'peminjamanAnggota'])->name('peminjaman-anggota');



Route::post('/buku-anggota/{id}/pinjam', [BukuController::class, 'pinjam'])
    ->name('buku.anggota.pinjam');

Route::get('/peminjaman-anggota', [BukuController::class, 'peminjamanAnggota'])
    ->name('peminjaman-anggota');


Route::get('/denda', [BukuController::class, 'denda'])
    ->name('denda');

Route::post('/denda/{id}/bayar', [BukuController::class, 'bayarDenda'])
    ->name('denda.bayar');

// FORM PENGEMBALIAN ADMIN
Route::get('/admin/pengembalian/{id}', [BukuController::class, 'formKembali'])
->name('buku.form-kembali');

// PROSES PENGEMBALIAN ADMIN
Route::post('/admin/pengembalian/{id}', [BukuController::class, 'kembalikanAdmin'])
->name('buku.kembalikan.admin');

// PROSES PENGEMBALIAN ANGGOTA
Route::post('/anggota/pengembalian/{id}', [BukuController::class, 'kembalikanAnggota'])
->name('buku.kembalikan.anggota');

// FORM PENGEMBALIAN ANGGOTA (GET)
Route::get('/anggota/pengembalian/{id}', [BukuController::class, 'formKembaliAnggota'])
->name('buku.form-kembali.anggota');

// =======================
//   PENGEMBALIAN ADMIN
// =======================
Route::get('/admin/pengembalian', [BukuController::class, 'pengembalianAdmin'])
    ->name('pengembalian.admin');

Route::post('/admin/denda/{id}/bayar', [BukuController::class, 'bayarDendaAdmin'])
    ->name('denda.admin.bayar');

Route::get('/admin/laporan', [BukuController::class, 'laporan'])
    ->name('laporan.admin');


Route::get('/admin/laporan/print', [BukuController::class, 'printLaporanAdmin'])
    ->name('laporan.admin.print');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendToken'])->name('password.email');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

