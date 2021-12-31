<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.inc.header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('backend/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>

    @include('user.inc.nav')
    @include('user.inc.sidebar')



    @yield('main-content')

    <footer class="main-footer">
        <strong>Copyright &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://teamoreo.co.uk/" target="_blank">teamoreo.co.uk</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Sam</b>
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



@include('user.inc.js')
@yield('scripts')
</body>
</html>
