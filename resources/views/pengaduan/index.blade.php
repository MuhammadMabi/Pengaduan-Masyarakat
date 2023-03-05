@extends('layouts.app')

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
                <div class="card-header pb-0">
                    <h6 class="float-inline">Pengaduan</h6>
                    <button type="button" class="btn bg-gradient-primary float-inline btn-sm btnmdl" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Laporkan!
                    </button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3"
                                        width="5%">
                                        No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tanggal Pengaduan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                    {{-- <th class="text-secondary opacity-7"></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaduan as $i => $p)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $i + 1 }}</p>
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
                                            <p class="text-xs font-weight-bold mb-0">{{ $p->tanggal_pengaduan }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($p->status == 'Pending')
                                                <span class="badge badge-sm bg-gradient-danger">{{ $p->status }}</span>
                                            @endif
                                            @if ($p->status == 'Proses')
                                                <span class="badge badge-sm bg-gradient-warning">{{ $p->status }}</span>
                                            @endif
                                            @if ($p->status == 'Selesai')
                                                <span class="badge badge-sm bg-gradient-success">{{ $p->status }}</span>
                                            @endif
                                        </td>
                                        {{-- <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                    </td> --}}
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
                                                <button class="text-secondary font-weight-bold text-xs btndelete"
                                                    data-toggle="tooltip" data-original-title="Edit user"
                                                    style="border: none; background: none;" type="submit">
                                                    Hapus
                                                </button>

                                                <input type="hidden" class="delete_id" value="{{ $p->id }}">

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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="{{ route('pengaduan.createOrUpdate') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        {{-- <div class="mb-3">
                            <label for="user_id" class="form-control-label">Nama</label>
                            <input type="text" class="form-control" placeholder="Nama" name="user_id" aria-label="Name"
                                id="user_id">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="tanggal_pengaduan" class="form-control-label">Tanggal</label>
                            <input class="form-control" name="tanggal_pengaduan" type="datetime-local" value="2018-11-23T10:30:00"
                                id="tanggal_pengaduan">
                        </div> --}}
                        <div class="form-group">
                            <label for="isi_laporan">Isi Pengaduan</label>
                            <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="3" required></textarea>
                            @error('isi_laporan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="custom-file-label" for="foto">Pilih Foto</label>
                            <input type="file" name="foto" class="form-control" id="foto" lang="en"
                                required multiple>
                        </div>
                        {{-- <div class="mb-3">
                            <input type="text" name="status" class="form-control" placeholder="Name" value="Proses"
                                aria-label="Status" id="status">
                        </div> --}}
                        {{-- <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Laporkan</button>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn bg-gradient-primary">Laporkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
