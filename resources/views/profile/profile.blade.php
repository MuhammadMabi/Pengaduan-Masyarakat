@extends('layouts.app')

@section('content')
    {{-- <div class="card shadow-lg mx-4">
    <div class="card-body p-3">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Sayo Kravits
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        Public Relations
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                <i class="ni ni-app"></i>
                                <span class="ms-2">App</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-email-83"></i>
                                <span class="ms-2">Messages</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-settings-gear-65"></i>
                                <span class="ms-2">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6 class="float-inline">Profile</h6>
                            {{-- <button class="btn btn-primary btn-sm ms-auto">Settings</button> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="updateprofile/{{ auth()->user()->id }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nomor Induk
                                            Kependudukan</label>
                                        <input id="nik" type="number"
                                            class="form-control @error('nik') is-invalid @enderror" name="nik"
                                            value="{{ auth()->user()->nik }}" required autocomplete="nik" autofocus>

                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama
                                            Lengkap</label>
                                        <input id="nama" type="text"
                                            class="form-control @error('nama') is-invalid @enderror" name="nama"
                                            value="{{ auth()->user()->nama }}" required autocomplete="nama" autofocus>

                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ auth()->user()->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nomor
                                            Telepon</label>
                                        <input id="telp" type="number"
                                            class="form-control @error('telp') is-invalid @enderror" name="telp"
                                            value="{{ auth()->user()->telp }}" required autocomplete="telp" autofocus>

                                        @error('telp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input"
                                        class="form-control-label">Password</label>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Confirm
                                        Password</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tanggal
                                            Lahir</label>
                                        <input id="tanggal_lahir" type="date"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            name="tanggal_lahir" value="{{ auth()->user()->tanggal_lahir }}" required
                                            autocomplete="tanggal_lahir" autofocus>

                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Jenis
                                            Kelamin</label>
                                        <br>
                                        {{-- <input class="form-control" type="date"> --}}
                                        <div class="mt-2">
                                            @if (auth()->user()->jenis_kelamin == 'Laki-laki')
                                                <input class="@error('jenis_kelamin') is-invalid @enderror" type="radio"
                                                    id="Laki-laki" name="jenis_kelamin" value="Laki-laki" checked />
                                                <label for="Laki-laki">Laki_laki</label>
                                                <input class="@error('jenis_kelamin') is-invalid @enderror ml-3"
                                                    type="radio" id="Perempuan" name="jenis_kelamin" value="Perempuan" />
                                                <label for="Perempuan">Perempuan</label>
                                            @endif

                                            @if (auth()->user()->jenis_kelamin == 'Perempuan')
                                                <input class="@error('jenis_kelamin') is-invalid @enderror" type="radio"
                                                    id="Laki-laki" name="jenis_kelamin" value="Laki-laki" />
                                                <label for="Laki-laki">Laki_laki</label>
                                                <input class="@error('jenis_kelamin') is-invalid @enderror ml-3"
                                                    type="radio" id="Perempuan" name="jenis_kelamin" value="Perempuan"
                                                    checked />
                                                <label for="Perempuan">Perempuan</label>
                                            @endif
                                        </div>
                                        @error('jenis_kelamin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Alamat</label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="30"
                                            rows="3">{{ auth()->user()->alamat }}</textarea>

                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">RT</label>
                                        <input id="rt" type="number"
                                            class="form-control @error('rt') is-invalid @enderror" name="rt"
                                            value="{{ auth()->user()->rt }}" required autocomplete="rt" autofocus>

                                        @error('rt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">RW</label>
                                        <input id="rw" type="number"
                                            class="form-control @error('rw') is-invalid @enderror" name="rw"
                                            value="{{ auth()->user()->rw }}" required autocomplete="rw" autofocus>

                                        @error('rw')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Kode
                                            Pos</label>
                                        <input id="kode_pos" type="number"
                                            class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
                                            value="{{ auth()->user()->kode_pos }}" required autocomplete="kode_pos"
                                            autofocus>

                                        @error('kode_pos')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Provinsi</label>
                                        <select id="provinsi"
                                            class="form-control @error('province_id') is-invalid @enderror"
                                            name="province_id">
                                            {{-- <option value="{{ auth()->user()->province_id }}">{{ $province->name }}</option> --}}
                                            @foreach ($province as $p)
                                                @if ($p->id == auth()->user()->province_id)
                                                    <option value="{{ $p->id }}" selected>{{ $p->name }}
                                                    </option>
                                                @endif
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Kabupaten/Kota</label>
                                        <select id="kabupaten"
                                            class="form-control @error('regency_id') is-invalid @enderror"
                                            name="regency_id">
                                            @foreach ($regency as $r)
                                                @if ($r->id == auth()->user()->regency_id)
                                                    <option value="{{ $r->id }}" selected>{{ $r->name }}
                                                    </option>
                                                @endif
                                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('regency_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Kecamatan</label>
                                        <select id="kecamatan"
                                            class="form-control @error('district_id') is-invalid @enderror"
                                            name="district_id">
                                            @foreach ($district as $d)
                                                @if ($d->id == auth()->user()->district_id)
                                                    <option value="{{ $d->id }}" selected>{{ $d->name }}
                                                    </option>
                                                @endif
                                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('district_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Desa</label>
                                        <select id="desa"
                                            class="form-control @error('village_id') is-invalid @enderror"
                                            name="village_id">
                                            {{-- <option value="" selected>asd --}}
                                            </option>
                                            @foreach ($village as $v)
                                                @if ($v->id == auth()->user()->village_id)
                                                    <option value="{{ $v->id }}" selected>{{ $v->name }}
                                                    </option>
                                                @endif
                                                <option value="{{ $v->id }}">{{ $v->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('village_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="text-center">
                                    {{-- <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Update</button> --}}
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-0">Update</button>
                                </div>
                            </div>
                        </form>
                        {{-- <form method="post" action="hapusakun/{{ auth()->user()->id }}">
                            @csrf
                            @method('delete')

                            <button class="btn bg-gradient-danger w-100 my-4 mb-0 btndelete show_confirm" type="submit" data-toggle="tooltip" title='Delete'>Hapus Akun Anda</button>
                        </form> --}}
                        <form action="{{ route('dashboard') }}">
                            <button class="btn bg-gradient-danger w-100 my-4 mb-2">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    {{-- <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img src="/img/team-2.jpg"
                                        class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                    class="ni ni-collection"></i></a>
                            <a href="javascript:;"
                                class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                    class="ni ni-email-83"></i></a>
                        </div>
                    </div> --}}
                    <div class="card-body pt-0 mt-3">
                        <div class="text-center mt-4">
                            <h5>
                                {{ auth()->user()->nama }}<span class="font-weight-light"></span>
                            </h5>
                            <div>
                                
                                <span class="text-sm opacity-8">{{ auth()->user()->telp }}, {{ auth()->user()->regency->name }}</span>
                                <i class="ni location_pin mr-2"></i>
                            </div>
                            <div class="h6 mt-4">
                                {{-- <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer --}}
                            </div>
                            <div>
                                {{-- <i class="ni education_hat mr-2"></i>University of Computer Science --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-grid text-center mb-3">
                                    <span class="text-lg font-weight-bolder">{{ $laporan }}</span>
                                    <span class="text-lg font-weight-bolder">Laporan</span>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="d-grid text-center">
                                        <span class="text-lg font-weight-bolder">{{ $pending }}</span>
                                        <span class="text-sm opacity-8">Pending</span>
                                    </div>
                                    <div class="d-grid text-center mx-4">
                                        <span class="text-lg font-weight-bolder">{{ $proses }}</span>
                                        <span class="text-sm opacity-8">Proses</span>
                                    </div>
                                    {{-- <div class="d-grid text-center mx-4">
                                        <span class="text-lg font-weight-bolder">{{ $proses }}</span>
                                        <span class="text-sm opacity-8">Proses</span>
                                    </div> --}}
                                    <div class="d-grid text-center">
                                        <span class="text-lg font-weight-bolder">{{ $selesai }}</span>
                                        <span class="text-sm opacity-8">Selesai</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Apakah anda yakin ingin menghapus akun ini?`,
                        // text: "If you delete this, it will be gone forever.",
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
    @endsection --}}
@endsection
