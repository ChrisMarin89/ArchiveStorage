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
                <!-- Content Wrapper -->
                <div  class="row align-items-center bg-dark" style="min-height: 100vh">
                    @yield('content')
                </div>
                <!-- /.content-wrapper -->
                
                <!-- Main Footer -->
                <footer class="fixed-bottom" style="text-align:center">
                    <!-- To the right -->
                    <div class="float-right d-none d-sm-inline mr-2">
                    <p class="text-light">Virtual Storage  </p>
                    </div>
                    <!-- Default to the left -->
                    
                    <p class="text-light"><strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.</p>
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
