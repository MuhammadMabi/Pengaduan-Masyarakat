@extends('layouts.app')
@section('title','Change Password')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6 class="float-inline">Change Password</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('changepassword') }}">
                            @csrf

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Password Lama</label>
                                    <input id="old_password" type="password"
                                        class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                        required autocomplete="old_password" value="{{ old('old_password') }}" autofocus>

                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Password Baru</label>
                                    <input id="new_password" type="password"
                                        class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                        required autocomplete="new_password" value="{{ old('new_password') }}" autofocus>

                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Confirm Password Baru</label>
                                    <input id="confirm_new_password" type="password"
                                        class="form-control @error('confirm_new_password') is-invalid @enderror"  value="{{ old('confirm_new_password') }}"
                                        name="confirm_new_password" required autocomplete="confirm_new_password" autofocus>

                                    @error('confirm_new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-0">Change</button>
                        </form>
                        <form action="{{ route('dashboard') }}">
                            <button class="btn bg-gradient-danger w-100 my-4 mb-2">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
