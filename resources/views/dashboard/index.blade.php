@extends('layouts.app')
@section('menu', 'dashboard')
@section('title', 'Dashboard')

@section('style')
    <style>
        #map {
            height: 300px;
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{ $admin }}
                                    </h5>
                                    <p class="text-sm mb-1">Admin</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="icon icon-shape bg-default shadow-default text-center rounded-circle mt-1">
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{ $petugas }}
                                    </h5>
                                    <p class="text-sm mb-1">Petugas</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="icon icon-shape bg-info shadow-info text-center rounded-circle mt-1">
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                    <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{ $warga }}
                                    </h5>
                                    <p class="text-sm mb-1">Warga</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="icon icon-shape bg-danger shadow-danger text-center rounded-circle mt-1">
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-7 text-center">
                                <div class="numbers">
                                    <h6 class="font-weight-bolder">
                                        {{ $date->format('d M Y') }}
                                    </h6>
                                    <p class="text-sm mb-1">Tanggal</p>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="icon icon-shape bg-danger shadow-danger text-center rounded-circle mt-1">
                                    <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{ $pengaduan }}
                                    </h5>
                                    <p class="text-sm mb-1">Laporan</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle mt-1">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{ $foto }}
                                    </h5>
                                    <p class="text-sm mb-1">Foto</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="icon icon-shape bg-warning shadow-info text-center rounded-circle mt-1">
                                    <i class="ni ni-album-2 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{ $tanggapan }}
                                    </h5>
                                    <p class="text-sm mb-1">Tanggapan</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div
                                    class="icon icon-shape bg-gradient-secondary shadow-danger text-center rounded-circle mt-1">
                                    <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{ $kategori }}
                                    </h5>
                                    <p class="text-sm mb-1">Kategori</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div
                                    class="icon icon-shape bg-gradient-primary shadow-secondary text-center rounded-circle mt-1">
                                    <i class="ni ni-bullet-list-67 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{ $pending }}
                                    </h5>
                                    <p class="text-sm mb-1">Pending</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div
                                    class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle mt-1">
                                    <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{ $proses }}
                                    </h5>
                                    <p class="text-sm mb-1">Proses</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div
                                    class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle mt-1">
                                    <i class="ni ni-spaceship text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{ $selesai }}
                                    </h5>
                                    <p class="text-sm mb-1">Selesai</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div
                                    class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle mt-1">
                                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{ $ditolak }}
                                    </h5>
                                    <p class="text-sm mb-1">Ditolak</p>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="icon icon-shape bg-gradient-dark shadow-info text-center rounded-circle mt-1">
                                    <i class="ni ni-basket text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header text-center pb-0">
                        <h6 class="float-inline">
                            Lokasi Kantor Layanan Pengaduan Masyarakat
                        </h6>
                    </div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header text-center pb-0">
                        <h6 class="float-inline">
                            Data Petugas
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table id="example" class="table align-items-center mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                            No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                            Nama Petugas</th>
                                        {{-- <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                            Email</th> --}}
                                        {{-- <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                            Kabupaten/Kota</th> --}}
                                        {{-- <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kota</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($showpetugas as $k)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $loop->index + 1 }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $k->nama }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script src="../../assets/js/plugins/chartjs.min.js"></script>

    <script>
        const map = L.map('map').setView([-6.3481326, 106.7843307], 16);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const marker = L.marker([-6.3481326, 106.7843307]).addTo(map);
        
    </script>
@endsection
@endsection
