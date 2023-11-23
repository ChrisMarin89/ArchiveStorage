<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Archive Server</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/AdminLTELogo.ico') }}">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
    </head>
    <body class="hold-transition sidebar-mini">
        <div id="app">
            <div class="wrapper">
                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                    </ul>
                    <!-- Right navbar links -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                                <i class="fas fa-expand-arrows-alt"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                                <i class="fas fa-th-large"></i>
                            </a>
                        </li>
                        <!-- Profile Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="nav-link dropdown-toggle">
                            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="brand-image img-circle elevation-3" width="32" height="32">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a class="dropdown-item" href="#">
                                    <!-- Profile Start -->
                                    <div class="media">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Settings
                                                <span class="float-right text-sm text-muted"><i class="fas fa-cog"></i></span>
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- Profile End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <!-- Profile Start -->
                                    <div class="media">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Log out
                                                <span class="float-right text-sm text-muted"><i class="fas fa-sign-out-alt"></i></span>
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- Profile End -->
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- /.navbar -->
                
                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href="{{ url('/') }}" class="brand-link">
                        <img src="{{ asset('dist/img/ArchiveServerLogo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                            style="opacity: .8">
                        <span class="brand-text font-weight-light">Archive Server</span>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">

                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                                <!-- Main Pages -->
                                <li class="nav-item">
                                    <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>Home</p>
                                    </a>
                                </li>
                                <!-- /.main-pages -->
                                <!-- Cabinets -->
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-archive"></i>
                                        <p>{{__('Cabinets')}}<i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="notas/todas"
                                                class="{{ Request::path() === 'notas/todas' ? 'nav-link active' : 'nav-link' }}">
                                                <i class="nav-icon fas fa-caret-right"></i>
                                                <p>{{__('AR Invoices')}}</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="notas/favoritas"
                                                class="{{ Request::path() === 'notas/favoritas' ? 'nav-link active' : 'nav-link' }}">
                                                <i class="nav-icon fas fa-caret-right"></i>
                                                <p>AP Invoices</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="notas/archivadas"
                                                class="{{ Request::path() === 'notas/archivadas' ? 'nav-link active' : 'nav-link' }}">
                                                <i class="nav-icon fas fa-caret-right"></i>
                                                <p>PayRolls</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- /.cabinets -->
                                <!-- Admin tools -->
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-users-cog"></i>
                                        <p>Admin tools<i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/users"
                                                class="{{ Request::path() === 'users' ? 'nav-link active' : 'nav-link' }}">
                                                <i class="nav-icon fas fa-caret-right"></i>
                                                <i class="nav-icon fas fa-users"></i>
                                                <p>
                                                    Users
                                                    <?php use App\Models\User; $users_count = User::all()->count(); ?>
                                                    <span class="right badge badge-info">{{ $users_count ?? '0' }}</span>
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/permissions"
                                                class="{{ Request::path() === 'permissions' ? 'nav-link active' : 'nav-link' }}">
                                                <i class="nav-icon fas fa-caret-right"></i>
                                                <i class="nav-icon fas fas fa-tasks"></i>
                                                <p>
                                                    Permissionss
                                                    <?php use App\Models\Permission; $permissions_count = Permission::all()->count(); ?>
                                                    <span class="right badge badge-info">{{ $permissions_count ?? '0' }}</span>
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/roles"
                                                class="{{ Request::path() === 'roles' ? 'nav-link active' : 'nav-link' }}">
                                                <i class="nav-icon fas fa-caret-right"></i>
                                                <i class="nav-icon fas fa-address-card"></i>
                                                <p>
                                                    Roles
                                                    <?php use App\Models\Role; $roles_count = Role::all()->count(); ?>
                                                    <span class="right badge badge-info">{{ $roles_count ?? '0' }}</span>
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- /.admin-tools -->
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- /.content-wrapper -->

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                    <div class="p-3">
                        <h5>Title</h5>
                        <p>Sidebar content</p>
                    </div>
                </aside>
                <!-- /.control-sidebar -->
                
                <!-- Main Footer -->
                <footer class="main-footer">
                    <!-- To the right -->
                    <div class="float-right d-none d-sm-block">
                        <b>Version</b> 3.2.0
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright &copy; 2023 Archive Server.</strong>
                </footer>
                <!-- /.main-footer -->
            </div>
            <!-- ./wrapper -->
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    </body>
</html>
