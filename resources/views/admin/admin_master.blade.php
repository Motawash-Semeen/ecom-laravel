<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.body.style')
    <title>Ecom Admin - Dashboard</title>
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        @include('admin.body.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.body.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('admin_content')
        </div>
        <!-- /.content-wrapper -->
        @include('admin.body.footer')

      

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
   @include('admin.body.script')


</body>

</html>
