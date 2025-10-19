@extends('layout.master')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Peminjaman Buku</h1>

    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahPeminjamanModal">+ Tambah Peminjaman</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Transaksi</th>
                            <th>Nama Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PMJ-2025-001</td>
                            <td>Budi Santoso</td>
                            <td>Laskar Pelangi</td>
                            <td>2025-10-01</td>
                            <td>2025-10-08</td>
                            <td><span class="badge badge-warning">Dipinjam</span></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>PMJ-2025-002</td>
                            <td>Siti Rahma</td>
                            <td>Bumi Manusia</td>
                            <td>2025-09-25</td>
                            <td>2025-10-02</td>
                            <td><span class="badge badge-success">Dikembalikan</span></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahPeminjamanModal" tabindex="-1" role="dialog" aria-labelledby="tambahPeminjamanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Peminjaman (Dummy)</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group"><label>Nama Peminjam</label><input type="text" class="form-control" placeholder="Masukkan nama"></div>
          <div class="form-group"><label>Judul Buku</label><input type="text" class="form-control" placeholder="Masukkan judul buku"></div>
          <div class="form-group"><label>Tanggal Pinjam</label><input type="date" class="form-control"></div>
          <div class="form-group"><label>Tanggal Jatuh Tempo</label><input type="date" class="form-control"></div>
          <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Simpan (Dummy)</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
