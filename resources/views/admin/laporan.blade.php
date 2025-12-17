@extends('layout.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Laporan Peminjaman & Pengembalian (Admin)</h1>

<form method="GET" action="{{ route('laporan.admin') }}">
    <div class="row mb-3">
        <!-- Filter Tanggal -->
        <div class="col-md-2">
            <input type="date" name="from" class="form-control" value="{{ request('from') }}">
        </div>

        <div class="col-md-2">
            <input type="date" name="to" class="form-control" value="{{ request('to') }}">
        </div>

        <!-- Filter Anggota -->
        <div class="col-md-3">
            <select name="anggota" class="form-control">
                <option value="">-- Semua Anggota --</option>
                @foreach ($anggota as $a)
                    <option value="{{ $a->id }}" {{ request('anggota') == $a->id ? 'selected' : '' }}>
                        {{ $a->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Search Judul -->
        <div class="col-md-3">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari Judul Buku"
                   value="{{ request('search') }}">
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary btn-block">Filter</button>
        </div>
    </div>
</form>

<!-- ✅ PRINT ADMIN SESUAI FILTER -->
<a href="{{ route('laporan.admin.print', request()->all()) }}"
   target="_blank"
   class="btn btn-success mb-3">
    Print
</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark text-center">
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Judul</th>
            <th>Tanggal Pinjam</th>
            <th>Tenggat</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @forelse($data as $i => $row)
        <tr class="text-center">
            <td>{{ $i + 1 }}</td>
            <td>{{ $row->nama_lengkap }}</td>
            <td>{{ $row->judul }}</td>
            <td>{{ $row->tanggal_pinjam }}</td>
            <td>{{ $row->tenggat_pengembalian }}</td>
            <td>{{ $row->tanggal_kembali ?? '-' }}</td>
            <td>Rp {{ number_format($row->denda ?? 0) }}</td>
            <td>{{ $row->status }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">Data tidak ditemukan</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
