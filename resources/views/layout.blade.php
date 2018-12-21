<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Get Tour</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('js/Ionicons/css/ionicons.min.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('css/flexslider.css')}}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{asset('js/font-awesome/css/font-awesome.min.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('js/toastr/toastr.min.css')}}">


	<!-- Modernizr JS -->
	<script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>

	<!-- FOR IE9 below -->
	<style media="screen">
    .colorlib-form .form-control
    {
      color: rgba(169, 169 ,169, 1);
    }
  </style>
	<script src="{{asset('js/respond.min.js')}}"></script>


	</head>
	<body>

	<div class="colorlib-loader"></div>

	<div id="page">

			@include('layouts.header')
	    <!-- content -->
			@yield('content')
	    <!-- end content -->
	    <!-- footer -->
			@include('layouts.footer')

    <!-- endfooter -->
	</div>
	<!-- form sign -->
	<div id="form" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">

	      <div class="modal-body">
	        <div class="login-box-body">
	          <p class="login-box-msg">Đăng nhập</p>

	          <form action="{{route('customer.login')}}" method="post">
	            @csrf
	            <div class="form-group has-feedback">
	              <label for="">Tên tài khoản:</label>
	              <input type="email" name="email"  class="form-control" placeholder="Email">
	              <span class=""></span>
	              @if ($errors->has('email'))
	                  <span class="invalid-feedback glyphicon glyphicon-envelope " role="alert">
	                      <strong>{{ $errors->first('email') }}</strong>
	                  </span>
	              @endif
	            </div>
	            <div class="form-group has-feedback">
	              <label for="">Mật khẩu :</label>
	              <input name="password" type="password"  class="form-control" placeholder="Password">
	              @if ($errors->has('password'))
	                  <span class="invalid-feedback " role="alert">
	                      <strong>{{ $errors->first('password') }}</strong>
	                  </span>
	              @endif
	            </div>

	            <div class="row">
	              <div class="col-xs-8">
	                <div class="checkbox icheck">
	                  <label for="remember">
	                      <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
	                      {{ __('Nhớ đăng nhập') }}
	                  </label>
	                </div>
	              </div>
	              <!-- /.col -->
	              <div class="col-xs-4">
	                <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
	              </div>
	              <!-- /.col -->
	            </div>
	          </form>

	          <div class="social-auth-links text-center">

	            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>
	              Facebook</a>
	            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>
	              Google+</a>
	          </div>
	          <!-- /.social-auth-links -->

	          <a href="#" class="link">Quên mật khẩu ?</a><br>
	          <a href="{{route('customer.register.form')}}" class="text-center link"><i></i> Tạo tài khoản ?</a>

	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/toastr/toastr.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
	<!-- Flexslider -->
	<script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
	<!-- Owl carousel -->
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup-options.js')}}"></script>
	<!-- Date Picker -->
	<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
	<!-- Stellar Parallax -->
	<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('js/main.js')}}"></script>

	<!-- <script type="text/javascript">
		$('#cart').click(function(event){
			event.preventDefault();
			$.ajax({
				type:'get',
				url : "{{route('car.index')}}",
				data :{
					'_token':$('meta[name="csrf-token"]').attr('content')
				},
				success:function($data)
				{
					console.log($data);
				}
			});
		});
	</script> -->
		@yield('script')

	</body>
</html>
