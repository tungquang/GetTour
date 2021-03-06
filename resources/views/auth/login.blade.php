@extends('auth.layout')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{route('home.page')}}">{{config('app.name','GetTour')}}</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Đăng nhập</p>

    <form action="{{route('login')}}" method="post">
      @csrf
      <div class="form-group has-feedback">
        <label for="email">Tên tài khoản :</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
        <span class=""></span>
        @if ($errors->has('email'))
            <span class="invalid-feedback glyphicon glyphicon-envelope " role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <label for="password">Mật khuẩu</label>
        <input name="password" type="password" id="password" class="form-control" placeholder="Password">
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
                <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                {{ __('Nhớ tài khoản') }}
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
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">Quên mật khẩu</a><br>
    <a href="{{route('register')}}" class="text-center">Đăng kí tài khoản</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="js/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
@endsection
