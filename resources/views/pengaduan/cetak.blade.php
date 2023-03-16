@extends('layouts.app')
@section('title','Cetak Laporan')

@section('content')
    @if (isset($message))
        <div class="col-sm-12">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Cetak Laporan</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Awal</label>
                                <input id="tanggal_awal" type="date"
                                    class="form-control @error('tanggal_awal') is-invalid @enderror" name="tanggal_awal"
                                    value="{{ $mytime }}" required autocomplete="tanggal_awal" min="2020-12-31" max="2030-12-31" autofocus>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Akhir</label>
                                <input id="tanggal_akhir" type="date"
                                    class="form-control @error('tanggal_akhir') is-invalid @enderror" name="tanggal_akhir"
                                    value="{{ $mytime }}" required autocomplete="tanggal_akhir" min="2020-12-31" max="2030-12-31" autofocus>
                            </div>
                        </div>
                        <a type="submit" target="_blank" onclick="this.href='cetakpdf/'+ document.getElementById('tanggal_awal').value + '/' + document.getElementById('tanggal_akhir').value" class="btn bg-gradient-primary w-100 my-4 mb-2">Cetak Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
