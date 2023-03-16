@extends('layouts.app')
@section('title','Profile')

@section('content')
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
                                        <label for="nik" class="form-control-label">Nomor Induk
                                            Kependudukan</label>
                                        <input id="nik" type="number" class="form-control" name="nik"
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
                                        <label for="nama" class="form-control-label">Nama
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
                                        <label for="email" class="form-control-label">Email</label>
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
                                        <label for="telp" class="form-control-label">Nomor
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir" class="form-control-label">Tanggal
                                            Lahir</label>
                                        <input id="tanggal_lahir" type="date" min="1920-12-31" max="2050-12-31"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            name="tanggal_lahir"
                                            value="{{ auth()->user()->tanggal_lahir->format('Y-m-d') }}" required
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
                                        <label for="Laki-laki" class="form-control-label">Jenis
                                            Kelamin</label>
                                        <br>
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
                                        <label for="alamat" class="form-control-label">Alamat</label>
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
                                        <label for="rt" class="form-control-label">RT</label>
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
                                        <label for="rw" class="form-control-label">RW</label>
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
                                        <label for="kode_pos" class="form-control-label">Kode
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
                                        <label for="provinsi" class="form-control-label">Provinsi</label>
                                        <select id="provinsi"
                                            class="form-control @error('province_id') is-invalid @enderror"
                                            name="province_id">
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
                                        <label for="kabupaten" class="form-control-label">Kabupaten/Kota</label>
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
                                        <label for="kecamatan" class="form-control-label">Kecamatan</label>
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
                                        <label for="desa" class="form-control-label">Desa</label>
                                        <select id="desa"
                                            class="form-control @error('village_id') is-invalid @enderror"
                                            name="village_id">
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
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-0">Update</button>
                                </div>
                            </div>
                        </form>
                        <form method="post" action="hapusakun/{{ auth()->user()->id }}">
                            @csrf
                            @method('delete')

                            <button class="btn bg-gradient-dark w-100 my-4 mb-0 btndelete show_confirm" type="submit" data-toggle="tooltip" title='Delete'>Hapus Akun Anda</button>
                        </form>
                        <form action="{{ route('dashboard') }}">
                            <button class="btn bg-gradient-danger w-100 my-4 mb-2">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-body pt-0 mt-3">
                        <div class="text-center mt-4">
                            <h5>
                                {{ auth()->user()->nama }}<span class="font-weight-light"></span>
                            </h5>
                            <div class="mb-2">
                                <span class="text-sm opacity-8">{{ $umur }} tahun</span>
                            </div>
                            <div class="mb-2">
                            </div>
                            <div>
                                <span class="text-sm opacity-8">{{ auth()->user()->district->name }},
                                    {{ auth()->user()->regency->name }},
                                    {{ auth()->user()->province->name }}</span>
                                <i class="ni location_pin mr-2"></i>
                            </div>
                            <div class="h6 mt-4">
                                {{-- <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer --}}
                            </div>
                            <div>
                                {{-- <i class="ni education_hat mr-2"></i>University of Computer Science --}}
                            </div>
                        </div>
                        <hr class="horizontal dark mt-0">
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
        @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Apakah anda yakin ingin menghapus akun ini?`,
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
