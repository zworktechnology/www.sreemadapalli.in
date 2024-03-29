<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/fav-logo.png" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo2.png') }}" alt="" height="40">
                    </span>
                </a>
                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/fav-logo.png" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo2.png') }}" alt="" height="40">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry" style="color:black;">{{ date('d M Y') }}</span>
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry" style="color:black;"> | </span>
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry" style="color:black;">{{ auth()->user()->name }}</span>
                    <span><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                    <a class="dropdown-item d-block" href="{{ route('settings') }}"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
