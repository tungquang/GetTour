@extends('admin.layout')
@section('content')
<section class="content-header">
  <h1>
    Cá nhân
  </h1>
  <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý</a></li>
  <li class="active">Thông tin cá nhân</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">

        @if($customer->detail)
          <img class="profile-user-img img-responsive img-circle" src="{{asset('/storage/'.$customer->detail->img)}}" alt="User profile picture">
        @else
          <img src="{{asset('/storage/default-user.png')}}" class="profile-user-img img-responsive img-circle" alt="User Image">
        @endif
        <h3 class="profile-username text-center">{{$customer->name}}</h3>

        <p class="text-muted text-center">Software Engineer</p>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Thông tin</h3>
      </div>
      <!-- /.box-header -->
      @if($customer->detail)

      <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i> Địa chỉ </strong>

        <p class="text-muted">
          {{$customer->detail->address}}
        </p>

        <hr>

        <strong><i class="margin-r-5"></i> Giới tính</strong>

        <p class="text-muted">
          @if($customer->detail->sex)
            Nam
          @else
           Nữ
           @endif
        </p>

        <hr>

        <strong><i class="margin-r-5"></i> Số điện thoại</strong>

        <p class="text-muted">{{$customer->detail->phone}}</p>

        <hr>

        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
      </div>
      <!-- /.box-body -->
      @endif
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Cập nhật</a></li>
        <li><a href="#password" data-toggle="tab">Cập nhật  mật khẩu</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="settings">
          <div class="">
            <form class="form-horizontal" action="{{url('customer/'.$customer->id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="">
              <div class="col-sm-10 col-md-12">
                  @if($errors ->has('success'))
                  <p class="alert alert-success">{{$errors->first('success')}}</p>
                @endif
                @if($errors ->has('password'))
                  <p class="help-fellback">

                    <strong>
                      {{$errors->first('password')}}
                    </strong>
                  </p>
                @endif
              </div>
            </div>
            <div class="form-group clearfix">
              <label for="inputName" class="col-sm-2 control-label">Họ và Tên</label>
              <div class="col-sm-10 col-md-5">
                <input type="name" name="name" required class="form-control" id="inputName" value="{{$customer->name}}">
                <p class="help-fellback">
                  @if($errors ->has('name'))

                    <strong>
                      {{$errors->first('name')}}
                    </strong>
                  @endif
                </p>
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label" >Email</label>

              <div class="col-sm-10 col-md-5">
                <input type="email" name="email" class="form-control" required id="email" value="{{$customer->email}}">
                <p class="help-fellback">
                  @if($errors ->has('email'))

                    <strong>
                      {{$errors->first('email')}}
                    </strong>
                  @endif
                </p>
              </div>
            </div>
            <div class="form-group">
              <label for="address" class="col-sm-2 control-label">Ngày sinh</label>
              <div class="col-sm-10 col-md-5">
                <input type="date" required class="form-control" id="age" name="age" placeholder="Địa chỉ"
                       @if($customer->detail)
                       value="{{$customer->detail->age}}"
                @endif"
                >
              </div>
            </div>
            <div class="form-group">
              <label for="address" class="col-sm-2 control-label">Địa chỉ</label>
              <div class="col-sm-10 col-md-5">
                <input type="text" required class="form-control" id="address" name="address" placeholder="Địa chỉ"
                       @if($customer->detail)
                       value="{{$customer->detail->address}}"
                        @endif
                >
                <p class="help-fellback">
                  @if($errors ->has('address'))

                    <strong>
                      {{$errors->first('address')}}
                    </strong>
                  @endif
                </p>
              </div>

            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Giới tính</label>
              <div class="col-sm-10 col-md-5">
                <input type="text" name="gender"  class="hidden"
                       @if($customer->detail)
                       value="{{$customer->detail->sex}}"
                        @endif
                >
                Nữ  <input type="radio" name="sex" value="0" />
                Nam <input type="radio" value="1" name="sex" required />
                <p class="help-fellback">
                  @if($errors ->has('sex'))

                    <strong>
                      {{$errors->first('sex')}}
                    </strong>
                  @endif
                </p>

              </div>
            </div>
            <div class="form-group">
              <label for="phone" class="col-sm-2 control-label">Số điện thoại</label>

              <div class="col-sm-10 col-md-5">
                <input required type="text" name="phone" class="form-control" id="phone" placeholder="0123456789"
                       @if($customer->detail)
                       value="{{$customer->detail->phone}}"
                        @endif>
                <p class="help-fellback">
                  @if($errors ->has('phone'))

                    <strong>
                      {{$errors->first('phone')}}
                    </strong>
                  @endif
                </p>
              </div>
            </div>
            <div class="form-group">
              <label for="passport" class="col-sm-2 control-label">CMT/ Hộ chiếu</label>

              <div class="col-sm-10 col-md-5">
                <input type="text" class="form-control" id="passport"  name="passport" placeholder="0123456789"
                       @if($customer->detail)
                       value="{{$customer->detail->passport}}"
                        @endif >
                <p class="help-fellback">
                  @if($errors ->has('passport'))

                    <strong>
                      {{$errors->first('passport')}}
                    </strong>
                  @endif
                </p>
              </div>

            </div>
            <div class="form-group">
              <label for="passport" class="col-sm-2 control-label">Tỉnh</label>

              <div class="col-sm-10 col-md-5">
                <select class="form-control select2" style="width: 100%;"

                        @if($customer->detail)
                        id="country-{{$customer->detail->id_country}}"
                        @endif
                        name="id_country">
                  <option value="">Yêu cầu thành phố</option>
                  @foreach($cities as $ci)
                    <option value="{{$ci->id}}">{{$ci->name}}</option>
                  @endforeach
                </select>
                <p class="help-fellback">
                  @if($errors ->has('id_country'))

                    <strong>
                      {{$errors->first('id_country')}}
                    </strong>
                  @endif
                </p>
              </div>

            </div>

            <div class="form-group">
              <label for="file" class="col-sm-2 control-label">Ảnh đại diện</label>

              <div class="col-sm-10 col-md-5">
                <input type="file" name="photo" class="form-control user-image">
                <p class="help-fellback">
                  @if($errors ->has('photo'))

                    <strong>
                      {{$errors->first('photo')}}
                    </strong>
                  @endif
                </p>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
              </div>
            </div>
          </form>
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="password">
          <form class="form-horizontal" action="{{url('customer/'.$customer->id)}}" method="POST" >
            @method('put')
            @csrf
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nhập mật khẩu mới:</label>

              <div class="col-sm-10 col-md-5">
                <input type="password" name="password" required class="form-control" id="inputPass" placeholder="Nhập mật khẩu mới ">
                  <p class="help-fellback">
                    @if($errors ->has('password'))

                      <strong>
                        {{$errors->first('password')}}
                      </strong>
                    @endif
                  </p>
              </div>

            </div>
            <div class="form-group">
              <label for="address" class="col-sm-2 control-label">Nhập lại mật khẩu:</label>
              <div class="col-sm-10 col-md-5">
                <input type="password" required class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                <p class="help-fellback">
                  @if($errors ->has('password'))

                    <strong>
                      {{$errors->first('password')}}
                    </strong>
                  @endif
                </p>
              </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <br><button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

</section>
<!-- /.content -->
@endsection
@section('script')
 <script type="text/javascript">
  function loadCountry(){
    var $id = $('select[name=id_country]').attr('id');
    var $eq = $id.split('-');
    $('select[name=id_country]').children().eq($eq[1]).attr('selected','selected');
  };
  function loadGender()
  {
    var $gender = $('input[name=gender]').val();
    $('input[name=sex]').eq($gender).attr('checked','checked');
  }
  loadGender();
  loadCountry();
 </script>
@endsection
