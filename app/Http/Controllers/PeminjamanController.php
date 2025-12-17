<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function pinjam($id)
    {
        // Ambil user dari session
        $user_id = session('user_id');

        if (!$user_id) {
            return redirect()->route('login')->with('error', 'Silakan login dulu');
        }

        // Simpan ke tabel peminjaman
        DB::table('peminjaman')->insert([
            'user_id' => $user_id,
            'buku_id' => $id,
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam'
        ]);

        // Update status buku
        DB::table('buku')->where('id', $id)->update([
            'status' => 'dipinjam'
        ]);

        return redirect()->back()->with('success', 'Buku berhasil dipinjam!');
    }
public function formKembali($id)
{
    $pinjam = DB::table('peminjaman')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->where('peminjaman.id', $id)
        ->select('peminjaman.*', 'buku.judul')
        ->first();

    return view('anggota.form-kembali', compact('pinjam'));
}

public function kembalikan(Request $request, $id)
{
    $pinjam = DB::table('peminjaman')->where('id', $id)->first();

    $tanggal_kembali = $request->tanggal_kembali;
    $tenggat = $pinjam->tenggat_pengembalian;

    $hariTerlambat = max(0, (strtotime($tanggal_kembali) - strtotime($tenggat)) / 86400);
    $hariTerlambat = floor($hariTerlambat);

    $denda = $hariTerlambat * 1000;

    DB::table('peminjaman')->where('id', $id)->update([
        'tanggal_kembali' => $tanggal_kembali,
        'terlambat' => $hariTerlambat,
        'denda' => $denda,
        'status' => 'dikembalikan'
    ]);

    if ($denda > 0) {
        DB::table('denda')->insert([
            'peminjaman_id' => $id,
            'jumlah' => $denda,
            'status' => 'belum dibayar'
        ]);
    }

    return redirect()->route('peminjaman-anggota')
        ->with('success', 'Buku berhasil dikembalikan.');
}


}
