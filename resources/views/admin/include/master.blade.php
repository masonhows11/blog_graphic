<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page_title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include('admin.include.admin_header_css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
{{--<div class="wrapper">--}}

    @include('admin.include.admin_header_nav')
    <!-- right side column. contains the logo and sidebar -->
    @include('admin.include.admin_sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @include('admin.include.breadcrumb')

        <!-- Main content -->
        @yield('main_content')

    </div>
    <!-- /.content-wrapper -->
    @include('admin.include.admin_footer')

{{--    @include('admin.include.admin_control_sidebar')--}}
{{--</div>--}}
<!-- ./wrapper -->
@include('admin.include.admin_footer_js')
@yield('my_script_admin');
</body>
</html>
