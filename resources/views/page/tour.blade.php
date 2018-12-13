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
                <h2>by colorlib.com</h2>
                <h1>Find Tours</h1>
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
      <div class="col-md-9">
        <div class="row">
          <div class="wrap-division">
            @foreach($list as $object)
            <div class="col-md-6 col-sm-6 animate-box">
              <div class="tour">
                <a href="{{route('tour.show',['id'=>1])}}" class="tour-img" style="background-image: url({{asset('/storage/'.$object->img)}});">
                  <p class="price"><span>{{number_format($object->unit_price)}}</span> <small>/ {{$object->day}} Ngày</small></p>
                </a>
                <span class="desc">
                  <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                  <h2><a href="{{route('tour.show',['id'=>1])}}">{{$object->name}}</a></h2>
                  <h4 class="city">{{$object->getProvince->name}}</h4>

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
        <div class="row">
          <div class="col-md-12 text-center">
            <ul class="pagination">
              <li class="disabled"><a href="#">&laquo;</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- SIDEBAR-->
      <div class="col-md-3">
        <div class="sidebar-wrap">
          <div class="side search-wrap animate-box">
            <h3 class="sidebar-heading">Tìm kiếm Tour</h3>
            <form method="post" class="colorlib-form">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="form-group">
                        <label for="province">Địa điểm:</label>
                        <div class="form-field">
                          <input type="text" id="province" name="province" class="form-control" placeholder="Địa điểm bạn tìm">
                        </div>
                      </div>
                     </div>
                     <div class="col-md-12">
                       <h3 class="sidebar-heading">Kiểu</h3>
                       <form method="post" class="colorlib-form">
                               <div class="row">
                               <div class="col-md-12">
                                 <div class="form-group">
                                   <div class="form-field">
                                     <i class="icon icon-arrow-down3"></i>
                                     <select name="id_type" id="id_type" class="form-control">
                                       <option value="#">1</option>
                                       <option value="#">200</option>
                                       <option value="#">300</option>
                                       <option value="#">400</option>
                                       <option value="#">1000</option>
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
                            <input type="text" id="seat" name="price" min="1" class="form-control " placeholder="2">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <input type="submit" name="submit" id="submit" value="Tìm kiêm" class="btn btn-primary btn-block">
                      </div>
                  </div>
                </form>
          </div>
          <div class="side animate-box search-wrap">
            <div class="row">
              <div class="col-md-12">
                <h3 class="sidebar-heading">Thành phố / Tỉnh</h3>
                <form method="post" class="colorlib-form">
                        <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="form-field">
                              <i class="icon icon-arrow-down3"></i>
                              <select name="id_province" id="id_province" class="form-control">
                                <option value="#">1</option>
                                <option value="#">200</option>
                                <option value="#">300</option>
                                <option value="#">400</option>
                                <option value="#">1000</option>
                              </select>
                            </div>
                          </div>
                        </div>

                      </div>
                    </form>
                  </div>
            </div>
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
