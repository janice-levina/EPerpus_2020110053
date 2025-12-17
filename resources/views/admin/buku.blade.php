@extends('layout.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Buku</h1>

<!-- Tombol Tambah Buku -->
<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahBukuModal">
    + Tambah Buku
</button>

<div class="row">
    @forelse ($buku as $item)
    <div class="col-md-3 mb-4">
        <div class="card shadow">
            <img src="{{ asset('uploads/buku/' . $item->cover) }}"
                class="card-img-top img-fluid"
                style="height: 250px; object-fit: contain; background:white;"
                alt="{{ $item->judul }}">

            <div class="card-body">
                <h5 class="card-title">{{ $item->judul }}</h5>
                <p class="card-text">Penulis: {{ $item->penulis }}</p>
                <p class="card-text">Kategori: {{ $item->nama_kategori ?? '-' }}</p>
                <p class="card-text">Tahun: {{ $item->tahun }}</p>

                <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('buku.destroy', $item->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus buku ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
        <div class="col-12">
            <p class="text-muted">Belum ada data buku.</p>
        </div>
    @endforelse
</div>


<!-- Modal Tambah Buku -->
<div class="modal fade" id="tambahBukuModal" tabindex="-1" role="dialog" aria-labelledby="tambahBukuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Tambah Buku</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="judul" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control">
                @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Tahun Terbit</label>
            <input type="number" name="tahun" class="form-control">
          </div>

          <div class="form-group">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label>Cover Buku</label>
            <input type="file" name="cover" class="form-control" accept="image/*">
          </div>

          <button class="btn btn-primary btn-block">Simpan</button>
        </form>
      </div>

    </div>
  </div>
</div>

@endsection
