<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    // =========================
    // ADMIN
    // =========================
public function index(Request $request)
{
    $query = DB::table('buku')
        ->leftJoin('kategori', 'buku.kategori_id', '=', 'kategori.id')
        ->select('buku.*', 'kategori.nama_kategori');

    // ✅ SEARCH JUDUL / PENULIS
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('buku.judul', 'like', '%' . $request->search . '%')
              ->orWhere('buku.penulis', 'like', '%' . $request->search . '%');
        });
    }

    // ✅ FILTER KATEGORI
    if ($request->kategori) {
        $query->where('buku.kategori_id', $request->kategori);
    }

    $buku = $query->get();
    $kategori = DB::table('kategori')->get();

    return view('admin.buku', compact('buku', 'kategori'));
}

    public function store(Request $request)
    {
        $coverName = null;

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $coverName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/buku'), $coverName);
        }

        DB::table('buku')->insert([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'kategori_id' => $request->kategori_id,
            'tahun' => $request->tahun,
            'sinopsis' => $request->sinopsis,
            'cover' => $coverName,
            'status' => 'in stock'
        ]);

        return redirect()->route('buku.index');
    }

    public function edit($id)
    {
        $buku = DB::table('buku')->where('id', $id)->first();
        $kategori = DB::table('kategori')->get();

        return view('admin.buku_edit', compact('buku', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $coverName = $request->old_cover;

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $coverName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/buku'), $coverName);
        }

        DB::table('buku')->where('id', $id)->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'kategori_id' => $request->kategori_id,
            'tahun' => $request->tahun,
            'sinopsis' => $request->sinopsis,
            'cover' => $coverName
        ]);

        return redirect()->route('buku.index');
    }

    // =========================
    // ANGGOTA
    // =========================

public function anggotaIndex(Request $request)
{
    $query = DB::table('buku')
        ->leftJoin('kategori', 'buku.kategori_id', '=', 'kategori.id')
        ->select('buku.*', 'kategori.nama_kategori');

    // ✅ SEARCH JUDUL / PENULIS
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('buku.judul', 'like', '%' . $request->search . '%')
              ->orWhere('buku.penulis', 'like', '%' . $request->search . '%');
        });
    }

    // ✅ FILTER KATEGORI
    if ($request->kategori) {
        $query->where('buku.kategori_id', $request->kategori);
    }

    $buku = $query->get();
    $kategori = DB::table('kategori')->get(); // ✅ INI YANG TADI KURANG

    return view('anggota.buku', compact('buku', 'kategori'));
}


    public function detailAnggota($id)
    {
        $buku = DB::table('buku')->where('id', $id)->first();
        return view('anggota.detail-buku', compact('buku'));
    }

public function pinjam($id)
{
    $user_id = session('user_id');

    // ❌ Jika masih punya denda → tidak boleh pinjam
    $cekDenda = DB::table('denda')
        ->join('peminjaman', 'denda.peminjaman_id', '=', 'peminjaman.id')
        ->where('peminjaman.user_id', $user_id)
        ->where('denda.status', 'belum dibayar')
        ->first();

    if ($cekDenda) {
        return back()->with('error', 'Bayar denda dulu sebelum meminjam buku.');
    }

    $tanggal_pinjam = date('Y-m-d');
    $tenggat = date('Y-m-d', strtotime('+7 days'));

    DB::table('peminjaman')->insert([
        'user_id' => $user_id,
        'buku_id' => $id,
        'tanggal_pinjam' => $tanggal_pinjam,
        'tenggat_pengembalian' => $tenggat,
        'status' => 'dipinjam'
    ]);

    return redirect()->route('peminjaman-anggota')->with('success', 'Buku berhasil dipinjam!');
}


public function peminjamanAnggota()
{
    $data = DB::table('peminjaman')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->where('peminjaman.user_id', session('user_id'))
        ->select('peminjaman.*', 'buku.judul')
        ->get();

    return view('anggota.peminjaman', compact('data'));
}

// =====================
// PENGEMBALIAN (ADMIN & ANGGOTA DIPISAH)
// =====================

// ✅ PENGEMBALIAN ADMIN
public function kembalikanAdmin(Request $request, $id)
{
    $this->prosesKembali($request, $id);

    return redirect()->route('peminjaman.admin')
        ->with('success', 'Buku berhasil dikembalikan (Admin).');
}

// ✅ PENGEMBALIAN ANGGOTA
public function kembalikanAnggota(Request $request, $id)
{
    $this->prosesKembali($request, $id);

    return redirect()->route('peminjaman-anggota')
        ->with('success', 'Buku berhasil dikembalikan (Anggota).');
}

