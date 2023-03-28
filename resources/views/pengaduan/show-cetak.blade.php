<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan Masyarakat | Print</title>

    {{-- leafletjs --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <style>
        html,
        body {
            height: 100%;
        }

        html {
            display: table;
            margin: auto;
        }

        body {
            display: table-cell;
            vertical-align: middle;
        }

        #map {
            height: 300px;
            width: 800px;
        }

        #myImg {
            display: inline-block;
            width: 15%;
            margin-right: 20px;
        }

        hr.solid {
            border-top: 2px solid;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 align="center"><b>Pengaduan Masyarakat</b></h3>
        <hr class="solid">
        @if ($pengaduan->longitude)
            <div id="map"></div>
        @endif

        <table>
            <tr>
                <td>
                    <p class="text-xs font-weight-bold mb-0">Nama Pelapor</p>
                    <p class="text-xs font-weight-bold mb-0">Jam & Tanggal Laporan</p>
                    <p class="text-xs font-weight-bold mb-0">Status</p>
                    <p class="text-xs font-weight-bold mb-0">Kategori</p>
                    <p class="text-xs font-weight-bold mb-0">Isi Laporan</p>
                    <p class="text-xs font-weight-bold mb-0">Foto</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">: {{ $pengaduan->user->nama }}</p>
                    <p class="text-xs font-weight-bold mb-0">: {{ $pengaduan->created_at->format('H:i:s | l, d F Y') }}
                    </p>
                    <p class="text-xs font-weight-bold mb-0">: {{ $pengaduan->status }}</p>
                    <p class="text-xs font-weight-bold mb-0">: {{ $pengaduan->kategori->kategori }}</p>
                    <p class="text-xs font-weight-bold mb-0">: {{ $pengaduan->isi_laporan }}</p>
                    <p class="text-xs font-weight-bold mb-0">: </p>

                </td>
            </tr>
        </table>
        @foreach ($image as $i)
            <img id="myImg" src="/image/{{ $i->image }}" alt="Image">
        @endforeach
        <hr class="solid">
        <h3 align="center">Tanggapan Petugas</h3>
        <table>
            <tr>
                <td>
                    <p class="text-xs font-weight-bold mb-0">Nama Petugas</p>
                    <p class="text-xs font-weight-bold mb-0">Jam & Tanggal Ditanggapi</p>
                    <p class="text-xs font-weight-bold mb-0">Isi Tanggapan</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">: {{ $tanggapan->user->nama ?? 'Belum ditanggapi' }}</p>
                    @if ($tanggapan != null)
                        <p class="text-xs font-weight-bold mb-0">:
                            {{ $tanggapan->tanggal_tanggapan->format('H:i:s | l, d F Y') }}
                        </p>
                    @else
                        <p class="text-xs font-weight-bold mb-0">: Belum ditanggapi </p>
                    @endif
                    <p class="text-xs font-weight-bold mb-0">: {{ $tanggapan->tanggapan ?? 'Belum ditanggapi' }}</p>

                </td>
            </tr>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        const map = L.map('map').setView([{{ $pengaduan->latitude }}, {{ $pengaduan->longitude }}], 16);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const marker = L.marker([{{ $pengaduan->latitude }}, {{ $pengaduan->longitude }}]).addTo(map);
    </script>
    <script>
        setTimeout(() => {
            window.print();
        }, 3000);
    </script>
</body>

</html>
