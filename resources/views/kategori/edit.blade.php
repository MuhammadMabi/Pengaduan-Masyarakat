@extends('layouts.app')
@section('menu', 'kategori')
@section('title', 'Edit Kategori')

@section('content')
    <div class="card mx-4">
        <div class="card-header text-center pt-4">
            <h6>Edit Kategori</h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('kategori.createOrUpdate') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="number" name="id" value="{{ $kategori->id }}" hidden>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" name="kategori" value="{{ $kategori->kategori }}" class="form-control"
                        id="kategori" lang="en" required multiple>
                    @error('kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-0">Update</button>
            </form>
            <form action="{{ route('kategori') }}">
                <button type="submit" class="btn bg-gradient-danger w-100 my-4 mb-2">Kembali</button>
            </form>
        </div>
    </div>
@endsection
