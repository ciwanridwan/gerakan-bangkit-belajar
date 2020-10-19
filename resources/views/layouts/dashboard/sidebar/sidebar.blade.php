<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        
      </li>
      <li class="nav-item nav-category">Main Menu</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('create-monev')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Monev</span>
        </a>
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