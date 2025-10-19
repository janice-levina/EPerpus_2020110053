@extends('layout.master')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data Buku</h1>

<a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahBukuModal">+ Tambah Buku</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Laskar Pelangi</td>
                <td>Andrea Hirata</td>
                <td>Bentang Pustaka</td>
                <td>2005</td>
                <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Bumi Manusia</td>
                <td>Pramoedya Ananta Toer</td>
                <td>Lentera Dipantara</td>
                <td>1980</td>
                <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
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
