@extends('layouts.app')

@section('content')
    <div class="card z-index-0">
        <div class="card-header text-center pt-4">
            <h5>Form Tanggapan</h5>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">
        </div>
        <div class="card-body">
            <form role="form" action="/tanggapan/store" method="post">
                @csrf
                <div class="mb-3">
                    <label for="pengaduan_id" class="form-control-label">pengaduan_id</label>
                    <input type="text" class="form-control" placeholder="pengaduan_id" name="pengaduan_id" aria-label="Name"
                        id="pengaduan_id">
                </div>
                {{-- <div class="mb-3">
                    <label for="user_id" class="form-control-label">user_id</label>
                    <input type="text" class="form-control" placeholder="user_id" name="user_id" aria-label="Name"
                        id="user_id">
                </div> --}}
                <div class="mb-3">
                    <label for="tanggal_tanggapan" class="form-control-label">tanggal_tanggapan</label>
                    <input type="date" class="form-control" placeholder="tanggal_tanggapan" name="tanggal_tanggapan" aria-label="Name"
                        id="tanggal_tanggapan">
                </div>
                <div class="form-group">
                    <label for="tanggapan">tanggapan</label>
                    <textarea class="form-control" name="tanggapan" id="tanggapan" rows="3"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Laporkan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
