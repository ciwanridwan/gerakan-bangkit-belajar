<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <img src="{{asset('src/assets/images/logo-gbb.png')}}" alt="" width="50px" height="50px">
        <a class="navbar-brand brand-logo" href="{{url('/')}}">GBB
        <a class="navbar-brand brand-logo-mini" href="{{url('/')}}">
            <img src="{{ asset('src/assets/images/logo-mini.svg')}}" alt="logo" /> </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">Bantuan : +6281394321856</li>
            <li class="nav-item dropdown language-dropdown">

                <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                    <a class="dropdown-item">
                        <div class="flag-icon-holder">
                            <i class="flag-icon flag-icon-us"></i>
                        </div>English
                    </a>
                    <a class="dropdown-item">
                        <div class="flag-icon-holder">
                            <i class="flag-icon flag-icon-fr"></i>
                        </div>French
                    </a>
                    <a class="dropdown-item">
                        <div class="flag-icon-holder">
                            <i class="flag-icon flag-icon-ae"></i>
                        </div>Arabic
                    </a>
                    <a class="dropdown-item">
                        <div class="flag-icon-holder">
                            <i class="flag-icon flag-icon-ru"></i>
                        </div>Russian
                    </a>
                </div>
            </li>
        </ul>
        <form class="ml-auto search-form d-none d-md-block" action="#">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="Search Here">
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{ asset('src/assets/images/faces/face8.jpg')}}"
                        alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="{{ asset('src/assets/images/faces/face8.jpg')}}"
                            alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold">{{auth()->guard('admin')->user()->nama}}</p>
                        <p class="font-weight-light text-muted mb-0">{{auth()->guard('admin')->user()->email}}</p>
                    </div>
                    <a class="dropdown-item" href="{{route('edit-profile-admin', auth()->guard('admin')->user()->id)}}">My Profile <span class="badge badge-pill badge-danger">1</span><i
                            class="dropdown-item-icon ti-dashboard"></i></a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                    Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>