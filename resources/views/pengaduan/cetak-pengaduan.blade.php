<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan Masyarakat | Print</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h3 align="center"><b>Pengaduan Masyarakat</b></h3>
    <p align="center">Dari tanggal {{ $tanggal_awal }} sampai tanggal {{ $tanggal_akhir }}</p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;" cellpadding="5"
        cellspacing="0">
        <thead>
            <tr>
                <th width="2%">No</th>
                <th width="20%">Nama Pelapor</th>
                <th width="15%">Kategori</th>
                <th>Isi Laporan</th>
                <th width="20%">Tanggal Pengaduan</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduan as $i => $p)
                <tr>
                    <td align="center">{{ $loop->index + 1 }}</td>
                    <td>{{ $p->user->nama }}</td>
                    <td>{{ $p->kategori->kategori }}</td>
                    <td>{{ $p->isi_laporan }}</td>
                    <td align="center">{{ $p->tanggal_pengaduan->format('d F Y') }}</td>
                    <td align="center">{{ $p->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
