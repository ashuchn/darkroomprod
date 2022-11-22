<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesdesign.in/nazox/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Mar 2022 09:04:37 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Photographers" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('assets/dashboard-nazox/assets/images/favicon.ico') }}">

        <!-- jquery.vectormap css -->
        <link href="{{ url('assets/dashboard-nazox/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ url('assets/dashboard-nazox/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ url('assets/dashboard-nazox/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href="{{ url('assets/dashboard-nazox/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ url('assets/dashboard-nazox/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ url('assets/dashboard-nazox/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('partials.header')
            @include('partials.sidebar')
            @yield('content')
            @include('partials.footer')
            @yield('script')





    </body>
</html>