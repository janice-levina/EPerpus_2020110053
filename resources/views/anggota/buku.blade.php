@extends('anggota.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Buku</h1>

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
                <button class="btn btn-success btn-sm" onclick="pinjamBuku('Laskar Pelangi')">Pinjam</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Bumi Manusia</td>
            <td>Pramoedya Ananta Toer</td>
            <td>Lentera Dipantara</td>
            <td>1980</td>
            <td>
                <button class="btn btn-success btn-sm" onclick="pinjamBuku('Bumi Manusia')">Pinjam</button>
            </td>
        </tr>
        <!-- Tambahkan data buku dummy lain sesuai kebutuhan -->
    </tbody>
</table>

@endsection

@section('scripts')
<script>
function pinjamBuku(judul) {
    alert('Buku "' + judul + '" berhasil dipinjam!');
    window.location.href = "{{ route('peminjaman') }}";
}
</script>
@endsection

