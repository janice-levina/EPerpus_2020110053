@extends('anggota.master')

@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1 class="h3 mb-4 text-gray-800">Detail Buku</h1>

<div class="row">
    <div class="col-md-4">
        <img src="{{ asset('uploads/buku/' . $buku->cover) }}"
             class="img-fluid shadow">
    </div>

    <div class="col-md-8">
        <h3>{{ $buku->judul }}</h3>
        <p><b>Penulis:</b> {{ $buku->penulis }}</p>
        <p><b>Tahun:</b> {{ $buku->tahun }}</p>
        <p><b>Sinopsis:</b></p>
        <p>{{ $buku->sinopsis }}</p>

        <form action="{{ route('buku.anggota.pinjam', $buku->id) }}" method="POST">
            @csrf
            <button class="btn btn-primary mt-3">
                Pinjam
            </button>
        </form>

        <a href="{{ route('buku.anggota') }}" class="btn btn-secondary mt-3">
            Kembali
        </a>
    </div>
</div>
@endsection
