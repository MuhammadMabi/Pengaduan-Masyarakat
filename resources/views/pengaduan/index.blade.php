@extends('layouts.app')

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
                    <h6>Pengaduan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        No</th> --}}
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
                                        {{-- <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $i+1 }}</p>
                                                </div>
                                            </div>
                                        </td> --}}
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
@endsection
