@extends('anggota.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Pengembalian</h1>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Terlambat</th>
            <th>Denda</th>
            <th>Status Denda</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->tanggal_pinjam }}</td>
            <td>{{ $item->tanggal_kembali }}</td>
            <td>{{ $item->terlambat }} hari</td>
            <td>Rp {{ number_format($item->jumlah ?? 0, 0) }}</td>
            <td>
                @if ($item->status_denda == 'lunas')
                    <span class="badge bg-success">Lunas</span>
                @elseif ($item->jumlah > 0)
                    <span class="badge bg-danger">Belum Dibayar</span>
                @else
                    <span class="badge bg-secondary">Tidak Ada</span>
                @endif
            </td>
            <td>
                @if ($item->jumlah > 0 && $item->status_denda == 'belum dibayar')
                    <form action="{{ route('denda.bayar', $item->denda_id) }}" method="POST">
                        @csrf
                        <button class="btn btn-warning btn-sm">
                            Bayar
                        </button>
                    </form>
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
