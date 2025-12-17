@extends('layout.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Pengembalian (Admin)</h1>

<table class="table table-bordered table-striped">
    <thead class="thead-dark text-center">
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
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
        @foreach ($data as $i => $item)
        <tr class="text-center">
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->nama_lengkap }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->tanggal_pinjam }}</td>
            <td>{{ $item->tanggal_kembali ?? '-' }}</td>
            <td>{{ $item->terlambat ?? 0 }} hari</td>
            <td>
                @if($item->jumlah > 0)
                    Rp {{ number_format($item->jumlah) }}
                @else
                    -
                @endif
            </td>
            <td>
                @if(isset($item->status_denda) && $item->status_denda == 'lunas')
                    <span class="badge badge-success">Lunas</span>
                @elseif(isset($item->jumlah) && $item->jumlah > 0)
                    <span class="badge badge-danger">Belum Dibayar</span>
                @else
                    <span class="badge badge-secondary">Tidak Ada</span>
                @endif
            </td>
            <td>
                @if($item->status == 'dipinjam')
                    <!-- Konfirmasi kembalikan -> arahkan ke form kembalikan admin -->
                    <a href="{{ route('buku.form-kembali', $item->id) }}" class="btn btn-warning btn-sm mb-1">
                        Konfirmasi Kembali
                    </a>
                @else
                    <!-- Jika ada denda belum lunas, tunjukkan tombol Bayar -->
                    @if(isset($item->jumlah) && $item->jumlah > 0 && $item->status_denda == 'belum dibayar')
                        <form action="{{ route('denda.bayar', $item->denda_id) }}" method="POST" style="display:inline">
                            @csrf
                            <button class="btn btn-sm btn-success" onclick="return confirm('Lunasi denda?')">Lunasi</button>
                        </form>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
