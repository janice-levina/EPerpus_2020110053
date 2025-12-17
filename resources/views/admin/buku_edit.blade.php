@extends('layout.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Buku</h1>

<div class="card shadow p-4">
    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" required>
        </div>

        <div class="form-group">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control">
                @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ $kat->id == $buku->kategori_id ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Tahun Terbit</label>
            <input type="number" name="tahun" class="form-control" value="{{ $buku->tahun }}">
        </div>

        <div class="form-group">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control">{{ $buku->sinopsis }}</textarea>
        </div>

        <div class="form-group">
            <label>Cover Buku Sekarang</label><br>
            <img src="{{ asset('uploads/buku/' . $buku->cover) }}"
                 style="height: 200px; object-fit: cover;"
                 class="img-thumbnail mb-3">

            <input type="hidden" name="old_cover" value="{{ $buku->cover }}">
        </div>

        <div class="form-group">
            <label>Ganti Cover Baru (opsional)</label>
            <input type="file" name="cover" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary btn-block">Simpan Perubahan</button>
    </form>
</div>

@endsection
