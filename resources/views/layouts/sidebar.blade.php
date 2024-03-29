<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="{{ asset('admin/dist/images/AdminLTELogo.jpeg') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-2" style="opacity: .8">
        <span class="brand-text">Dinas Sosial Cirebon</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a class="d-block">{{ Auth::User()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item @yield('data.otdp')">
                    <a href="#" class="nav-link @yield('nav')">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data Otdp
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        {{-- otdp --}}
                        <li class="nav-item">
                            <a href="{{route('otdp.index')}}" class="nav-link @yield('otdp')">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bars nav-icon"></i>
                                <p>Data Otdp</p>
                            </a>
                            @role('admin')
                            <a href="{{route('recomendation.index')}}" class="nav-link @yield('recomendation')">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bars nav-icon"></i>
                                <p>Rekomendasi Bantuan</p>
                            </a>
                            @endrole
                            <a href="{{route('hasil.index')}}" class="nav-link @yield('hasil')">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bars nav-icon"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @role('admin')
                <li class="nav-item @yield('data')">
                    <a href="#" class="nav-link @yield('nav')">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        {{-- user --}}
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link @yield('user')">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bars nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>