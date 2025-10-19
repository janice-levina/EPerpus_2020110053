@extends('layout.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Buku</h1>

<a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahBukuModal">+ Tambah Buku</a>

<div class="row">
    <!-- Buku 1 -->
    <div class="col-md-3 mb-4">
        <div class="card shadow">
            <img src="{{ asset('img/laskar.jpg') }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Laskar Pelangi">
            <div class="card-body">
                <h5 class="card-title">Laskar Pelangi</h5>
                <p class="card-text">Penulis: Andrea Hirata</p>
                <p class="card-text">Penerbit: Bentang Pustaka</p>
                <p class="card-text">Tahun: 2005</p>
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Hapus</button>
            </div>
        </div>
    </div>

    <!-- Buku 2 -->
    <div class="col-md-3 mb-4">
        <div class="card shadow">
            <img src="{{ asset('img/bumi.jpg') }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Bumi Manusia">
            <div class="card-body">
                <h5 class="card-title">Bumi Manusia</h5>
                <p class="card-text">Penulis: Pramoedya Ananta Toer</p>
                <p class="card-text">Penerbit: Lentera Dipantara</p>
                <p class="card-text">Tahun: 1980</p>
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Buku -->
<div class="modal fade" id="tambahBukuModal" tabindex="-1" role="dialog" aria-labelledby="tambahBukuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Buku (Dummy)</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group"><label>Judul Buku</label><input type="text" class="form-control" placeholder="Masukkan judul buku"></div>
          <div class="form-group"><label>Penulis</label><input type="text" class="form-control" placeholder="Masukkan penulis"></div>
          <div class="form-group"><label>Penerbit</label><input type="text" class="form-control" placeholder="Masukkan penerbit"></div>
          <div class="form-group"><label>Tahun Terbit</label><input type="number" class="form-control" placeholder="Masukkan tahun terbit"></div>
          <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Simpan (Dummy)</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
