@extends('layout.master')

@section('content')
<h3>Form Pengembalian Buku</h3>

<div class="card p-4">
    <p><b>Judul Buku:</b> {{ $data->judul }}</p>
    <p><b>Tanggal Pinjam:</b> {{ $data->tanggal_pinjam }}</p>
    <p><b>Tenggat:</b> {{ $data->tenggat_pengembalian }}</p>

    <form action="{{ route('buku.kembalikan.admin', $data->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Tanggal Pengembalian</label>
            <input type="date" name="tanggal_kembali" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Simpan Pengembalian
        </button>

<a href="{{ route('peminjaman.admin') }}" class="btn btn-secondary mt-3">
    Batal
</a>

    </form>
</div>
@endsection