// ✅ LOGIKA UTAMA (DIPAKAI BERSAMA)
private function prosesKembali(Request $request, $id)
{
    $pinjam = DB::table('peminjaman')->where('id', $id)->first();
    $tanggal_kembali = $request->tanggal_kembali;

    $hariTerlambat = max(0, (strtotime($tanggal_kembali) - strtotime($pinjam->tenggat_pengembalian)) / 86400);
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
}



public function denda()
{
    $data = DB::table('denda')
        ->join('peminjaman', 'denda.peminjaman_id', '=', 'peminjaman.id')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->where('peminjaman.user_id', session('user_id'))
        ->select('denda.*', 'buku.judul')
        ->get();

    return view('anggota.denda', compact('data'));
}

public function bayarDenda($id)
{
    DB::table('denda')->where('id', $id)->update([
        'status' => 'lunas'
    ]);

    return back()->with('success', 'Denda berhasil dibayar.');
}

public function formKembali($id)
{
    $data = DB::table('peminjaman')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->where('peminjaman.id', $id)
        ->select('peminjaman.*', 'buku.judul')
        ->first();

    return view('admin.form-kembali', compact('data'));
}

public function pengembalianAnggota()
{
    $data = DB::table('peminjaman')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->leftJoin('denda', 'peminjaman.id', '=', 'denda.peminjaman_id')
        ->where('peminjaman.user_id', session('user_id'))
        ->where('peminjaman.status', 'dikembalikan')
        ->select(
            'peminjaman.*',
            'buku.judul',
            'denda.jumlah',
            'denda.status as status_denda',
            'denda.id as denda_id'
        )
        ->get();

    return view('anggota.pengembalian', compact('data'));
}

// =====================
// LAPORAN ANGGOTA
// =====================
public function laporanAnggota(Request $request)
{
    $query = DB::table('peminjaman')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->leftJoin('denda', 'peminjaman.id', '=', 'denda.peminjaman_id')
        ->where('peminjaman.user_id', session('user_id'))
        ->select(
            'peminjaman.*',
            'buku.judul',
            'denda.jumlah as denda',
            'denda.status as status_denda'
        );

    // ✅ FILTER TANGGAL
    if ($request->from && $request->to) {
        $query->whereBetween('tanggal_pinjam', [$request->from, $request->to]);
    }

    // ✅ SEARCH JUDUL
    if ($request->search) {
        $query->where('buku.judul', 'like', '%' . $request->search . '%');
    }

    $data = $query->get();

    return view('anggota.laporan', compact('data'));
}


// =====================
// PRINT LAPORAN ANGGOTA (PAKAI FILTER JUGA)
// =====================
public function printLaporanAnggota(Request $request)
{
    $query = DB::table('peminjaman')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->leftJoin('denda', 'peminjaman.id', '=', 'denda.peminjaman_id')
        ->where('peminjaman.user_id', session('user_id'))
        ->select(
            'peminjaman.*',
            'buku.judul',
            'denda.jumlah as denda',
            'denda.status as status_denda'
        );

    // ✅ FILTER DARI FORM JUGA
    if ($request->from && $request->to) {
        $query->whereBetween('tanggal_pinjam', [$request->from, $request->to]);
    }

    // ✅ SEARCH JUGA KE PRINT
    if ($request->search) {
        $query->where('buku.judul', 'like', '%' . $request->search . '%');
    }

    $data = $query->get();

    return view('anggota.laporan-print', compact('data'));
}

// =====================
// DASHBOARD ANGGOTA
// =====================
public function dashboardAnggota()
{
    $user_id = session('user_id');

    // ✅ Jumlah seluruh buku
    $jumlahBuku = DB::table('buku')->count();

    // ✅ Buku sedang dipinjam oleh anggota login
    $dipinjam = DB::table('peminjaman')
        ->where('user_id', $user_id)
        ->where('status', 'dipinjam')
        ->count();

    // ✅ Buku sudah dikembalikan oleh anggota login
    $dikembalikan = DB::table('peminjaman')
        ->where('user_id', $user_id)
        ->where('status', 'dikembalikan')
        ->count();

    // ✅ Total denda BELUM LUNAS
    $totalDenda = DB::table('denda')
        ->join('peminjaman', 'denda.peminjaman_id', '=', 'peminjaman.id')
        ->where('peminjaman.user_id', $user_id)
        ->where('denda.status', 'belum dibayar')
        ->sum('denda.jumlah');

    return view('anggota.dashboard', compact(
        'jumlahBuku',
        'dipinjam',
        'dikembalikan',
        'totalDenda'
    ));
}

// =====================
// PEMINJAMAN ADMIN
// =====================
public function peminjamanAdmin()
{
    $data = DB::table('peminjaman')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->join('users', 'peminjaman.user_id', '=', 'users.id')
        ->select(
            'peminjaman.*',
            'buku.judul',
            'users.nama_lengkap'
        )
        ->orderBy('peminjaman.id', 'desc')
        ->get();

    return view('admin.peminjaman', compact('data'));
}

