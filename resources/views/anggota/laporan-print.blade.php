<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
    <style>
        body { font-family: Arial; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body onload="window.print()">

<h3 align="center">Laporan Peminjaman & Pengembalian</h3>

<table>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Tanggal Pinjam</th>
        <th>Tenggat</th>
        <th>Tanggal Kembali</th>
        <th>Denda</th>
        <th>Status</th>
    </tr>

    @foreach($data as $i => $row)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $row->judul }}</td>
        <td>{{ $row->tanggal_pinjam }}</td>
        <td>{{ $row->tenggat_pengembalian }}</td>
        <td>{{ $row->tanggal_kembali ?? '-' }}</td>
        <td>Rp {{ number_format($row->denda ?? 0) }}</td>
        <td>{{ $row->status }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
