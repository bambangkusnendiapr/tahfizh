<aside class="main-sidebar sidebar-dark-success elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('front.index') }}" class="brand-link">
    <img src="{{ asset('hamzah.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ $profil->profil_nama }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    @if(!Auth::guest())
    <!-- Sidebar user (optional) -->
    @role('admin|santri|user')
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if(Auth::user()->image)
        @role('admin')
        <img src="{{ asset('images/guru/')}}/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image" />
        @endrole
        @role('santri|user')
        <img src="{{ asset('images/santri/')}}/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image" />
        @endrole
        @else
        <img src="{{ asset('images/muslim.jpg') }}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="{{ route('profile') }}" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>
    @endrole
    @role('superadmin')
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if(Auth::user()->image)
        <img src="{{ asset('images/guru/')}}/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image" />
        @else
        <img src="{{ asset('images/muslim.jpg') }}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>
    @endrole

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        @permission('pendaftaran-read')
        <li class="nav-item">
          <a href="{{ route('pendaftaran') }}" class="nav-link @yield('pendaftaran')">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              Pendaftaran
            </p>
          </a>
        </li>
        @endpermission
        @permission('santri-read')
        <li class="nav-item">
          <a href="{{ route('santri.index') }}" class="nav-link @yield('santri')">
            <i class="nav-icon fas fa-child"></i>
            <p>
              Santri
            </p>
          </a>
        </li>
        @endpermission
        @permission('guru-read')
        <li class="nav-item">
          <a href="{{ route('guru.index') }}" class="nav-link @yield('guru')">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>
              Guru
            </p>
          </a>
        </li>
        @endpermission
        @role('superadmin|admin|guru|santri')
        <li class="nav-item @yield('pembelajaran')">
          <a href="#" class="nav-link @yield('belajar')">
            <i class="fas fa-table nav-icon"></i>
            <p>
              Pembelajaran
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @permission('kelas-read')
            <li class="nav-item">
              <a href="{{ route('kelas.index') }}" class="nav-link @yield('kelas')">

                <i class="far fa-circle nav-icon"></i>
                <p>Kelas</p>
              </a>
            </li>
            @endpermission
            @permission('nilai-read')
            <li class="nav-item">
              <a href="{{ route('nilai.index') }}" class="nav-link @yield('nilai')">
                <i class="far fa-circle nav-icon"></i>
                <p>Nilai</p>
              </a>
            </li>
            @endpermission
          </ul>
        </li>
        @endrole
        @role('superadmin|admin')
        <li class="nav-item @yield('post')">
          <a href="#" class="nav-link @yield('posting')">
            <i class="nav-icon far fa-newspaper"></i>
            <p>
              Artikel
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @permission('artikel-read')
            <li class="nav-item">
              <a href="{{ route('artikel.index') }}" class="nav-link @yield('artikel')">
                <i class="far fa-circle nav-icon"></i>
                <p>Artikel</p>
              </a>
            </li>
            @endpermission
            @permission('kategori-read')
            <li class="nav-item">
              <a href="{{ route('kategori.index') }}" class="nav-link @yield('kategori')">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
            @endpermission
            @permission('tag-read')
            <li class="nav-item">
              <a href="{{ route('tag.index') }}" class="nav-link @yield('tag')">
                <i class="far fa-circle nav-icon"></i>
                <p>Tag</p>
              </a>
            </li>
            @endpermission
          </ul>
        </li>
        <li class="nav-item @yield('manajemen')">
          <a href="#" class="nav-link @yield('pengaturan')">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Pengaturan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @role('superadmin|admin')
            <li class="nav-item">
              <a href="{{ route('profil.index') }}" class="nav-link @yield('profil')">
                <i class="far fa-circle nav-icon"></i>
                <p>Profil</p>
              </a>
            </li>
            @endrole
            @permission('pengguna-read')
            <li class="nav-item">
              <a href="{{ route('user.index') }}" class="nav-link @yield('user')">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengguna</p>
              </a>
            </li>
            @endpermission
            @permission('role-read')
            <li class="nav-item">
              <a href="{{ route('role.index') }}" class="nav-link @yield('role')">
                <i class="far fa-circle nav-icon"></i>
                <p>Role</p>
              </a>
            </li>
            @endpermission
            @permission('menu-read')
            <li class="nav-item">
              <a href="{{ route('menu.index') }}" class="nav-link @yield('menu')">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu</p>
              </a>
            </li>
            @endpermission
            @permission('permission-read')
            <li class="nav-item">
              <a href="{{ route('permission.index') }}" class="nav-link @yield('permission')">
                <i class="far fa-circle nav-icon"></i>
                <p>Permission</p>
              </a>
            </li>
            @endpermission
          </ul>
        </li>
        @endrole
        <!-- Logout -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    @endif
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>