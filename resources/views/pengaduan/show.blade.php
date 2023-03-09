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
                                                    <p class="text-xs font-weight-bold mb-0">{{ $pengaduan->user->nama }}</p>
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
                                                    <p class="text-xs font-weight-bold mb-0">{{ $pengaduan->tanggal_pengaduan }}</p>
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
                                                    <p class="text-xs font-weight-bold mb-0">{{ $pengaduan->isi_laporan }}</p>
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
                                                    @if ($pengaduan->status == 'Pending')
                                                        <span
                                                            class="badge badge-sm bg-gradient-danger">{{ $pengaduan->status }}</span>
                                                    @endif
                                                    @if ($pengaduan->status == 'Proses')
                                                        <span
                                                            class="badge badge-sm bg-gradient-warning">{{ $pengaduan->status }}</span>
                                                    @endif
                                                    @if ($pengaduan->status == 'Selesai')
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{ $pengaduan->status }}</span>
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
                                                    @foreach ($image as $i)
                                                    <div class="card" style="width: 18rem;">
                                                        <img src="/image/{{ $i->image }}" alt="Image">
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">Tanggapan :</p>
                                                    <br>
                                                    @if ($pengaduan->tanggapan)
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $pengaduan->tanggapan->tanggapan }}
                                                    @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if (auth()->user()->role != 'Warga')
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tanggapan Petugas</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('tanggapan.createOrUpdate') }}" method="post">
                            @csrf
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="pengaduan_id"
                                        name="pengaduan_id" aria-label="Name" id="pengaduan_id" value="{{ $pengaduan->id }}"
                                        hidden>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        @if ($pengaduan->status == 'Pending')
                                            <option value="Pending" selected>Pending</option>
                                            <option value="Proses">Proses</option>
                                            <option value="Selesai">Selesai</option>
                                        @endif
                                        @if ($pengaduan->status == 'Proses')
                                            <option value="Pending">Pending</option>
                                            <option value="Proses" selected>Proses</option>
                                            <option value="Selesai">Selesai</option>
                                        @endif
                                        @if ($pengaduan->status == 'Selesai')
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
                                        value="{{ \Carbon\Carbon::parse($pengaduan->tanggapan->tanggal_tanggapan)->diffForHumans() }}">
                                </div> --}}
                                <div class="form-group">
                                    <label for="tanggapan">Tanggapan</label>
                                    @if ($pengaduan->tanggapan)
                                        <textarea class="form-control" name="tanggapan" id="tanggapan" rows="3" required>{{ $pengaduan->tanggapan->tanggapan }}</textarea>
                                        @error('tanggapan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @endif
                                    @if ($pengaduan->tanggapan == null)
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
                        </form>
                    </div>
                </div>
            @endif
            <div class="align-middle">
                <form action="{{ route('pengaduan') }}">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Kembali</button>
                </form>
            </div>
        </div>
    </div>
@endsection
