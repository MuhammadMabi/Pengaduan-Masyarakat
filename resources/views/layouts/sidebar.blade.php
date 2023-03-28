<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 text-center" href="{{ route('dashboard') }}">
            {{-- <img src="../../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> --}}
            <span class="ms-1 font-weight-bold">Pengaduan Masyarakat</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ e($__env->yieldContent('menu')) == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->role == 'Warga')
                <li class="nav-item">
                    <a class="nav-link {{ e($__env->yieldContent('menu')) == 'laporan' ? 'active' : '' }}"
                        href="{{ route('laporan') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-notification-70 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Buat Laporan</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ e($__env->yieldContent('menu')) == 'pengaduan' ? 'active' : '' }}"
                    href="{{ route('pengaduan') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-paper-diploma text-primary text-sm opacity-10"></i>
                    </div>
                    @if (auth()->user()->role == 'Warga')
                        <span class="nav-link-text ms-1">Laporan-ku</span>
                    @else
                        <span class="nav-link-text ms-1">Pengaduan</span>
                    @endif
                </a>
            </li>
            @if (auth()->user()->role != 'Warga')
                <li class="nav-item">
                    <a class="nav-link {{ e($__env->yieldContent('menu')) == 'kategori' ? 'active' : '' }}"
                        href="{{ route('kategori') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Kategori</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ e($__env->yieldContent('menu')) == 'user' ? 'active' : '' }}"
                        href="{{ route('user') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User</span>
                    </a>
                </li>
                @if (auth()->user()->role == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link {{ e($__env->yieldContent('menu')) == 'Laporan' ? 'active' : '' }}"
                            href="{{ route('cetak') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan</span>
                        </a>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</aside>
