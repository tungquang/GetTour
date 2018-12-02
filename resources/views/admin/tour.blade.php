@extends('admin.layout2')
@section('content')
<section class="content-header">
  <h1>
    <a href="{{route('cart.index')}}">
      <button type="button" name="button" class="btn btn-warning">
        <i class="fa fa-cart-plus"></i>
      </button>
    </a>
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

  <!-- /.col -->
  <div class="cd-md-12">
    <div class="nav-tabs-custom">

      <ul class="nav nav-tabs">
        <li class="active"><a href="#tour" data-toggle="tab">Danh sach Tour</a></li>
        <li><a href="#xe" data-toggle="tab">Danh sach Xe </a></li>
        <li><a href="#hotel" data-toggle="tab">Danh sach khach san</a></li>
      </ul>
      <div class="tab-content">
        <!-- tour -->
        <div class="active tab-pane" id="tour">
          <!-- content -->
          <div class="row content">
            @foreach($data['tour'] as $tour)
            <div class="post col-md-4">

              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="{{Storage::disk('local')->url($tour->img)}}" alt="user image">
                    <span class="username">
                      <a href="#">{{$tour->name}}</a>
                      <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </span>
                <span class="description">Tỉnh : {{$tour->getProvince['name']}}</span>
              </div>
              <!-- /.user-block -->
              <div class="panel">
                <h4>Thông tin của Tour</h4>
                <div class="content">
                  <p>

                    {!!$tour->content!!}
                  </p>
                </div>
              </div>
              <p>Giá tour {{number_format($tour->unit_price)}}</p>
              <p>Khuyến mãi {{$tour->promotion_price}}</p>
              <p>Giá
                <?php
                  $promotion = explode("%",$tour->promotion_price);
                  echo number_format($promotion[0] * $tour->unit_price /100);
              ?></p>
              <ul class="list-inline">
                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                </li>
                <li class="pull-right">
                  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                    (5)</a></li>
              </ul>

              <div class="row">
                <a class="cart" href="{{'product='.$tour->id.'&&type=tour'}}" class="treeview">
                <button type="button" id="{{$tour->id}}" name="button" class="btn btn-warning">Đặt</button>
              </a>
              </div>
            </div>
            @endforeach
          </div>

        </div>
        <!-- xe -->
        <div class="tab-pane" id="xe">
          <!-- content -->
          <div class="row content">
            @foreach($data['car'] as $car)
            <div class="post col-md-4">

              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="{{Storage::disk('local')->url($tour->img)}}" alt="user image">
                    <span class="username">
                      <a href="#">{{$car->name}}</a>
                      <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </span>
                <span class="description">Kiểu xe : {{$tour->getType->name}}</span>
              </div>
              <!-- /.user-block -->
              <div class="panel">
                <h4>Thông tin của xe</h4>
                <div class="content">
                  <p>
                    <p>Số ghế xe {{$car->soghe}}</p>
                    <p>Sô ghế  đã đặt {{$car->book}}</p>
                    {!!$car->content!!}
                  </p>
                </div>
              </div>

              <p>Giá xe {{number_format($car->unit_price)}}</p>


              <ul class="list-inline">
                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                </li>
                <li class="pull-right">
                  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                    (5)</a></li>
              </ul>

              <div class="row">

                <a class="cart" href="{{'product='.$car->id.'&&type=car'}}">
                  <button type="button" id="{{$car->id}}" name="button" class="cart btn btn-warning">Đặt</button>
                </a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
       <!-- khach san -->

        <div class="tab-pane" id="hotel">
          <!-- The content -->
          <div class="row content">
            @foreach($data['hotel'] as $hotel)
            <div class="post col-md-4">

              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="{{Storage::disk('local')->url($tour->img)}}" alt="user image">
                    <span class="username">
                      <a href="#">{{$hotel->name}}</a>
                      <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </span>
                <span class="description">Tỉnh : {{$hotel->getProvince['name']}}</span>
              </div>
              <!-- /.user-block -->
              <div class="panel">
                <h4>Thông tin của khách sạn</h4>
                <div class="content">
                  <p>

                    {!!$hotel->content!!}
                  </p>
                </div>
              </div>
              <p>Giá khách sạn {{number_format($hotel->unit_price)}}</p>
              <p>Khuyến mãi {{$hotel->promotion_price}}</p>
              <p>Giá
                <?php

                  $promotion = explode("%",$hotel->promotion_price);
                  echo count($promotion);
                  echo number_format($hotel->unit_price - ($promotion[0] * $hotel->unit_price /100));
              ?></p>
              <ul class="list-inline">
                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                </li>
                <li class="pull-right">
                  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                    (5)</a></li>
              </ul>

              <div class="row">
                <a class="cart" href="{{'product='.$hotel->id.'&&type=hotel'}}">
                <button type="button" id="{{$hotel->id}}" name="button" class="cart btn btn-warning">Đặt</button>
                </a>
              </div>
            </div>
            @endforeach
          </div>
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
    $('a[class=cart]').click(function(event){

      event.preventDefault();
      $url = "{{url('cart/add')}}?" + $(this).attr('href');

      $.ajax({
        url:$url,
        type:'get',
        success:function($data)
        {
          console.log($data);
          if($data)
          {
            toastr.success('Yêu cầu của bạn đã được thêm !');
          }
          else
          {
            toastr.warning('Yêu cầu của bạn không thành công');
          }
        }
      });

    });
  </script>
@endsection
