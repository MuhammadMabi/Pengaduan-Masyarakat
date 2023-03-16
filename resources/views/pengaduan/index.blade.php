@extends('layouts.app')
@section('menu', 'pengaduan')
@if (auth()->user()->role == 'Warga')
    @section('title', 'Laporan-ku')
@else
    @section('title', 'Pengaduan')
@endif

@section('style')
    <style>
        .float-inline {
            display: inline-block;
            vertical-align: middle;
            margin: 10px 0;
        }

        .btnmdl {
            margin-left: 10px;
        }
    </style>
@endsection

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
                <div class="card-header text-center pb-0">
                    <h6 class="float-inline">
                        @if (auth()->user()->role == 'Warga')
                            Laporan-ku
                        @else
                            Pengaduan
                        @endif
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table id="example" class="table align-items-center mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        Nama Pelapor</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        Kategori</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Pengaduan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaduan as $p)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $loop->index + 1 }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $p->user->nama }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $p->kategori->kategori }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $p->tanggal_pengaduan->formatLocalized('%d %B %Y') }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($p->status == 'Pending')
                                                <span class="badge badge-sm bg-gradient-danger">{{ $p->status }}</span>
                                            @elseif ($p->status == 'Ditolak')
                                                <span class="badge badge-sm bg-default">{{ $p->status }}</span>
                                            @elseif ($p->status == 'Proses')
                                                <span class="badge badge-sm bg-gradient-warning">{{ $p->status }}</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-success">{{ $p->status }}</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm ">
                                            <form action="pengaduan/destroy/{{ $p->id }}" method="post">
                                                @csrf
                                                @method('delete')

                                                @if (auth()->user()->role != 'Warga')
                                                    <button class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user"
                                                        style="border: none; background: none;">
                                                        <a data-method="delete" href="pengaduan/show/{{ $p->id }}"
                                                            class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Tanggapi
                                                        </a>
                                                    </button>
                                                @else
                                                    <button class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user"
                                                        style="border: none; background: none;">
                                                        <a data-method="delete" href="pengaduan/show/{{ $p->id }}"
                                                            class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Detail
                                                        </a>
                                                    </button>
                                                    <button class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user"
                                                        style="border: none; background: none;">
                                                        <a data-method="delete" href="pengaduan/edit/{{ $p->id }}"
                                                            class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Edit
                                                        </a>
                                                    </button>
                                                @endif
                                                <button
                                                    class="text-secondary font-weight-bold text-xs btndelete show_confirm"
                                                    data-toggle="tooltip" data-original-title="Edit user"
                                                    style="border: none; background: none;" type="submit" title='Delete'>
                                                    Hapus
                                                </button>
                                            </form>
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

@section('script')
    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            document.getElementById("location").innerHTML = "Geolocation is not supported by this browser.";
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            document.getElementById("latitude").innerHTML = latitude;
            document.getElementById("longitude").innerHTML = longitude;
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Apakah anda yakin ingin menghapus laporan ini?`,
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
