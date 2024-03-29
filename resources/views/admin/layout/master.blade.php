{{--giao dien chinh--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lập Trình Laravel Framework 5.x ">
    <meta name="author" content="">
    <title> @yield('title')</title>

    {{--khai bao tro den thu mục public--}}
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="admin-css/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- MetisMenu CSS -->
    <link href="admin-css/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin-css/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin-css/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin-css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin-css/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        {{--hiện thị phần header--}}
        @include('admin.layout.header')

        <!-- Page Content -->
        <!-- giao dien con đổ dữ liệu vào gd chính ở đây biến content-->
        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin-css/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin-css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin-css/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin-css/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin-css/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin-css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript" language="javascript" src="admin-css/ckeditor/ckeditor.js" ></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    {{--đổ dữ liệu của script vao biến script --}}
    @yield('script')

</body>

</html>
