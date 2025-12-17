<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman Admin</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th { background: #eee; }
    </style>
</head>
<body onload="window.print()">

<h3 align="center">Laporan Peminjaman & Pengembalian (Admin)</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tenggat</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $i => $row)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $row->nama_lengkap }}</td>
            <td>{{ $row->judul }}</td>
            <td>{{ $row->tanggal_pinjam }}</td>
            <td>{{ $row->tenggat_pengembalian }}</td>
            <td>{{ $row->tanggal_kembali ?? '-' }}</td>
            <td>Rp {{ number_format($row->denda ?? 0) }}</td>
            <td>{{ $row->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
