@extends('anggota.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Peminjaman Saya</h1>

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
@endsection
