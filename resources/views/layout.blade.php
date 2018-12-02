
<!DOCTYPE html>
<!-- saved from url=(0036)#themes/star-travel/ -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Get Tour | Home</title>

      <meta name="viewport" content="width=device-width,initial-scale=1">
      <link rel="icon" href="#themes/star-travel/images/favicon.png" type="images/x-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
      <!-- <link href="{{asset('css/dist/css.css')}}" rel="stylesheet"> -->

      <!-- Bootstrap Stylesheet -->
      <link rel="stylesheet" href="{{asset('css/dist/bootstrap.min.css')}}">

      <!-- Font Awesome Stylesheet -->

      <link rel="stylesheet" href="{{asset('js/font-awesome/css/font-awesome.min.css')}}">

      <!-- Custom Stylesheets -->
      <link rel="stylesheet" href="{{asset('css/dist/style.css')}}">
      <link rel="stylesheet" id="cpswitch" href="{{asset('css/dist/orange.css')}}">
      <link rel="stylesheet" href="{{asset('css/dist/responsive.css')}}">

      <!-- Owl Carousel Stylesheet -->
      <link rel="stylesheet" href="{{asset('css/dist/owl.carousel.css')}}">
      <link rel="stylesheet" href="{{asset('css/dist/owl.theme.css')}}">

      <!-- Flex Slider Stylesheet -->
      <link rel="stylesheet" href="{{asset('css/dist/flexslider.css')}}" type="text/css">

      <!--Date-Picker Stylesheet-->
      <link rel="stylesheet" href="{{asset('css/dist/datepicker.css')}}">

      <!-- Magnific Gallery -->
      <link rel="stylesheet" href="{{asset('css/dist/magnific-popup.css')}}">

      <!-- Color Panel -->
      <link rel="stylesheet" href="{{asset('css/dist/jquery.colorpanel.css')}}">
      <link rel="stylesheet" href="{{asset('css/dist/slick.css')}}">
      <link rel="stylesheet" href="{{asset('css/dist/slick-theme.css')}}">
</head>


<body id="main-homepage" class="" style="">
        <!-- HEADER -->
          @include('layouts.header')
        <!-- END HEADER -->
        <!--========================= FLEX SLIDER =====================-->
       <!-- CONTENT -->
        @yield('content')
       <!-- END CONTENT -->
        <!--======================= FOOTER =======================-->
        @include('layouts.footer')


        <!-- Page Scripts Starts -->
        <script src="{{asset('js/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('js/jquery/jquery.colorpanel.js')}}"></script>
        <script src="{{asset('js/jquery/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('js/jquery/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery/jquery.flexslider-min.js')}}"></script>
        <script src="{{asset('js/jquery/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('js/jquery/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/jquery/custom-navigation.js')}}"></script>
        <script src="{{asset('js/jquery/custom-flex.js')}}"></script>
        <script src="{{asset('js/jquery/custom-owl.js')}}"></script>
        <script src="{{asset('js/jquery/custom-video.js')}}"></script>
        <script src="{{asset('js/jquery/popup-ad.js')}}"></script>
        <script src="{{asset('js/jquery/slick.min.js')}}"></script>
        <!-- Page Scripts Ends -->
        @yield('script')



</body>
</html>
