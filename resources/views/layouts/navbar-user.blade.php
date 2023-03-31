<div class="card shadow-lg mx-4 mb-5">
    <div class="card-body p-3">
        <div class="row gx-4">
            {{-- <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="../assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div> --}}
            <div class="col-auto my-auto">
                <div class=" nav-wrapper position-relative end-0 ms-3">
                    <p class="mb-1">
                        Pengaduan Masyarakat
                    </p>
                </div>
                {{-- <div class="h-100">
                    <h5 class="mb-1">
                        {{ auth()->user()->nama }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{ auth()->user()->nama }}
                    </p>
                </div> --}}
            </div>
            <div class="col-lg-5 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                href="{{ route('dashboard') }}" role="tab" aria-selected="true">
                                <i class="ni ni-tv-2 text-success text-sm opacity-10"></i>
                                <span class="ms-2">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                href="{{ route('laporan') }}" role="tab" aria-selected="false">
                                <i class="ni ni-notification-70 text-danger text-sm opacity-10"></i>
                                <span class="ms-2">Buat Laporan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                href="{{ route('pengaduan') }}" role="tab"
                                aria-selected="false">
                                <i class="ni ni-paper-diploma text-primary text-sm opacity-10"></i>
                                <span class="ms-2">Laporan-ku</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="javascript:;" class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false" aria-selected="false">
                                <i class="fa fa-user text-default text-sm opacity-10"></i>
                                <span class="ms-2">Account</span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="{{ route('profile') }}">
                                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                                        <span class="text-sm font-weight-normal mb-1 text-secondary">Profile</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="{{ route('changepassword') }}">
                                        <i class="ni ni-lock-circle-open fixed-plugin-button-nav cursor-pointer"></i>
                                        <span class="text-sm font-weight-normal mb-1 text-secondary">Change
                                            Password</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ni ni-button-power fixed-plugin-button-nav cursor-pointer"></i>
                                        <span class="text-sm font-weight-normal mb-1 text-secondary">Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
