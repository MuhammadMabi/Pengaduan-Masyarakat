@extends('layouts.app')

@section('content')
    <div class="card z-index-0">
        <div class="card-header text-center pt-4">
            <h5>Form Pengaduan</h5>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('pengaduan.createOrUpdate') }}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach ($pengaduan as $p)
                <input type="number" name="id" value="{{ $p->id }}" hidden>
                    <div class="form-group">
                        <label for="isi_laporan">Isi Pengaduan</label>
                        <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="3" required>{{ $p->isi_laporan }}</textarea>
                        @error('isi_laporan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-file-label" for="foto">Pilih Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" lang="en">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Laporkan</button>
                    </div>
                @endforeach
            </form>
            {{-- <form role="form" action="{{ route('pengaduan.createOrUpdate') }}" method="post"
                enctype="multipart/form-data">
                @csrf

                @foreach ($pengaduan as $p)
                    <input type="number" name="id" value="{{ $p->id }}" hidden>
                    <div class="form-group">
                        <label for="isi_laporan">Isi Pengaduan</label>
                        <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="3">{{ $p->isi_laporan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="custom-file-label" for="foto">Pilih Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" lang="en"
                            value="{{ $p->foto }}">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Laporkan</button>
                    </div>
                @endforeach
            </form> --}}
        </div>
    </div>
@endsection
