<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          {{-- <a class="nav-link {{ Request::is('') ? 'active':'' }}" href="/home"> --}}
          <i class="bi bi-columns-gap"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('albums') ? 'active':'' }}" href="/albums">
          <i class="bi bi-menu-button-wide"></i><span>Albums</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('galery') ? 'active':'' }}" href="/galery">
        {{-- <a class="nav-link collapsed {{ Request::is('') ? 'active':'' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"> --}}
          <i class="bi bi-menu-button-wide"></i><span>Gallery</span>
        </a>
      </li><!-- End Components Nav -->


    </ul>

  </aside>