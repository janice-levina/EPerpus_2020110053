@extends('anggota.master')

@section('content')
<h1 class="h3 mb-4">Denda</h1>

<table class="table table-bordered">
<tr>
    <th>Buku</th>
    <th>Jumlah</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

@foreach($data as $item)
<tr>
    <td>{{ $item->judul }}</td>
    <td>Rp {{ $item->jumlah }}</td>
    <td>{{ $item->status }}</td>
    <td>
        @if($item->status == 'belum dibayar')
        <form action="{{ route('denda.bayar', $item->id) }}" method="POST">
            @csrf
            <button class="btn btn-success btn-sm">Bayar</button>
        </form>
        @endif
    </td>
</tr>
@endforeach
</table>
@endsection
