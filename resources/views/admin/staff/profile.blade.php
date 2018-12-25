@extends('admin.layout')
@section('content')
{{$errors}}
<section class="content-header">
  <h1>
    Cá nhân
  </h1>
  <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>

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

        @if($staff->detail)
          <img class="profile-user-img img-responsive img-circle" src="{{asset('/storage/'.$staff->detail->img)}}" alt="User profile picture">
        @else
          <img src="{{asset('/storage/default-user.png')}}" class="profile-user-img img-responsive img-circle" alt="User Image">
        @endif
        <h3 class="profile-username text-center">{{$staff->name}}</h3>

        <p class="text-muted text-center">Software Engineer</p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Followers</b> <a class="pull-right">1,322</a>
          </li>
          <li class="list-group-item">
            <b>Following</b> <a class="pull-right">543</a>
          </li>
          <li class="list-group-item">
            <b>Friends</b> <a class="pull-right">13,287</a>
          </li>
        </ul>

        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
      @if($staff->detail)

        <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i> Địa chỉ </strong>

        <p class="text-muted">
          {{$staff->detail->address}}
        </p>

        <hr>

        <strong><i class="margin-r-5"></i> Giới tính</strong>

        <p class="text-muted">
          @if($staff->detail->sex)
            Nam
          @else
           Nữ
           @endif
        </p>

        <hr>

        <strong><i class="margin-r-5"></i> Số điện thoại</strong>

        <p class="text-muted">{{$staff->detail->phone}}</p>

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
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="settings">
          <form class="form-horizontal" action="{{url('staff/'.$staff->id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="name" name="name" required class="form-control" id="inputName" value="{{$staff->name}}">
                <span>
                  @if($errors->has('name'))
                    {{$errors->first('name')}}
                  @endif
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label" >Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" required id="email" value="{{$staff->email}}">
                <span>
                  @if($errors->has('email'))
                    {{$errors->first('email')}}
                  @endif
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="address" class="col-sm-2 control-label">Ngày sinh</label>
              <div class="col-sm-10">
                <input type="date" required class="form-control" id="age" name="age" placeholder="Địa chỉ"
                  @if($staff->detail)
                    value="{{$staff->detail->age}}"
                  @endif"
                >
                <span>
                  @if($errors->has('age'))
                    {{$errors->first('age')}}
                  @endif
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="address" class="col-sm-2 control-label">Địa chỉ</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" id="address" name="address" placeholder="Địa chỉ"
                @if($staff->detail)
                 value="{{$staff->detail->address}}"
                 @endif
                 >
                 <span>
                   @if($errors->has('address'))
                     {{$errors->first('address')}}
                   @endif
                 </span>
              </div>
            </div>

            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Giới tính</label>
              <div class="col-sm-10">
                  <input type="text" name="gender"  class="hidden"
                  @if($staff->detail)
                   value="{{$staff->detail->sex}}"
                   @endif
                   >
                   Nữ  <input type="radio" name="sex" value="0" />
                   Nam <input type="radio" value="1" name="sex" required />


              </div>
            </div>
            <div class="form-group">
              <label for="phone" class="col-sm-2 control-label">Số điện thoại</label>

              <div class="col-sm-10">
                <input required type="text" name="phone" class="form-control" id="phone" placeholder="0123456789"
                 @if($staff->detail)
                  value="{{$staff->detail->phone}}"
                  @endif>
              </div>
            </div>
            <div class="form-group">
              <label for="passport" class="col-sm-2 control-label">CMT/ Hộ chiếu</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="passport"  name="passport" placeholder="0123456789"
                 @if($staff->detail)
                  value="{{$staff->detail->passport}}"
                  @endif >

              </div>
            </div>
            <div class="form-group">
              <label for="passport" class="col-sm-2 control-label">Tỉnh</label>

              <div class="col-sm-10">
                <select class="form-control select2" style="width: 100%;"
                  @if($staff->detail)
                   id="country-{{$staff->detail->id_country}}"
                   @endif
                    name="id_country">
                    <option value="">Yêu cầu thành phố</option>
                    @foreach($cities as $ci)
                    <option value="{{$ci->id}}">{{$ci->name}}</option>
                    @endforeach
                  </select>
                  <span>
                    @if($errors->has('id_country'))
                      {{$errors->first('id_country')}}
                    @endif
                  </span>
              </div>
            </div>
            <div class="form-group">
              <label for="phot" class="col-sm-2 control-label">Ảnh đại diện</label>
              <div class="col-sm-10">
                <input type="file" name="photo" class="form-control" id="photo">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
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
