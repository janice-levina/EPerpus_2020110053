@extends('anggota.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Laporan Peminjaman & Pengembalian</h1>

<form method="GET" action="{{ route('laporan.anggota') }}">
    <div class="row mb-3">
        <div class="col-md-3">
            <input type="date" name="from" class="form-control" value="{{ request('from') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="to" class="form-control" value="{{ request('to') }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari Judul Buku"
                   value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary btn-block">Filter</button>
        </div>
    </div>
</form>

<!-- ✅ PRINT SESUAI FILTER -->
<a href="{{ route('laporan.anggota.print', request()->all()) }}"
   target="_blank"
   class="btn btn-success mb-3">
    Print
</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Tanggal Pinjam</th>
        <th>Tenggat</th>
        <th>Tanggal Kembali</th>
        <th>Denda</th>
        <th>Status</th>
    </tr>

    @forelse($data as $i => $row)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $row->judul }}</td>
        <td>{{ $row->tanggal_pinjam }}</td>
        <td>{{ $row->tenggat_pengembalian }}</td>
        <td>{{ $row->tanggal_kembali ?? '-' }}</td>
        <td>Rp {{ number_format($row->denda ?? 0) }}</td>
        <td>{{ $row->status }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="7" class="text-center">Data tidak ditemukan</td>
    </tr>
    @endforelse
</table>
@endsection
