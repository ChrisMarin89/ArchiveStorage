<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>vStorage</title>
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

                        <!-- Messages Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-comments"></i>
                                <span class="badge badge-danger navbar-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Brad Diesel
                                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">Call me whenever you can...</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                John Pierce
                                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">I got your message bro</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Nora Silvester
                                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">The subject goes here</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                            </div>
                        </li>
                        <!-- Notifications Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-bell"></i>
                                <span class="badge badge-warning navbar-badge">15</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-header">15 Notifications</span>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                                    <span class="float-right text-muted text-sm">3 mins</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-users mr-2"></i> 8 friend requests
                                    <span class="float-right text-muted text-sm">12 hours</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-file mr-2"></i> 3 new reports
                                    <span class="float-right text-muted text-sm">2 days</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                            </div>
                        </li>
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
                        @auth
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Log out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endauth
                    </ul>
                </nav>
                <!-- /.navbar -->
                
                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href="{{ url('/') }}" class="brand-link">
                        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                            style="opacity: .8">
                        <span class="brand-text font-weight-light">vStorage</span>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                    @guest
                                        <img src="{{ asset('dist/img/guest.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                    @else
                                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                    @endguest
                            </div>
                            <div class="info">
                                <a href="#" class="d-block">
                                    @guest
                                        <a href="{{ route('login') }}">{{ __('Log in') }}</a>
                                    @else
                                        {{ Auth::user()->name }}
                                    @endguest
                                </a>
                            </div>
                        </div>

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
                                                    <?php use App\User; $users_count = User::all()->count(); ?>
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
                                                    <?php use App\Permission; $permissions_count = Permission::all()->count(); ?>
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
                                                    <?php use App\Role; $roles_count = Role::all()->count(); ?>
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
                    <div class="float-right d-none d-sm-inline">
                        Anything you want
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
                </footer>
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
