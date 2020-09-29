<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="{{ asset('src/assets/images/faces/face8.jpg')}}" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <p class="profile-name"></p>
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
        <span class="menu-title">Data Relawan</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="monev">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('index-account-relawan')}}">Akun</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('index-data-relawan')}}">Relawan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('index-jenjang-relawan')}}">Jenjang</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#anggota-dewan" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Data Anggota Dewan</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="anggota-dewan">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('index-dewan')}}">Anggota DPR</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#sanggar" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Data Sanggar</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="sanggar">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('index-sanggar')}}">Table Sanggar</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</nav>