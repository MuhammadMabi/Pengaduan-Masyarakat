<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Register - Pengaduan Masyarakat
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="">
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="">
                Pengaduan Masyarakat
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto">
                </ul>
                <ul class="navbar-nav d-lg-block d-none">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                            href="{{ route('landingpage') }}">
                            <i class="fa fa-chart-pie opacity-6  me-1"></i>
                            Home
                        </a>
                    </li>
                </ul>
                </ul>
                <ul class="navbar-nav d-lg-block d-none">
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('login') }}">
                            <i class="fas fa-key opacity-6  me-1"></i>
                            Sign In
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">

                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="card-header text-center pt-4">
                                <h5>Register</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nomor Induk
                                                Kependudukan</label>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama
                                                Lengkap</label>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required
                                                autocomplete="email">

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
                                                class="form-control @error('telp') is-invalid @enderror"
                                                name="telp" value="{{ old('telp') }}" required
                                                autocomplete="telp" autofocus>

                                            @error('telp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input"
                                                class="form-control-label">Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tanggal
                                                Lahir</label>
                                            <input id="tanggal_lahir" type="date" min="1920-12-31"
                                                max="2050-12-31"
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Jenis
                                                Kelamin</label>
                                            <br>
                                            <div class="mt-2">
                                                <input class="@error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" id="Laki-laki" name="jenis_kelamin"
                                                    value="Laki-laki" checked />
                                                <label for="Laki-laki">Laki_laki</label>

                                                <input class="@error('jenis_kelamin') is-invalid @enderror ml-3"
                                                    type="radio" id="Perempuan" name="jenis_kelamin"
                                                    value="Perempuan" />
                                                <label for="Perempuan">Perempuan</label>
                                            </div>
                                            @error('jenis_kelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <input id="role" type="text"
                                        class="form-control @error('role') is-invalid @enderror" name="role"
                                        value="Warga" required autocomplete="role" autofocus hidden>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="30"
                                                rows="3" required>{{ old('alamat') }}</textarea>

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
                                                value="{{ old('rt') }}" required autocomplete="rt" autofocus>

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
                                                value="{{ old('rw') }}" required autocomplete="rw" autofocus>

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
                                                class="form-control @error('kode_pos') is-invalid @enderror"
                                                name="kode_pos" value="{{ old('kode_pos') }}" required
                                                autocomplete="kode_pos" autofocus>

                                            @error('kode_pos')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input"
                                                class="form-control-label">Provinsi</label>
                                            <select id="provinsi"
                                                class="form-control @error('province_id') is-invalid @enderror"
                                                name="province_id">
                                                <option value="">--Pilih Provinsi--</option>
                                                @foreach ($province as $p)
                                                    @if (old('province_id') == $p->id)
                                                        <option value="{{ $p->id }}" selected>
                                                            {{ $p->name }}
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
                                            <label for="example-text-input"
                                                class="form-control-label">Kabupaten/Kota</label>
                                            <select id="kabupaten"
                                                class="form-control @error('regency_id') is-invalid @enderror"
                                                name="regency_id">
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
                                            <label for="example-text-input"
                                                class="form-control-label">Kecamatan</label>
                                            <select id="kecamatan"
                                                class="form-control @error('district_id') is-invalid @enderror"
                                                name="district_id">
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
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                                            up</button>
                                        <p class="text-sm mt-3 mb-0">Already have an account? <a href="login"
                                                class="text-dark font-weight-bolder">Sign in</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-8 mb-4 mx-auto text-center">
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Company
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        About Us
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Team
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Products
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Blog
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Pricing
                    </a>
                </div> --}}
                <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                    {{-- <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-dribbble"></span>
                    </a> --}}
                    {{-- <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-twitter"></span>
                    </a> --}}
                    <a href="https://instagram.com/mbiplx/" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-instagram"></span>
                    </a>
                    {{-- <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-pinterest"></span>
                    </a> --}}
                    <a href="https://github.com/muhammadmabi" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-github"></span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Muhammad Mabi
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(function() {

                $('#provinsi').on('change', function() {
                    let id_provinsi = $('#provinsi').val();

                    // console.log(id_provinsi);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkabupaten') }}",
                        data: {
                            id_provinsi: id_provinsi
                        },
                        cache: false,

                        success: function(message) {
                            $('#kabupaten').html(message);
                            $('#kecamatan').html('');
                            $('#desa').html('');
                        },
                        error: function(data) {
                            console.log('error:', data);
                        },
                    })
                })

                $('#kabupaten').on('change', function() {
                    let id_kabupaten = $('#kabupaten').val();

                    // console.log(id_provinsi);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkecamatan') }}",
                        data: {
                            id_kabupaten: id_kabupaten
                        },
                        cache: false,

                        success: function(message) {
                            $('#kecamatan').html(message);
                            // $('#kecamatan').html('');
                            $('#desa').html('');
                        },
                        error: function(data) {
                            console.log('error:', data);
                        },
                    })
                })

                $('#kecamatan').on('change', function() {
                    let id_kecamatan = $('#kecamatan').val();

                    // console.log(id_provinsi);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getdesa') }}",
                        data: {
                            id_kecamatan: id_kecamatan
                        },
                        cache: false,

                        success: function(message) {
                            $('#desa').html(message);
                            // $('#kecamatan').html('');
                            // $('#desa').html('');
                        },
                        error: function(data) {
                            console.log('error:', data);
                        },
                    })
                })
            })
        });
    </script>
</body>

</html>
