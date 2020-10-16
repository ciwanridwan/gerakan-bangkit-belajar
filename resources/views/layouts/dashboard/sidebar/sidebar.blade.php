<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{ asset('src/assets/images/faces/face8.jpg')}}" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{Auth::user()->name}}</p>
            {{-- <p class="designation">Premium user</p> --}}
          </div>
        </a>
      </li>
      <li class="nav-item nav-category">Main Menu</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#monev" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Monev Gerakan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="monev">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('create-relawan')}}">Relawan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('create-monev')}}">Monev</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Laporan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('table-berita')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Berita</span>
        </a>
      </li>
    </ul>
  </nav>