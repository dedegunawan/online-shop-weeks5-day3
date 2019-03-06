<!DOCTYPE html>
<html>
<head>
    <!-- Pindahkan ke file resources/view/head.blade.php -->
    @include('head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- <header></header> -->
    @include('header')

    <!-- <aside></aside> -->
    @include('sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

</div>
<!-- ./wrapper -->

<!-- Semua tag script -->
@include('script')

@stack('scripts')
</body>
</html>
