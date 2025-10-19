@extends('layout.master')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Laporan Peminjaman & Pengembalian</h1>

    <!-- Laporan Peminjaman -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive mb-4">
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
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>PMJ-2025-002</td>
                            <td>Siti Rahma</td>
                            <td>Bumi Manusia</td>
                            <td>2025-09-25</td>
                            <td>2025-10-02</td>
                            <td><span class="badge badge-success">Dikembalikan</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Laporan Pengembalian -->
            <h6 class="font-weight-bold text-primary mb-2">Laporan Pengembalian</h6>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Budi Santoso</td>
                            <td>Laskar Pelangi</td>
                            <td>2025-10-01</td>
                            <td>2025-10-08</td>
                            <td><span class="badge badge-warning">Terlambat</span></td>
                            <td>Rp 2.000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Siti Rahma</td>
                            <td>Bumi Manusia</td>
                            <td>2025-09-25</td>
                            <td>2025-10-02</td>
                            <td><span class="badge badge-success">Tepat Waktu</span></td>
                            <td>Rp 0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
