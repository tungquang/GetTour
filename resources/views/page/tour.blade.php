@extends('layout')
@section('content')
<aside id="colorlib-hero">
  <div class="flexslider">
    <ul class="slides">
      <li style="background-image: url({{asset('/storage/img_bg_3.jpg')}});">
        <div class="overlay"></div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
              <div class="slider-text-inner text-center">
                <h2></h2>
                <h1>Tour du lịch </h1>
              </div>
            </div>
          </div>
        </div>
      </li>
      </ul>
    </div>
</aside>

<div class="colorlib-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-9" id="list-tour">
        @if(isset($alert))
        <div class="panel-header clearfix">
          <h3>{{$alert}} </h3>
        </div>
        @endif
        <div class="row">
          <div class="wrap-division">
            @foreach($list as $object)
            <div class="col-md-6 col-sm-6 animate-box box">
              <div class="tour">
                <a href="{{route('tour.show',['id'=>$object->id])}}" class="tour-img" style="background-image: url({{asset('/storage/'.$object->img)}});">
                  <p class="price"><span>{{number_format($object->unit_price)}}</span> <small>/ {{$object->day}} Ngày</small></p>
                </a>
                <span class="desc">
                  <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                  <h2><a href="{{route('tour.show',['id'=>$object->id])}}">{{$object->name}}</a></h2>
                  <h4 class="city">{{$object->getProvince->name}}</h4>
                  <p class="city">Còn trống : {{$object->seat - $object->book}}</p>
                  <p>{!!$object->description!!}</p>

                </span>
                <div class="desc">
                  <p>
                    <a class="cart" href="{{'product='.$object->id.'&&type=tour'}}">
                      <button type="button" name="button" class="btn btn-primary">Đặt vé</button>
                    </a>
                    <a class="cart" href="{{'product='.$object->id.'&&type=tour'.'&&customer=1'}}" >
                      <button type="button" name="button" class="btn btn-primary">Đặt Tour</button>
                    </a>
                  </p>

                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- SIDEBAR-->
      <div class="col-md-3">
        <div class="sidebar-wrap">
          <div class="side search-wrap animate-box">
            <h3 class="sidebar-heading">Tìm kiếm Tour</h3>
            <form method="post" class="colorlib-form" action="{{route('search.tour')}}">
              @csrf
                    <div class="row">
                      <div class="col-md-12">
                      <div class="form-group">
                        <label for="province">Địa điểm:</label>
                        <div class="form-field">
                          <select class="form-control select" name="province">
                            <option value="">Chọn địa điểm bạn muốn đến</option>
                            @foreach($cites as $ci)
                             <option value="{{$ci->id}}">{{$ci->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                     </div>
                     <div class="col-md-12">
                       <h3 class="sidebar-heading">Kiểu</h3>
                       <form method="post" class="colorlib-form">
                         @csrf
                               <div class="row">
                               <div class="col-md-12">
                                 <div class="form-group">
                                   <label for="type_tour">Kiểu Tour:</label>
                                   <div class="form-field">
                                     <i class="icon fa fa-angle-down"></i>
                                     <select name="type_tour" id="type_tour" class="form-control select">
                                       <option value="">Chọn kiểu tour mà bạn muốn đi</option>
                                       @foreach($typetour as $type)
                                         <option value="{{$type->id}}">{{$type->name}}</option>
                                       @endforeach
                                     </select>
                                   </div>
                                 </div>
                               </div>

                             </div>
                           </form>
                         </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="price">Giá tour:</label>
                          <div class="form-field">
                            <i class="icon fa fa-money"></i>
                            <input type="text" id="price" name="price" class="form-control " placeholder="200,000">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="seat">Vị trí còn</label>
                          <div class="form-field">
                            <i class="icon fa fa-user"></i>
                            <input type="text" id="seat" name="seat" min="1" class="form-control " placeholder="2">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <input type="submit" name="submit" id="submit" value="Tìm kiêm" class="btn btn-primary btn-block">
                      </div>
                  </div>
                </form>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>


<div id="colorlib-subscribe" style="background-image: url({{asset('/storage/img_bg_2.jpg')}});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
        <h2>Sign Up for a Newsletter</h2>
        <p>Sign up for our mailing list to get latest updates and offers.</p>
        <form class="form-inline qbstp-header-subscribe">
          <div class="row">
            <div class="col-md-12 col-md-offset-0">
              <div class="form-group">
                <input type="text" class="form-control" id="email" placeholder="Enter your email">
                <button type="submit" class="btn btn-primary">Subscribe</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
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
