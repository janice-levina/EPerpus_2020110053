@extends('anggota.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Laporan Peminjaman & Pengembalian</h1>

<!-- Tabel Peminjaman -->
<h5 class="mt-3">Peminjaman Saya</h5>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Laskar Pelangi</td>
            <td>10-10-2025</td>
            <td>Dipinjam</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Bumi Manusia</td>
            <td>12-10-2025</td>
            <td>Dikembalikan</td>
        </tr>
    </tbody>
</table>

<!-- Tabel Pengembalian -->
<h5 class="mt-3">Pengembalian Saya</h5>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Laskar Pelangi</td>
            <td>20-10-2025</td>
            <td>0</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Bumi Manusia</td>
            <td>22-10-2025</td>
            <td>5.000</td>
        </tr>
    </tbody>
</table>
@endsection
