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

<h1 class="h3 mb-4 text-gray-800">Data Buku</h1>
<form method="GET" class="row mb-4">
    <div class="col-md-4">
        <input type="text" name="search" class="form-control"
               placeholder="Cari judul / penulis..."
               value="{{ request('search') }}">
    </div>

    <div class="col-md-4">
        <select name="kategori" class="form-control">
            <option value="">-- Semua Kategori --</option>
            @foreach ($kategori as $kat)
                <option value="{{ $kat->id }}"
                    {{ request('kategori') == $kat->id ? 'selected' : '' }}>
                    {{ $kat->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary btn-block">Filter</button>
    </div>

    <div class="col-md-2">
<a href="{{ url()->current() }}" class="btn btn-secondary btn-block">
    Reset
</a>

    </div>
</form>

<div class="row">
@forelse ($buku as $item)
    <div class="col-md-3 mb-4">
        <div class="card shadow">
            <img src="{{ asset('uploads/buku/' . $item->cover) }}"
                class="card-img-top img-fluid"
                style="height: 200px; object-fit: contain; background:white;">

            <div class="card-body">
                <h5 class="card-title">{{ $item->judul }}</h5>
                <p class="card-text">{{ $item->penulis }}</p>

                <a href="{{ route('buku.anggota.detail', $item->id) }}"
                   class="btn btn-info btn-sm btn-block">
                    Detail
                </a>

                <form action="{{ route('buku.anggota.pinjam', $item->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary btn-sm btn-block mt-2">
                        Pinjam
                    </button>
                </form>
            </div>
        </div>
    </div>
@empty
    <div class="col-12"><p class="text-muted">Belum ada data buku tersebut.</p></div>
@endforelse
</div>
@endsection
