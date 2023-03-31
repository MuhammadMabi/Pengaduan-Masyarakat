@extends('layouts.app')
@section('menu', 'pengaduan')
@section('title', 'Detail Laporan')

@section('style')
    <style>
        #map {
            height: 300px;
        }

        #myImg {
            display: inline-block;
            width: 15%;
            margin-right: 20px;
        }

        #btndeletefoto {
            display: inline-block;
            /* width: 15%; */
            margin-right: 30px;
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header text-center pb-0">
                    <h6>
                        @if (auth()->user()->role == 'Warga')
                            Detail Laporan
                        @else
                            Detail Pengaduan
                        @endif
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                        @if ($pengaduan->longitude)
                            <div id="map"></div>
                        @endif
                        <table class="table align-items-center mt-4">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs font-weight-bold mb-0">Nama</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $pengaduan->user->nama }}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs font-weight-bold mb-0">Jam & Tanggal Pengaduan</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $pengaduan->jam_pengaduan->format('H:i:s') }} |
                                                    {{ $pengaduan->tanggal_pengaduan->format('l, d F Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs font-weight-bold mb-0">Status</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                @if ($pengaduan->status == 'Pending')
                                                    <span
                                                        class="badge badge-sm bg-gradient-danger">{{ $pengaduan->status }}</span>
                                                @elseif ($pengaduan->status == 'Ditolak')
                                                    <span class="badge badge-sm bg-default">{{ $pengaduan->status }}</span>
                                                @elseif ($pengaduan->status == 'Proses')
                                                    <span
                                                        class="badge badge-sm bg-gradient-warning">{{ $pengaduan->status }}</span>
                                                @else
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $pengaduan->status }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs font-weight-bold mb-0">Kategori</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $pengaduan->kategori->kategori }}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs font-weight-bold mb-0">Isi Laporan</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $pengaduan->isi_laporan }}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs font-weight-bold mb-0">Foto</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <div class="nav">
                                                    @foreach ($image as $i)
                                                        <img id="myImg" src="/image/{{ $i->image }}" alt="Image"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                            onclick="getIdImg({{ $i->id }})"
                                                            class="{{ $i->id }}">
                                                    @endforeach
                                                </div>

                                                @if (auth()->user()->role == 'Warga' && $pengaduan->status != 'Selesai')
                                                    <form role="form" method="post"
                                                        action="{{ route('upload.image') }}" enctype="multipart/form-data">
                                                        @csrf

                                                        <input type="text" value="{{ $pengaduan->id }}"
                                                            name="pengaduan_id" hidden>
                                                        <div class="input-group mt-3">
                                                            <input type="file" name="image[]" id="foto"
                                                                class="form-control @error('image') is-invalid @enderror"
                                                                aria-label="Recipient's username"
                                                                aria-describedby="button-addon2" required multiple>
                                                            <button class="btn bg-gradient-info mb-0" type="submit"
                                                                id="button-addon2">Upload</button>
                                                            @error('image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <label>*Maksimal foto adalah 5</label>
                                                    </form>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if (auth()->user()->role == 'Warga')
                <div class="card mb-4 mx-4">
                    <div class="card-header text-center pb-0">
                        <h6>Tanggapan Petugas</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">Petugas</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $tanggapan->user->nama ?? 'Belum ditanggapi' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">Jam & Tanggal Tanggapan</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($pengaduan->tanggapan)
                                                            {{ $tanggapan->tanggal_tanggapan->format('H:i:s | D, d M Y') }}
                                                        @else
                                                            Belum ditanggapi
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">Tanggapan</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $pengaduan->tanggapan->tanggapan ?? 'Belum Ditanggapi' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @if (auth()->user()->role == 'Warga')
                                <form action="{{ route('pengaduan') }}">
                                    <a href="/pengaduan/cetak/{{ $pengaduan->id }}" target="_blank"
                                        class="btn bg-gradient-success w-100 my-4 mb-0">Cetak PDF</a>
                                    <button type="submit" class="btn bg-gradient-danger w-100 my-4 mb-2">Kembali</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @elseif (auth()->user()->role != 'Warga')
                <div class="card mb-4 mx-4">
                    <div class="card-header text-center pb-0">
                        <h6>Tanggapan Petugas</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('tanggapan.createOrUpdate') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="pengaduan_id"
                                    name="pengaduan_id" aria-label="Name" id="pengaduan_id"
                                    value="{{ $pengaduan->id }}" hidden>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    @if ($pengaduan->status == 'Pending')
                                        <option value="Pending" selected>Pending</option>
                                        <option value="Ditolak">Ditolak</option>
                                        <option value="Proses">Proses</option>
                                        <option value="Selesai">Selesai</option>
                                    @elseif ($pengaduan->status == 'Ditolak')
                                        <option value="Pending">Pending</option>
                                        <option value="Ditolak" selected>Ditolak</option>
                                        <option value="Proses">Proses</option>
                                        <option value="Selesai">Selesai</option>
                                    @elseif ($pengaduan->status == 'Proses')
                                        <option value="Pending">Pending</option>
                                        <option value="Ditolak">Ditolak</option>
                                        <option value="Proses" selected>Proses</option>
                                        <option value="Selesai">Selesai</option>
                                    @elseif ($pengaduan->status == 'Selesai')
                                        <option value="Pending" selected>Pending</option>
                                        <option value="Ditolak">Ditolak</option>
                                        <option value="Proses">Proses</option>
                                        <option value="Selesai" selected>Selesai</option>
                                    @endif
                                </select>

                                @error('regency_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggapan">Tanggapan</label>
                                @if ($pengaduan->tanggapan)
                                    <textarea class="form-control" name="tanggapan" id="tanggapan" rows="3" required>{{ $pengaduan->tanggapan->tanggapan }}</textarea>
                                    @error('tanggapan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endif
                                @if ($pengaduan->tanggapan == null)
                                    <textarea class="form-control" autofocus name="tanggapan" id="tanggapan" rows="3" required></textarea>
                                    @error('tanggapan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-0">Tanggapi</button>
                            </div>
                        </form>
                        <form action="{{ route('pengaduan') }}">
                            <a href="/pengaduan/cetak/{{ $pengaduan->id }}" target="_blank"
                                class="btn bg-gradient-success w-100 my-4 mb-0">Cetak PDF</a>
                            <button type="submit" class="btn bg-gradient-danger w-100 my-4 mb-2">Kembali</button>
                        </form>
                    </div>
                </div>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="py-3 text-center">
                                <img id="modal-img" alt="Image" style="width: 350px; height:350px;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary"
                                data-bs-dismiss="modal">Close</button>
                            @if (auth()->user()->role == 'Warga' && $pengaduan->status != 'Selesai')
                                <form method="post" id="deleteImage">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn bg-gradient-danger btndelete show_confirm"
                                        data-toggle="tooltip">Hapus</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script>
        function getIdImg(id) {
            var url = '{{ url('/pengaduan/destroyimage') }}';

            document.getElementById("deleteImage").setAttribute("action", url + "/" + id);

        }

        var modal = document.getElementById("exampleModal");
        var modalImg = document.getElementById("modal-img");
        var idimage = document.getElementById("id-image");

        document.addEventListener("click", (e) => {
            const elem = e.target;
            if (elem.id === "myImg") {
                modal.style.display = "block";
                modalImg.src = elem.dataset.biggerSrc || elem.src;
                idimage.src = elem.dataset.biggerSrc || elem.src;
            }
        })

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
    </script>
    <script>
        const map = L.map('map').setView([{{ $pengaduan->latitude }}, {{ $pengaduan->longitude }}], 16);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const marker = L.marker([{{ $pengaduan->latitude }}, {{ $pengaduan->longitude }}]).addTo(map);
    </script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Apakah anda yakin ingin menghapus foto ini?`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });

        });
    </script>
@endsection
@endsection
