@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Detail Pengaduan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    </th>
                                    {{-- <th class="text-secondary opacity-7"></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaduan as $i => $p)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">Nama</p>
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
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">Tanggal Pengaduan</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $p->tanggal_pengaduan }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">Isi Laporan</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $p->isi_laporan }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">Status</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    @if ($p->status == 'Pending')
                                                        <span
                                                            class="badge badge-sm bg-gradient-danger">{{ $p->status }}</span>
                                                    @endif
                                                    @if ($p->status == 'Proses')
                                                        <span
                                                            class="badge badge-sm bg-gradient-warning">{{ $p->status }}</span>
                                                    @endif
                                                    @if ($p->status == 'Selesai')
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{ $p->status }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">Foto :</p>
                                                    <br>
                                                    <div class="card" style="width: 18rem;">
                                                        <img src="/image/{{ $p->foto }}" alt="Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">Tanggapan :</p>
                                                    <br>
                                                    @if ($p->tanggapan)
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $p->tanggapan->tanggapan }}
                                                    @endif
                                                    </p>
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
            @if (auth()->user()->role == 'Admin' || 'Petugas')
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tanggapan Petugas</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('tanggapan.createOrUpdate') }}" method="post">
                            @csrf
                            @foreach ($pengaduan as $p)
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="pengaduan_id"
                                        name="pengaduan_id" aria-label="Name" id="pengaduan_id" value="{{ $p->id }}"
                                        hidden>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        @if ($p->status == 'Pending')
                                            <option value="Pending" selected>Pending</option>
                                            <option value="Proses">Proses</option>
                                            <option value="Selesai">Selesai</option>
                                        @endif
                                        @if ($p->status == 'Proses')
                                            <option value="Pending">Pending</option>
                                            <option value="Proses" selected>Proses</option>
                                            <option value="Selesai">Selesai</option>
                                        @endif
                                        @if ($p->status == 'Selesai')
                                            <option value="Pending" selected>Pending</option>
                                            <option value="Proses">Proses</option>
                                            <option value="Selesai" selected>Selesai</option>
                                        @endif
                                    </select>

                                    @error('regency_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="mb-3">
                                <label for="user_id" class="form-control-label">user_id</label>
                                <input type="text" class="form-control" placeholder="user_id" name="user_id" aria-label="Name"
                                id="user_id">
                            </div> --}}
                                {{-- <div class="mb-3">
                                    <label for="tanggal_tanggapan" class="form-control-label">Tanggal Tanggapan</label>
                                    <input type="datetime-local" class="form-control" placeholder="tanggal_tanggapan"
                                        name="tanggal_tanggapan" aria-label="Name" id="tanggal_tanggapan"
                                        value="{{ \Carbon\Carbon::parse($p->tanggapan->tanggal_tanggapan)->diffForHumans() }}">
                                </div> --}}
                                <div class="form-group">
                                    <label for="tanggapan">Tanggapan</label>
                                    @if ($p->tanggapan)
                                        <textarea class="form-control" name="tanggapan" id="tanggapan" rows="3" required>{{ $p->tanggapan->tanggapan }}</textarea>
                                        @error('tanggapan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @endif
                                    @if ($p->tanggapan == null)
                                        <textarea class="form-control" autofocus name="tanggapan" id="tanggapan" rows="3" required></textarea>
                                        @error('tanggapan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Tanggapi</button>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