public function formKembaliAnggota($id)
{
    $data = DB::table('peminjaman')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->where('peminjaman.id', $id)
        ->select('peminjaman.*', 'buku.judul')
        ->first();

    return view('anggota.form-kembali', compact('data'));
}

// =====================
// PENGEMBALIAN ADMIN
// =====================
public function pengembalianAdmin()
{
    $data = DB::table('peminjaman')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->join('users', 'peminjaman.user_id', '=', 'users.id')
        ->leftJoin('denda', 'peminjaman.id', '=', 'denda.peminjaman_id')
        ->where('peminjaman.status', 'dikembalikan')
        ->select(
            'peminjaman.*',
            'buku.judul',
            'users.nama_lengkap',
            'denda.jumlah',
            'denda.status as status_denda',
            'denda.id as denda_id'
        )
        ->orderBy('peminjaman.id', 'desc')
        ->get();

    return view('admin.pengembalian', compact('data'));
}

// =====================
// BAYAR DENDA DARI ADMIN
// =====================
public function bayarDendaAdmin($id)
{
    DB::table('denda')->where('id', $id)->update([
        'status' => 'lunas'
    ]);

    return redirect()->route('pengembalian.admin')
        ->with('success', 'Denda berhasil dibayar oleh Admin.');
}

public function laporan(Request $request)
{
    $data = DB::table('peminjaman')
        ->join('users', 'peminjaman.user_id', '=', 'users.id') // ✅ GANTI
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->leftJoin('denda', 'peminjaman.id', '=', 'denda.peminjaman_id')
        ->select(
            'users.nama_lengkap',  // ✅ GANTI
            'buku.judul',
            'peminjaman.*',
            'denda.jumlah as denda'
        )
        ->when($request->from, fn($q) =>
            $q->whereDate('tanggal_pinjam', '>=', $request->from))
        ->when($request->to, fn($q) =>
            $q->whereDate('tanggal_pinjam', '<=', $request->to))
        ->when($request->search, fn($q) =>
            $q->where('buku.judul', 'like', '%' . $request->search . '%'))
        ->when($request->anggota, fn($q) =>
            $q->where('users.id', $request->anggota)) // ✅ GANTI
        ->get();

    // ✅ AMBIL DATA DARI TABEL users
    $anggota = DB::table('users')->get();

    return view('admin.laporan', compact('data', 'anggota'));
}

public function printLaporanAdmin(Request $request)
{
    $data = DB::table('peminjaman')
        ->join('users', 'peminjaman.user_id', '=', 'users.id')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->leftJoin('denda', 'peminjaman.id', '=', 'denda.peminjaman_id')
        ->select(
            'users.nama_lengkap',
            'buku.judul',
            'peminjaman.*',
            'denda.jumlah as denda'
        )
        ->when($request->from, fn($q) =>
            $q->whereDate('tanggal_pinjam', '>=', $request->from))
        ->when($request->to, fn($q) =>
            $q->whereDate('tanggal_pinjam', '<=', $request->to))
        ->when($request->search, fn($q) =>
            $q->where('buku.judul', 'like', '%' . $request->search . '%'))
        ->when($request->anggota, fn($q) =>
            $q->where('users.id', $request->anggota))
        ->get();

    return view('admin.laporan-print', compact('data'));
}

// =====================
// DATA ANGGOTA (ADMIN)
// =====================
public function dataAnggota()
{
    $anggota = DB::table('users')->get();

    return view('admin.anggota', compact('anggota'));
}

// ✅ OPSIONAL: HAPUS ANGGOTA
public function hapusAnggota($id)
{
    DB::table('users')->where('id', $id)->delete();

    return back()->with('success', 'Anggota berhasil dihapus.');
}

// =====================
// DASHBOARD ADMIN (GLOBAL)
// =====================
public function dashboardAdmin()
{
    // ✅ Jumlah seluruh buku
    $jumlahBuku = DB::table('buku')->count();

    // ✅ Total buku sedang dipinjam oleh semua anggota
    $dipinjam = DB::table('peminjaman')
        ->where('status', 'dipinjam')
        ->count();

    // ✅ Total buku sudah dikembalikan oleh semua anggota
    $dikembalikan = DB::table('peminjaman')
        ->where('status', 'dikembalikan')
        ->count();

    // ✅ Total denda BELUM LUNAS seluruh anggota
    $totalDenda = DB::table('denda')
        ->where('status', 'belum dibayar')
        ->sum('jumlah');

    return view('admin.dashboard', compact(
        'jumlahBuku',
        'dipinjam',
        'dikembalikan',
        'totalDenda'
    ));
}


}
