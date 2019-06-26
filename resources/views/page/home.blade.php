@extends('layout')
@section('content')
  <!-- sider -->
  <aside id="colorlib-hero">
    <div class="flexslider">
      <ul class="slides">
        @foreach($topics as $topic)
        <li style="background-image: url({{Storage::url($topic->img)}});">
          <div class="overlay"></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                <div class="slider-text-inner text-center">
                  <h2>2 Days Tour</h2>
                  <h1>{{$topic->content}}</h1>
                </div>
              </div>
            </div>
          </div>
        </li>
        @endforeach

      </ul>
    </div>
  </aside>
  <!-- end sider -->
  <!-- search -->
  <div id="colorlib-reservation">
    <!-- <div class="container"> -->
      <div class="row">
        <div class="search-wrap">
          <div class="container">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#flight"><i class="fa fa-map"></i> Tour</a></li>
              <li><a data-toggle="tab" href="#hotel"><i class="fa fa-hotel"></i> Hotel</a></li>
              <li><a data-toggle="tab" href="#car"><i class="fa fa-car"></i> Car Rent</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div id="flight" class="tab-pane fade in active">
              <form method="post" action="{{route('search.tour')}}" class="colorlib-form" id="search-tour">
                @csrf
                      <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                          <label for="date">Địa điểm:</label>
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

                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="day">Day</label>
                            <div class="form-field">
                              <i class="icon icon-calendar2"></i>
                              <input type="number" id="day" min="1" class="form-control day select" placeholder="Số ngày du lịch" name="day">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="seat">Còn trống</label>
                            <div class="form-field">
                              <i class="icon icon-arrow-down3"></i>
                              <input type="number" min="1" class="form-control seat select" placeholder="Số vị trí trống ?" name="seat">
                            </div>

                          </div>
                        </div>
                        <div class="col-md-2">
                              <input type="submit" name="submit" id="submit" value="Tìm kiếm" class="btn btn-primary btn-block">
                        </div>
                      </div>
                  </form>
               </div>
               <!-- search hotel  -->
               <div id="hotel" class="tab-pane fade">
                <form method="post" action="{{route('search.hotel')}}" class="colorlib-form" id="search-hotel">
                  @csrf
                      <div class="row">
                        <div class="col-md-2">
                             <div class="booknow">
                          <h2>Book Now</h2>
                          <span>Best Price Online</span>
                        </div>
                        </div>
                        <div class="col-md-2">
                         <div class="form-group">
                           <label for="province">Địa điểm:</label>
                           <div class="form-field">
                             <select class="form-control select" name="province">
                               <option value="">Chọn địa điểm muốn thuê khách sạn</option>
                               @foreach($cites as $ci)
                                <option value="{{$ci->id}}">{{$ci->name}}</option>
                               @endforeach
                             </select>
                           </div>
                         </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="price_first">Giá Từ:</label>
                            <div class="form-field">
                              <i class="icon icon-calendar2"></i>
                              <input type="text" id="price_first" name="price_first" class="form-control select" placeholder="Giá thấp nhất">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="price_last">Đến</label>
                            <div class="form-field">
                              <i class="icon icon-calendar2"></i>
                              <input type="text" id="price_last" name="price_last" class="form-control select" placeholder="Giá cao nhất">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                              <input type="submit" name="submit" id="submit" value="Tìm kiếm khách sạn" class="btn btn-primary btn-block">
                        </div>
                    </div>
                  </form>
                </div>
             <!-- search car -->
             <div id="car" class="tab-pane fade">
              <form method="post" action="{{route('search.car')}}" class="colorlib-form">
                @csrf
                      <div class="row">
                       <div class="col-md-3">
                        <div class="form-group">
                          <label for="id_type">Kiểu</label>
                          <div class="form-field">
                            <select class="form-control select" name="type">
                              <option value="">Chọn kiểu xe mà bạn muốn</option>
                              @foreach($typecar as $ty)
                               <option value="{{$ty->id}}">{{$ty->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                       </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="price">Giá</label>
                          <div class="form-field">
                            <i class="icon icon-calendar2"></i>
                            <input type="text" id="price" name="price" class="form-control select" placeholder="Giá tiền thấp nhất">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="seat">Số ghế</label>
                          <div class="form-field">
                            <i class="icon icon-calendar2"></i>
                            <input type="text" name="seat" class="form-control select" placeholder="Số ghế xe bạn yêu cầu">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <input type="submit" name="submit" id="submit" value="Tìm kiếm Xe" class="btn btn-primary btn-block">
                      </div>
                    </div>
                  </form>
             </div>

        </div>
      </div>
    </div>
  </div>
  <!-- endsearch -->

  <!-- content -->
  <div id="colorlib-services">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-3 animate-box text-center aside-stretch">
          <div class="services">
            <span class="icon">
              <i class="fa fa-globe"></i>
            </span>
            <h3>Amazing Travel</h3>
            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
          </div>
        </div>
        <div class="col-md-3 animate-box text-center">
          <div class="services">
            <span class="icon">
              <i class="fa fa-ship"></i>
            </span>
            <h3>Our Cruises</h3>
            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
          </div>
        </div>
        <div class="col-md-3 animate-box text-center">
          <div class="services">
            <span class="icon">
              <i class="fa fa-car"></i>
            </span>
            <h3>Book Your Trip</h3>
            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
          </div>
        </div>
        <div class="col-md-3 animate-box text-center">
          <div class="services">
            <span class="icon">
              <i class="fa fa-cogs"></i>
            </span>
            <h3>Nice Support</h3>
            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- tour du lịch -->
  <div class="colorlib-tour colorlib-light-grey">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
          <h2>Những địa điểm phổ biến</h2>
          <p>Những địa điểm  được tìm kiếm nhiều nhất </p>
        </div>
      </div>
    </div>
    <div class="tour-wrap">
      @foreach($tour as $object)
        @if($object->name)
        <a href="{{route('tour.show',['id'=>$object->id])}}" class="tour-entry animate-box">
          <div class="tour-img" style="background-image: url({{'/storage/'.$object->img}});">
          </div>
          <span class="desc">
            <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
            <h2>{{$object->name}}</h2>
            <span class="city">{{$object->getProvince->name}}</span>
            <span class="price">{{number_format($object->unit_price)}}\người</span>
          </span>
        </a>
        @endif
      @endforeach
    </div>
  </div>
<!-- tour trang mat -->
<div class="colorlib-tour colorlib-light-grey">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
        <h2>Kì nghỉ trang mật</h2>
        <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      </div>
    </div>
  </div>
  <div class="tour-wrap">
    @foreach($topics as $topic)
      <a href="#" class="tour-entry animate-box">
        <div class="tour-img" style="background-image:  url({{Storage::url($topic->img)}});">
        </div>
        <span class="desc">
          <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
          <h2>{{$topic->content}}</h2>
          <span class="city">Athens, Greece</span>
          <span class="price">$450</span>
        </span>
      </a>
    @endforeach
      
  </div>
</div>
{{--<div id="colorlib-blog">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">--}}
{{--          <h2>Recent Blog</h2>--}}
{{--          <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="blog-flex">--}}
{{--        <div class="f-entry-img" style="background-image: url(/storage/blog-4.jpg);">--}}
{{--        </div>--}}
{{--        <div class="blog-entry aside-stretch-right">--}}
{{--          <div class="row">--}}
{{--            <div class="col-md-12 animate-box">--}}
{{--              <a href="blog.html" class="blog-post">--}}
{{--                <span class="img" style="background-image: url(/storage/blog-4.jpg);"></span>--}}
{{--                <div class="desc">--}}
{{--                  <span class="date">Feb 22, 2018</span>--}}
{{--                  <h3>A Definitive Guide to the Best Dining</h3>--}}
{{--                  <span class="cat">Activities</span>--}}
{{--                </div>--}}
{{--              </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-12 animate-box">--}}
{{--              <a href="blog.html" class="blog-post">--}}
{{--                <span class="img" style="background-image: url(/storage/blog-4.jpg);"></span>--}}
{{--                <div class="desc">--}}
{{--                  <span class="date">Feb 22, 2018</span>--}}
{{--                  <h3>How These 5 People Found The Path to Their Dream Trip</h3>--}}
{{--                  <span class="cat">Activities</span>--}}
{{--                </div>--}}
{{--              </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-12 animate-box">--}}
{{--              <a href="blog.html" class="blog-post">--}}
{{--                <span class="img" style="background-image: url(/storage/blog-4.jpg);"></span>--}}
{{--                <div class="desc">--}}
{{--                  <span class="date">Feb 22, 2018</span>--}}
{{--                  <h3>Our Secret Island Boat Tour Is just for You</h3>--}}
{{--                  <span class="cat">Activities</span>--}}
{{--                </div>--}}
{{--              </a>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}

  <div id="colorlib-intro" class="intro-img" style="background-image: url(/storage/cover-img-1.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 animate-box">
          <div class="intro-desc">
            <div class="text-salebox">
              <div class="text-lefts">
                <div class="sale-box">
                  <div class="sale-box-top">
                    <h2 class="number">45</h2>
                    <span class="sup-1">%</span>
                    <span class="sup-2">Off</span>
                  </div>
                  <h2 class="text-sale">Sale</h2>
                </div>
              </div>
              <div class="text-rights">
                <h3 class="title">Just hurry up limited offer!</h3>
                <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p><a href="#" class="btn btn-primary">Đặt ngay</a> <a href="#" class="btn btn-primary btn-outline">Đọc thêm</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 animate-box">
          <div class="video-wrap">
            <div class="video colorlib-video" style="background-image: url();">
              <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="fa  fa-caret-square-o-left"></i></a>
              <div class="video-overlay"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- hotel -->
  <div id="colorlib-hotel">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
          <h2>Một số khách sạn được đề xuất</h2>
          <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 animate-box">
          <div class="owl-carousel">
            @foreach($hotel as $object)
              @if($object->name)
              <div class="item">
                <div class="hotel-entry">
                <a href="{{route('hotel.show',['id'=>$object->id])}}" class="hotel-img" style="background-image: url({{'/storage/'.$object->img}});">
                  <p class="price"><span>{{number_format($object->unit_price)}}</span><small> /Đêm</small></p>
                </a>
                <div class="desc">
                  <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                  <h3><a href="{{route('hotel.show',['id'=>$object->id])}}">{{$object->name}}</a></h3>
                  <span class="place">{{$object->getProvince->name}}</span>
                  <p>{{$object->descripttion}}</p>
                </div>
              </div>
              </div>
              @endif
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
<!-- end hotel -->
<!-- car -->
<div id="colorlib-hotel">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
        <h2>Danh sách xe được yêu cầu nhiều</h2>
        <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 animate-box">
        <div class="owl-carousel">
          @foreach($car as $object)
            @if($object->name)
            <div class="item">
              <div class="hotel-entry">
              <a href="{{route('car.show',['id'=>$object->id])}}" class="hotel-img" style="background-image: url({{'/storage/'.$object->img}});">
                <p class="price"><span>{{number_format($object->unit_price)}}</span><small> /night</small></p>
              </a>
              <div class="desc">
                <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                <h3><a href="{{route('car.show',['id'=>$object->id])}}">{{$object->name}}</a></h3>
                <span class="place">{{$object->getType->name}}</span>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
            </div>
            @endif
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
<!-- endcar -->
  <div id="colorlib-testimony" class="colorlib-light-grey">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
          <h2>Our Satisfied Guests says</h2>
          <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 animate-box">
          <div class="owl-carousel2">
            <div class="item">
              <div class="testimony text-center">
                <span class="img-user" style="background-image: url(/storage/person2.jpg);"></span>
                <span class="user">Alysha Myers</span>
                <small>Miami Florida, USA</small>
                <blockquote>
                  <p>" A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                </blockquote>
              </div>
            </div>
            <div class="item">
              <div class="testimony text-center">
                <span class="img-user" style="background-image: url(/storage/person2.jpg);"></span>
                <span class="user">James Fisher</span>
                <small>New York, USA</small>
                <blockquote>
                  <p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                </blockquote>
              </div>
            </div>
            <div class="item">
              <div class="testimony text-center">
                <span class="img-user" style="background-image: url(/storage/person2.jpg);"></span>
                <span class="user">Jacob Webb</span>
                <small>Athens, Greece</small>
                <blockquote>
                  <p>Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="colorlib-tour">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
          <h2>
            Các quốc gia du lịch phổ biến nhất</h2>
          <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="f-tour">
            <div class="row row-pb-md">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6 animate-box">
                    <a  href="tours.html" class="f-tour-img" style="background-image: url(/storage/tour-1.jpg);">
                      <div class="desc">
                        <h3>Rome - 5 Days</h3>
                        <p class="price"><span>{{number_format($object->unit_price)}}</span> <small>/ person</small></p>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-6 animate-box">
                    <a  href="tours.html" class="f-tour-img" style="background-image: url(/storage/tour-2.jpg);">
                      <div class="desc">
                        <h3>Rome - 5 Days</h3>
                        <p class="price"><span>{{number_format($object->unit_price)}}</span> <small>/ person</small></p>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-6 animate-box">
                    <a  href="tours.html" class="f-tour-img" style="background-image: url(/storage/tour-3.jpg);">
                      <div class="desc">
                        <h3>Rome - 5 Days</h3>
                        <p class="price"><span>{{number_format($object->unit_price)}}</span> <small>/ person</small></p>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-6 animate-box">
                    <a  href="tours.html" class="f-tour-img" style="background-image: url(/storage/tour-4.jpg);">
                      <div class="desc">
                        <h3>Rome - 5 Days</h3>
                        <p class="price"><span>{{number_format($object->unit_price)}}</span> <small>/ person</small></p>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 animate-box">
                <div class="desc">
                  <div class="row">
                    <div class="col-md-12">
                      <h3>Italy, Europe</h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p><br>
                    </div>
                    <div class="col-md-12">
                      <h4>Best Tours City</h4>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <ul>
                            <li><a href="#">Rome</a></li>
                            <li><a href="#">Milan</a></li>
                            <li><a href="#">Genoa</a></li>
                            <li><a href="#">Verona</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <ul>
                            <li><a href="#">Venice</a></li>
                            <li><a href="#">Bologna</a></li>
                            <li><a href="#">Trieste</a></li>
                            <li><a href="#">Florence</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <ul>
                            <li><a href="#">Palermo</a></li>
                            <li><a href="#">Siena</a></li>
                            <li><a href="#">San Marino</a></li>
                            <li><a href="#">Naples</a></li>
                          </ul>
                        </div>
                      </div>
                      <p><a href="tours.html" class="btn btn-primary">View All Places</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="f-tour">
            <div class="row">
              <div class="col-md-6 col-md-push-6">
                <div class="row">
                  <div class="col-md-6 animate-box">
                    <a  href="tours.html" class="f-tour-img" style="background-image: url(/storage/tour-5.jpg);">
                      <div class="desc">
                        <h3>Rome - 5 Days</h3>
                        <p class="price"><span>{{number_format($object->unit_price)}}</span> <small>/ person</small></p>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-6 animate-box">
                    <a  href="tours.html" class="f-tour-img" style="background-image: url(/storage/tour-6.jpg);">
                      <div class="desc">
                        <h3>Rome - 5 Days</h3>
                        <p class="price"><span>{{number_format($object->unit_price)}}</span> <small>/ person</small></p>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-6 animate-box">
                    <a  href="tours.html" class="f-tour-img" style="background-image: url(/storage/tour-7.jpg);">
                      <div class="desc">
                        <h3>Rome - 5 Days</h3>
                        <p class="price"><span>{{number_format($object->unit_price)}}</span> <small>/ person</small></p>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-6 animate-box">
                    <a  href="tours.html" class="f-tour-img" style="background-image: url(/storage/tour-8.jpg);">
                      <div class="desc">
                        <h3>Rome - 5 Days</h3>
                        <p class="price"><span>{{number_format($object->unit_price)}}</span> <small>/ person</small></p>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 animate-box col-md-pull-6 text-right">
                <div class="desc">
                  <div class="row">
                    <div class="col-md-12">
                      <h3>Athens, Greece</h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p><br>
                    </div>
                    <div class="col-md-12">
                      <h4>Best Tours City</h4>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <ul>
                            <li><a href="#">Rome</a></li>
                            <li><a href="#">Milan</a></li>
                            <li><a href="#">Genoa</a></li>
                            <li><a href="#">Verona</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <ul>
                            <li><a href="#">Venice</a></li>
                            <li><a href="#">Bologna</a></li>
                            <li><a href="#">Trieste</a></li>
                            <li><a href="#">Florence</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <ul>
                            <li><a href="#">Palermo</a></li>
                            <li><a href="#">Siena</a></li>
                            <li><a href="#">San Marino</a></li>
                            <li><a href="#">Naples</a></li>
                          </ul>
                        </div>
                      </div>
                      <p><a href="tours.html" class="btn btn-primary">View All Places</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="colorlib-subscribe" style="background-image: url(/storage/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
        <h2>Sign Up for a Newsletter</h2>
        <p>Sign up for our mailing list to get latest updates and offers.</p>
        <form class="form-inline qbstp-header-subscribe">
          @csrf
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
