@extends('layout.master')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data Anggota</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota</h6>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahAnggotaModal">+ Tambah Anggota</a>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Budi Santoso</td>
                            <td>budi@example.com</td>
                            <td>08123456789</td>
                            <td>Bandung</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Siti Rahma</td>
                            <td>siti@example.com</td>
                            <td>08129876543</td>
                            <td>Jakarta</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahAnggotaModal" tabindex="-1" role="dialog" aria-labelledby="tambahAnggotaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Anggota (Dummy)</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group"><label>Nama Anggota</label><input type="text" class="form-control" placeholder="Masukkan nama"></div>
          <div class="form-group"><label>Alamat</label><input type="text" class="form-control" placeholder="Masukkan alamat"></div>
          <div class="form-group"><label>No. Telepon</label><input type="text" class="form-control" placeholder="Masukkan nomor telepon"></div>
          <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Simpan (Dummy)</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
