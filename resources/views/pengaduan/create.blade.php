@extends('layouts.app')
@section('menu', 'laporan')
@section('title', 'Laporan')

@section('content')
    <div class="card z-index-0">
        <div class="card-header text-center pt-4">
            <h6>Form Pengaduan</h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('pengaduan.createOrUpdate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori" class="form-control-label">Kategori</label>
                        <select id="kategori" class="form-control @error('kategori_id') is-invalid @enderror"
                            name="kategori_id" required>
                            <option value="">--Pilih Kategori--</option>
                            @foreach ($kategori as $k)
                                <option {{ old('kategori_id') == $k->id ? "selected" : "" }} value="{{ $k->id }}">{{ $k->kategori }}</option>
                            @endforeach
                            <option value="Lainnya">Lainnya</option>
                        </select>

                        @error('kategori_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi_laporan">Isi Laporan</label>
                        <textarea class="form-control @error('isi_laporan') is-invalid @enderror" name="isi_laporan" id="isi_laporan"
                            rows="3" required>{{ old('isi_laporan') }}</textarea>
                        @error('isi_laporan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-file-label" for="foto">Bukti Foto</label>
                        <input type="file" name="image[]" class="form-control @error('image') is-invalid @enderror" id="foto" lang="en" required
                            multiple>
                        <label for="foto">*Maksimal foto adalah 5</label>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <textarea class="form-control" name="latitude" rows="1" id="latitude" hidden></textarea>
                    <textarea class="form-control" name="longitude" rows="1" id="longitude" hidden></textarea>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-0">Kirim Laporan</button>
                    </div>
                </div>
            </form>
            <form action="{{ route('pengaduan') }}">
                <button type="submit" class="btn bg-gradient-danger w-100 my-4 mb-2">Laporanku</button>
            </form>
        </div>

    </div>

@section('script')
    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            document.getElementById("location").innerHTML = "Geolocation is not supported by this browser.";
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            document.getElementById("latitude").innerHTML = latitude;
            document.getElementById("longitude").innerHTML = longitude;
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Apakah anda yakin ingin menghapus laporan ini?`,
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
