@extends('layout.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Anggota</h1>

<table class="table table-bordered table-striped">
    <thead class="table-dark text-center">
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Email</th>
        </tr>
    </thead>

    <tbody>
        @forelse($anggota as $i => $a)
        <tr class="text-center">
            <td>{{ $i + 1 }}</td>
            <td>{{ $a->nama_lengkap }}</td>
            <td>{{ $a->username }}</td>
            <td>{{ $a->alamat }}</td>
            <td>{{ $a->no_telp }}</td>
            <td>{{ $a->email }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada anggota</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
