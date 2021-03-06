<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/animate.css">

    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/magnific-popup.css">

    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/aos.css">

    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/ionicons.min.css">

    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/jquery.timepicker.css">


    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/flaticon.css">
    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/icomoon.css">
    <link rel="stylesheet" href="http://localhost/mecommerce/ecommerce/public/frontend/css/style.css">
  </head>
  <body class="goto-here">
		<!--include header -->
@include('includes.header')
<!-- end of the header-->
    <!--include navbar -->

@include('includes.navbar')
<!--end of navbar -->







    <!-- END nav -->
    <!-- header plus navbar are commen thats why -->

<!-- start content-->

@yield('content')


<!--end content-->
<!-- subscribe plus the footer-->
@include('includes.footer')

<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/jquery.min.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/jquery-migrate-3.0.1.min.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/popper.min.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/bootstrap.min.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/jquery.easing.1.3.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/jquery.waypoints.min.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/jquery.stellar.min.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/owl.carousel.min.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/jquery.magnific-popup.min.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/aos.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/jquery.animateNumber.min.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/bootstrap-datepicker.js"></script>
<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/scrollax.min.js"></script>

<script src="http://localhost/mecommerce/ecommerce/public/frontend/js/main.js"></script>

</body>
</html>
@yield('script')
