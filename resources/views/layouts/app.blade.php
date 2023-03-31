<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76"
        href="https://t4.ftcdn.net/jpg/04/00/48/17/360_F_400481724_qMAZNHULrqzhKq2BeG4dWbRp8n9WoGHV.jpg">
    <link rel="icon" type="image/png"
        href="https://t4.ftcdn.net/jpg/04/00/48/17/360_F_400481724_qMAZNHULrqzhKq2BeG4dWbRp8n9WoGHV.jpg">
    <title>
        Pengaduan Masyarakat | {{ e($__env->yieldContent('title')) }}
    </title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

    {{-- leafletjs --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @yield('style')
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-gradient-info position-absolute w-100"></div>
    @if (auth()->user()->role != 'Warga')
        @include('layouts.sidebar')
    @endif
    <main class="main-content position-relative border-radius-lg ">

        <!-- Navbar -->
        @if (auth()->user()->role != 'Warga')
            @include('layouts.navbar')
        @endif
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            @if (auth()->user()->role == 'Warga')
                @include('layouts.navbar-user')
            @endif
            @yield('content')
            {{-- @include('layouts.footer') --}}
        </div>
    </main>

    @include('layouts.script')
</body>

</html>
