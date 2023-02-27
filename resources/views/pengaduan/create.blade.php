@extends('layouts.user')

@section('content')
    <div class="card z-index-0">
        <div class="card-header text-center pt-4">
            <h5>Form Pengaduan</h5>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">
        </div>
        <div class="card-body">
            <form role="form" action="/pengaduan/store" method="post">
                @csrf
                {{-- <div class="mb-3">
                    <label for="user_id" class="form-control-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="user_id" aria-label="Name"
                        id="user_id">
                </div> --}}
                <div class="form-group">
                    <label for="tanggal_pengaduan" class="form-control-label">Tanggal</label>
                    <input class="form-control" name="tanggal_pengaduan" type="datetime-local" value="2018-11-23T10:30:00"
                        id="tanggal_pengaduan">
                </div>
                <div class="form-group">
                    <label for="isi_laporan">Isi Pengaduan</label>
                    <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="custom-file-label" for="foto">Pilih Foto</label>
                    <input type="file" name="foto" class="form-control" id="foto" lang="en">
                </div>
                {{-- <div class="mb-3">
                    <input type="text" name="status" class="form-control" placeholder="Name" value="Proses"
                        aria-label="Status" id="status">
                </div> --}}
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Laporkan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
