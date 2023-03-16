@extends('layouts.app')
@section('menu', 'pengaduan')
@section('title', 'Edit Pengaduan')

@section('content')
    <div class="card z-index-0">
        <div class="card-header text-center pt-4">
            <h5>Edit Pengaduan</h5>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('pengaduan.createOrUpdate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="number" name="id" value="{{ $pengaduan->id }}" hidden>
                <div class="form-group">
                    <label for="kategor" class="form-control-label">Kategori</label>
                    <select id="kategori" class="form-control @error('kategori_id') is-invalid @enderror"
                        name="kategori_id" required>
                        @foreach ($kategori as $k)
                            @if ($pengaduan->kategori_id == $k->id)
                                <option value="{{ $k->id }}" selected>{{ $k->kategori }}</option>
                            @endif
                            <option value="{{ $k->id }}">{{ $k->kategori }}</option>
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
                    <label for="isi_laporan">Isi Pengaduan</label>
                    <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="3" required>{{ $pengaduan->isi_laporan }}</textarea>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-0">Update</button>
                    </div>
            </form>
            <form action="{{ route('pengaduan') }}">
                <button type="submit" class="btn bg-gradient-danger w-100 my-4 mb-2">Kembali</button>
            </form>
        </div>
    </div>
@endsection
