@extends('layouts.app')
@section('menu', 'user')
@section('title', 'User')

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
            <div class="card mb-4 mx-4">
                <div class="card-header text-center pb-0">
                    <h6>Data User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table id="example" class="table align-items-center mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3"
                                        width="5%">
                                        No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        Nama Petugas</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        Nomor Telepon</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        Role</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $i => $u)
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
                                                    <p class="text-xs font-weight-bold mb-0">{{ $u->nama }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $u->telp }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <div class="col-md-12">
                                                        @if (auth()->user()->role == 'Petugas')
                                                            <p class="text-xs font-weight-bold mb-0">{{ $u->role }}</p>
                                                        @else
                                                            <form action="user/update/{{ $u->id }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <select id="provinsi" class="form-control form-control-sm"
                                                                    name="role" onchange="this.form.submit()">
                                                                    @if ($u->role == 'Admin')
                                                                        <option value="Admin" selected>Admin</option>
                                                                        <option value="Petugas">Petugas</option>
                                                                        <option value="Warga">Warga</option>
                                                                    @endif
                                                                    @if ($u->role == 'Petugas')
                                                                        <option value="Admin">Admin</option>
                                                                        <option value="Petugas" selected>Petugas</option>
                                                                        <option value="Warga">Warga</option>
                                                                    @endif
                                                                    @if ($u->role == 'Warga')
                                                                        <option value="Admin">Admin</option>
                                                                        <option value="Petugas">Petugas</option>
                                                                        <option value="Warga" selected>Warga</option>
                                                                    @endif
                                                                </select>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm ">
                                            <form action="user/destroy/{{ $u->id }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user"
                                                    style="border: none; background: none;">
                                                    <a data-method="delete" href="user/show/{{ $u->id }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Detail
                                                    </a>
                                                </button>
                                                @if (auth()->user()->role == 'Admin')
                                                    <button
                                                        class="text-secondary font-weight-bold text-xs btndelete show_confirm"
                                                        data-toggle="tooltip" data-original-title="Edit user"
                                                        style="border: none; background: none;" type="submit"
                                                        data-toggle="tooltip" title='Delete'>
                                                        Hapus
                                                    </button>
                                                @endif

                                                <input type="hidden" class="delete_id" value="{{ $u->id }}">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Apakah anda yakin ingin menghapus data ini?`,
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
