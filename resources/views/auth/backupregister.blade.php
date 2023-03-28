
@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nik"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nik') }}</label>

                                <div class="col-md-6">
                                    <input id="nik" type="number"
                                        class="form-control @error('nik') is-invalid @enderror" name="nik"
                                        value="{{ old('nik') }}" required autocomplete="nik" autofocus>

                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telp"
                                    class="col-md-4 col-form-label text-md-right">{{ __('No Telepon') }}</label>

                                <div class="col-md-6">
                                    <input id="telp" type="number"
                                        class="form-control @error('telp') is-invalid @enderror" name="telp"
                                        value="{{ old('telp') }}" required autocomplete="telp" autofocus>

                                    @error('telp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jenis_kelamin"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                                <div class="form-check col-md-6 mt-2" id="jenis_kelamin">
                                    <input class="@error('jenis_kelamin') is-invalid @enderror" type="radio"
                                        id="Laki-laki" name="jenis_kelamin" value="Laki-laki" />
                                    <label for="Laki-laki">Laki_laki</label>

                                    <input class="@error('jenis_kelamin') is-invalid @enderror ml-3" type="radio"
                                        id="Perempuan" name="jenis_kelamin" value="Perempuan" />
                                    <label for="Perempuan">Perempuan</label>

                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input id="role" type="text" class="form-control @error('role') is-invalid @enderror"
                                name="role" value="Warga" required autocomplete="role" autofocus hidden>
                            <div class="form-group row">
                                <label for="tanggal_lahir"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                                <div class="col-md-6">
                                    <input id="tanggal_lahir" type="date"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                        autocomplete="tanggal_lahir" autofocus>

                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="30"
                                        rows="3"></textarea>

                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rt"
                                    class="col-md-4 col-form-label text-md-right">{{ __('RT') }}</label>

                                <div class="col-md-6">
                                    <input id="rt" type="number"
                                        class="form-control @error('rt') is-invalid @enderror" name="rt"
                                        value="{{ old('rt') }}" required autocomplete="rt" autofocus>

                                    @error('rt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rw"
                                    class="col-md-4 col-form-label text-md-right">{{ __('RW') }}</label>

                                <div class="col-md-6">
                                    <input id="rw" type="number"
                                        class="form-control @error('rw') is-invalid @enderror" name="rw"
                                        value="{{ old('rw') }}" required autocomplete="rw" autofocus>

                                    @error('rw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kode_pos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Kode Pos') }}</label>

                                <div class="col-md-6">
                                    <input id="kode_pos" type="number"
                                        class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
                                        value="{{ old('kode_pos') }}" required autocomplete="kode_pos" autofocus>

                                    @error('kode_pos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="province_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Provinsi') }}</label>

                                <div class="col-md-6">
                                    <select id="provinsi"
                                        class="form-control @error('province_id') is-invalid @enderror"
                                        name="province_id">
                                        <option value="">--Pilih Provinsi--</option>
                                        @foreach ($province as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('province_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="regency_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Kabupaten/Kota') }}</label>

                                <div class="col-md-6">
                                    <select id="kabupaten"
                                        class="form-control @error('regency_id') is-invalid @enderror" name="regency_id">
                                        {{-- <option value="">--Pilih Kota--</option> --}}
                                        {{-- @foreach ($regency as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach --}}
                                    </select>

                                    @error('regency_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="district_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>

                                <div class="col-md-6">
                                    <select id="kecamatan"
                                        class="form-control @error('district_id') is-invalid @enderror"
                                        name="district_id">
                                        {{-- <option  value="">--Pilih Kecamatan--</option> --}}
                                        {{-- <option value="Limo">Limo</option> --}}
                                        {{-- @foreach ($district as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach --}}
                                    </select>

                                    @error('district_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="village_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Kelurahan') }}</label>

                                <div class="col-md-6">
                                    <select id="desa"
                                        class="form-control @error('village_id') is-invalid @enderror" name="village_id">
                                        {{-- <option  value="">--Pilih Kelurahan--</option> --}}
                                        {{-- <option value="Meruyung">Meruyung</option> --}}
                                        {{-- @foreach ($village as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach --}}
                                    </select>

                                    @error('village_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection