<!-- ======= Header ======= -->
<header id="header" class="header-transparent">
    <div class="container">
  
      <div id="logo" class="pull-left">
        <h1><a href="{{url('/')}}" class="scrollto">GBB</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->
      </div>
  
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="{{url('/')}}">Home</a></li>
          <li class="@if($activePage == 'berita') menu-active @endif"><a href="{{route('berita')}}">Berita</a></li>
          <li><a href="{{route('login')}}">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- End Header -->