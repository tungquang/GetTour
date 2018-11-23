@extends('admin.layout')
@section('content')

<section class="content-header">
  <h1>
    Cá nhân
  </h1>
  <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Examples</a></li>
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
        <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

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
        <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
        <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
        <li><a href="#settings" data-toggle="tab">Cập nhật</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                  <span class="username">
                    <a href="#">Jonathan Burke Jr.</a>
                    <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
              <span class="description">Shared publicly - 7:30 PM today</span>
            </div>
            <!-- /.user-block -->
            <p>
              Lorem ipsum represents a long-held tradition for designers,
              typographers and the like. Some people hate it and argue for
              its demise, but others ignore the hate as they create awesome
              tools to help create filler text for everyone from bacon lovers
              to Charlie Sheen fans.
            </p>
            <ul class="list-inline">
              <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
              <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
              </li>
              <li class="pull-right">
                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                  (5)</a></li>
            </ul>

            <input class="form-control input-sm" type="text" placeholder="Type a comment">
          </div>
          <!-- /.post -->

          <!-- Post -->
          <div class="post clearfix">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                  <span class="username">
                    <a href="#">Sarah Ross</a>
                    <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
              <span class="description">Sent you a message - 3 days ago</span>
            </div>
            <!-- /.user-block -->
            <p>
              Lorem ipsum represents a long-held tradition for designers,
              typographers and the like. Some people hate it and argue for
              its demise, but others ignore the hate as they create awesome
              tools to help create filler text for everyone from bacon lovers
              to Charlie Sheen fans.
            </p>

            <form class="form-horizontal">
              <div class="form-group margin-bottom-none">
                <div class="col-sm-9">
                  <input class="form-control input-sm" placeholder="Response">
                </div>
                <div class="col-sm-3">
                  <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.post -->

          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                  <span class="username">
                    <a href="#">Adam Jones</a>
                    <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
              <span class="description">Posted 5 photos - 5 days ago</span>
            </div>
            <!-- /.user-block -->
            <div class="row margin-bottom">
              <div class="col-sm-6">
                <img class="img-responsive" src="{{asset('css/admin.jpeg')}}" alt="Photo">
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-6">
                    <img class="img-responsive" src="{{asset('css/admin.jpeg')}}" alt="Photo">
                    <br>
                    <img class="img-responsive" src="{{asset('css/admin.jpeg')}}" alt="Photo">
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                    <img class="img-responsive" src="{{asset('css/admin.jpeg')}}" alt="Photo">
                    <br>
                    <img class="img-responsive" src="{{asset('css/admin.jpeg')}}" alt="Photo">
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <ul class="list-inline">
              <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
              <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
              </li>
              <li class="pull-right">
                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                  (5)</a></li>
            </ul>

            <input class="form-control input-sm" type="text" placeholder="Type a comment">
          </div>
          <!-- /.post -->
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="timeline">
          <!-- The timeline -->
          <ul class="timeline timeline-inverse">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    10 Feb. 2014
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                <div class="timeline-body">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                  quora plaxo ideeli hulu weebly balihoo...
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                </h3>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-comments bg-yellow"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                <div class="timeline-body">
                  Take me to your leader!
                  Switzerland is small and neutral!
                  We are more like Germany, ambitious and misunderstood!
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    3 Jan. 2014
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-camera bg-purple"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                <div class="timeline-body">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
          <form class="form-horizontal" action="{{url('staff/'.$staff->id)}}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="name" name="name" required class="form-control" id="inputName" value="{{$staff->name}}">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label" >Email</label>

              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" required id="email" value="{{$staff->email}}">
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
                 class="{{$staff->detail->id_country}}"
                 @endif
                  name="id_country">
                  <option value="0">Hà Nội</option>
                  <option value="1">Hà Nội2</option>
                  <option value="2">Hà Nội3</option>
                  <option value="3">Hà Nội4</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
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
    var $id = $('select[name=id_country]').attr('class');
    $('select[name=id_country]').children().eq($id).attr('selected','selected');
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
