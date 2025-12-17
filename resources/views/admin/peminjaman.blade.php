@extends('layout.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Peminjaman Anggota</h1>

<table class="table table-bordered table-striped">
    <tr class="text-center">
        <th>No</th>
        <th>Nama Anggota</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tenggat</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        <th>Denda</th>
        <th>Aksi</th>
    </tr>

    @foreach ($data as $i => $item)
    <tr class="text-center">
        <td>{{ $i + 1 }}</td>
        <td>{{ $item->nama_lengkap }}</td>
        <td>{{ $item->judul }}</td>
        <td>{{ $item->tanggal_pinjam }}</td>
        <td>{{ $item->tenggat_pengembalian }}</td>
        <td>{{ $item->tanggal_kembali ?? '-' }}</td>
        <td>
            @if ($item->status == 'dipinjam')
                <span class="badge badge-warning">Dipinjam</span>
            @else
                <span class="badge badge-success">Dikembalikan</span>
            @endif
        </td>
        <td>
            @if ($item->denda > 0)
                Rp {{ number_format($item->denda) }}
            @else
                -
            @endif
        </td>
        <td>
    @if($item->status == 'dipinjam')
        <a href="{{ route('buku.form-kembali', $item->id) }}"
           class="btn btn-warning btn-sm">
           Konfirmasi Kembali
        </a>
    @else
        <span class="badge badge-success">Selesai</span>
    @endif
</td>

    </tr>
    @endforeach
</table>
@endsection
