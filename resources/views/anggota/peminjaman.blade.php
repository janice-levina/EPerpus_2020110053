@extends('anggota.master')

@section('content')
<h1 class="h3 mb-4">Peminjaman Saya</h1>

<table class="table table-bordered">
    <tr>
        <th>Judul</th>
        <th>Tanggal Pinjam</th>
        <th>Tenggat</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($data as $item)
    <tr>
        <td>{{ $item->judul }}</td>
        <td>{{ $item->tanggal_pinjam }}</td>
        <td>{{ $item->tenggat_pengembalian }}</td>
        <td>{{ $item->status }}</td>
        <td>
            @if($item->status == 'dipinjam')
<a href="{{ route('buku.form-kembali.anggota', $item->id) }}"
   class="btn btn-warning btn-sm">
   Kembalikan
</a>

            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection
