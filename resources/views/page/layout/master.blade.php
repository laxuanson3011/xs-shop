<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    
    {{--khai bao tro den thu mục public--}}
    <base href="{{asset('')}}">
    
    <!-- Google Fonts -->
    
    @yield('css')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="page/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="page/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="page/css/owl.carousel.css">
    <link rel="stylesheet" href="page/css/stylexsasvc.css">
    <link rel="stylesheet" href="page/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- header -->
    @include('page.layout.header')
    <!-- end  header -->

    @yield('content')`

    <!--footer -->
    @include('page.layout.footer')
    <!-- end footer -->

     <!-- jQuery -->
     <script src="page/js/jquery.js"></script>
     <!-- Bootstrap Core JavaScript -->
     <script src="page/js/bootstrap.min.js"></script>
    <!-- jQuery sticky menu -->
    <script src="page/js/owl.carousel.min.js"></script>
    <script src="page/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="page/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="page/js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="page/js/bxslider.min.js"></script>
    <script type="text/javascript" src="page/js/script.slider.js"></script>
    
    @yield('script')
  </body>
</html>