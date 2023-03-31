@section('style')
    <style>
        .textleft {
            margin-left: 10px;
        }
    </style>
@endsection

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-2 me-sm-6 me-5 mt-2">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pengaduan
                        Masyarakat</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">
                    {{ e($__env->yieldContent('title')) }}</li>
            </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end mt-2">
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">{{ auth()->user()->nama }}</span>
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
                                <span class="text-sm font-weight-normal mb-1 text-secondary">Change Password</span>
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
                @if (auth()->user()->role != 'Warga')
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
