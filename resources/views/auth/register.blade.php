@extends('auth.layout')

@section('content')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{route('home.page')}}"><b>{{config('app.name')}}</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Đăng kí </p>

    <form action="{{ route('register') }}" method="post">
      @csrf
      <div class="form-group has-feedback">

        <input type="text" name="name" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback">

        </span>

          @if ($errors->has('name'))
            <span class="invalid-feedback glyphicon glyphicon-user">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
          @endif

      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback">

        </span>

          @if ($errors->has('email'))
            <span class="invalid-feedback glyphicon glyphicon-envelope">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif

      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback">
        </span>
          @if ($errors->has('password'))
            <span class="glyphicon glyphicon-lock invalid-feedback">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif

      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required id="password-confirmation">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>

          @if ($errors->has('password_confirmation'))
          <span class="invalid-feedback glyphicon glyphicon-log-in">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
          @endif

      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Tôi đồng ý với  <a href="#">điều kiện</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng kí</button>
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

    <a href="{{route('login')}}" class="text-center">Tôi đã có tài khoản</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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
