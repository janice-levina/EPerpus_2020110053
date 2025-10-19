@extends('anggota.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Buku</h1>

<div class="row">

    <!-- Buku 1 -->
    <div class="col-md-3 mb-4">
        <div class="card shadow">
            <img src="{{ asset('img/laskar.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Laskar Pelangi">
            <div class="card-body">
                <h5 class="card-title">Laskar Pelangi</h5>
                <p class="card-text">Andrea Hirata</p>
                <!-- Tombol Detail -->
                <button class="btn btn-info btn-block" data-toggle="collapse" data-target="#detail1">Detail</button>
                <div id="detail1" class="collapse mt-2">
                    <p>Penerbit: Bentang Pustaka</p>
                    <p>Tahun Terbit: 2005</p>
                    <p>Sinopsis: Kisah inspiratif tentang anak-anak di Belitung...</p>
                    <button class="btn btn-primary btn-block">PINJAM</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Buku 2 -->
    <div class="col-md-3 mb-4">
        <div class="card shadow">
            <img src="{{ asset('img/bumi.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Bumi Manusia">
            <div class="card-body">
                <h5 class="card-title">Bumi Manusia</h5>
                <p class="card-text">Pramoedya Ananta Toer</p>
                <!-- Tombol Detail -->
                <button class="btn btn-info btn-block" data-toggle="collapse" data-target="#detail2">Detail</button>
                <div id="detail2" class="collapse mt-2">
                    <p>Penerbit: Lentera Dipantara</p>
                    <p>Tahun Terbit: 1980</p>
                    <p>Sinopsis: Cerita tentang masa kolonial dan perjuangan hidup...</p>
                    <button class="btn btn-primary btn-block">PINJAM</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
