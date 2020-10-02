<!-- ======= Header ======= -->
<header id="header" class="header-transparent">
  <div class="container">

    <div id="logo" class="pull-left">
      <img src="{{asset('assets/img/logo111.png')}}" alt="" width="50px" height="50px" style="border-radius: 50%">
      <h1><a href="{{url('/')}}" class="scrollto">GBB</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li class="menu-active"><a href="{{url('/')}}">Beranda</a></li>
        <li><a href="#about">Tentang Kami</a></li>
        <li><a href="#team">Team</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#contact">Kontak</a></li>
        <li><a href="{{route('berita')}}">Berita</a></li>
        @if (auth()->check())
        <li><a href="{{route('home')}}">Dashboard</a></li>
        {{-- @elseif (auth()->guard('admin')->check())
        <li><a href="{{route('dashboard')}}">Dashboard</a></li> --}}
        @else
        <li><a href="{{route('login')}}">Login</a></li>
        @endif

      </ul>
    </nav><!-- #nav-menu-container -->
  </div>
</header><!-- End Header -->