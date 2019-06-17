@extends('layout')
@section('content')
<aside id="colorlib-hero">
  <div class="flexslider">
    <ul class="slides">
      <li style="background-image: url({{asset('/storage/cover-img-4.jpg')}});">
        <div class="overlay"></div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
              <div class="slider-text-inner text-center">
                <h2>by GetTour</h2>
                <h1>Tổng quan về khách sạn</h1>
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
          <div class="col-md-12">
            <div class="wrap-division">

              <div class="row">
                <div class="col-md-12 animate-box">
                  <div class="room-wrap">
                    <div class="row">
                      <!-- title -->
                      <div class="col-md-12 col-sm-12">
                        <div class="desc">

                          <h2>{{$hotel->name}}</h2>
                          <p>{!!$hotel->description!!}</p>
                        </div>
                      </div>
                      <!-- image -->
                      <div class="col-md-12 col-sm-12">
                        <div class="room-img" style="background-image: url({{asset('/storage/'.$hotel->img)}});"></div>
                      </div>
                      <!-- content -->
                      <div class="col-md-12 col-sm-12">
                        <div class="desc">
                          <span class="day-tour">{{$hotel->getProvince->name}}</span>
                          <p>{{$hotel->name}}</p>
                          <p>{!!$hotel->content!!}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button id="click-form"  class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#form">Open Modal</button>
                <!-- book -->
                <div class="col-md-12">
                  <div class="wrap-division">
  									<div class="col-md-12 col-md-offset-0 heading2 animate-box fadeInUp animated-fast">
  										<h4>Thông tin khách sạn</h4>
                      <div class="col-md-12 animate-box">
                        <div class="room-wrap">
                          <div class="row">
                            <div class="tab-content">
                              <div class="active tab-pane" >
                                <div class="content panel-heading clearfix">
                                  <ul class="">
                                    <li><span>Tên khách sạn : </span> {{$hotel->name}}</li>

                                    <li><span>Địa điểm : </span> {{$hotel->getProvince->name}}</li>
                                    <li><span>Loại khách sạn :</span> {{$hotel->getStar->name}}</li>
                                    <li><span>Giá thuê :</span> {{number_format($hotel->unit_price) }} VNĐ/đêm</li>
                                    <li><span>Khuyến mãi :</span> {{$hotel->promotion_price}}</li>
                                    <li><span>Còn trống : </span> {{($hotel->room-$hotel->book)}} phòng</li>
                                  </ul>
                                </div>
                                <div class="col-sm-3 pull-right">
                                    <a href="{{'product='.$hotel->id.'&&type=hotel'}}" class="cart">
                                      <button type="button" class="btn btn-primary pull-left btn-block btn-sm submit-comment ">Đặt phòng</button>
                                    </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
  									</div>

  								</div>
              	</div>
                <!-- comment -->

                <div class="col-md-12">
								    <div class="wrap-division">
									<div class="col-md-12 col-md-offset-0 heading2 animate-box fadeInUp animated-fast">
										<h4>Bình luận</h4>
                    <div class="col-md-12 animate-box">
                      <div class="room-wrap">
                        <div class="row">
                          <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                              <!-- Post -->
                              @foreach($hotel->comment as $com)
                                <div class="post comment" id="comment-{{$com->id}}">
                                  <div class="user-block row ">
                                    <img class="img-circle img-bordered-sm"  src="{{url('/storage/1544717424-daidien.jpg')}}" alt="user image">
                                        <span class="username">
                                          <a href="#">{{$com->user->name}}</a>

                                        </span>
                                    <span class="description">{{$com->created_at}}</span>
                                  </div>
                                  <!-- /.user-block -->
                                  <p>
                                    {{$com->content}}
                                  </p>
                                  <ul class="list-inline clearfix">
                                    <li class="username"><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                    <li class="username"><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                    </li>
                                    <li class="username">
                                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                        (5)</a>
                                    </li>
                                    <li class="pull-right username">
                                      <a href="#" class="link-black text-sm more-comment">
                                        <i class="fa fa-angle-down margin-r-5"></i>
                                      </a>
                                    </li>
                                  </ul>
                                  <div class="clearfix" >
                                    <ul class="dropdown list">
                                      <li>
                                        <div class="post more-comment">
                                          <div class="user-block row ">
                                            <img class="img-circle img-bordered-sm"  src="{{url('/storage/1544717424-daidien.jpg')}}" alt="user image">
                                                <span class="username">
                                                  <a href="#">Jonathan Burke Jr.</a>

                                                </span>

                                          </div>
                                          <!-- /.user-block -->
                                          <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                          </p>
                                          <p><span class="description">  7:30 PM today</span></p>
                                          <ul class="list-inline clearfix">
                                            <li class="username"><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                            <li class="username"><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                            </li>
                                            <li class="pull-right username">
                                              <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                                (5)</a>
                                            </li>
                                          </ul>
                                          <div class="post clearfix">
                                            <div class="user-block clearfix">
                                              <img class="img-circle img-bordered-sm" src="{{url('/storage/1544717424-daidien.jpg')}}" alt="User Image">
                                              <span class="description">Bình luận của bạn ?</span>
                                            </div>
                                            <!-- form post -->
                                            <div class="clearfix">
                                              <form class="form-horizontal form">
                                                @csrf
                                                <div class="col-sm-9 form-group margin-bottom-none">
                                                    <input type="text" name="user" class="hidden" value="52">
                                                    <input name="content" class="form-control input-sm" placeholder="Hãy cho chúng tô biếtý kiến của bạn ?">
                                                </div>
                                                <div class="col-sm-3 pull-right">
                                                    <button type="submit" class="btn btn-default pull-right btn-block btn-sm submit-comment"> Bình luận</button>
                                                </div>
                                              </form>

                                            </div>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              @endforeach

                              <!-- /.post -->
                            </div>
                            <!-- form Post -->
                            <div class="post clearfix">
                              <div class="post">
                                <div class="user-block row ">

                                  <a class="link" href="#" id="more-comment">
                                    <span class="">Xem thêm</span>
                                     <i class="fa fa-angle-down"></i>
                                  </a>
                                </div>
                              </div>
                              <div class="user-block clearfix">
                                <img class="img-circle img-bordered-sm" src="{{url('/storage/1544717424-daidien.jpg')}}" alt="User Image">
                                <span class="description">Bình luận của bạn ?</span>
                              </div>
                              <div class="clearfix">
                                <form class="form-horizontal form">
                                  @csrf
                                  <div class=" col-sm-9 form-group margin-bottom-none">
                                      <input name="content" class="form-control input-sm" placeholder="Hãy cho chúng tô biếtý kiến của bạn ?">
                                    </div>
                                    <div class="col-sm-3 form-group pull-right">
                                        <button type="submit" class="btn btn-primary pull-right btn-block btn-sm submit-comment"> Bình luận</button>
                                      </div>
                                </form>
                              </div>
                            </div>
                            <!-- /.post -->

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
        </div>
      </div>

      <!-- SIDEBAR-->
      <div class="col-md-3">
        <div class="sidebar-wrap">
          <div class="side search-wrap animate-box">
            <h3 class="sidebar-heading">Tìm kiếm khách sạn</h3>
            <form method="post" class="colorlib-form" action="{{route('search.hotel')}}">
              @csrf
                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="province">Địa điểm :</label>
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
                      <div class="form-group">
                        <label for="room"><i class="fa fa-bed"></i> Phòng :</label>
                        <div class="form-field">
                          <i class="icon icon-calendar2"></i>
                          <input type="text" min="1" id="room" name="room" class="form-control " placeholder="Số phòng trống">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="price_first">Từ:</label>
                        <div class="form-field">
                          <i class="icon icon-arrow-down3"></i>
                          <input type="text" name="price_first" id="price_first" class="form-control" placeholder="200,000">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="price_last">Đến:</label>
                        <div class="form-field">
                          <i class="icon icon-arrow-down3"></i>
                          <input type="text" name="price_first" id="price_last" class="form-control" placeholder="200,000">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input type="submit" name="submit" id="submit" value="Tìm kiếm" class="btn btn-primary btn-block">
                    </div>
                  </div>
                </form>
          </div>

          <div class="side animate-box">
            <div class="row">
              <div class="col-md-12">
                <h3 class="sidebar-heading">Xếp hạng</h3>
                <form method="post" class="colorlib-form-2" action="{{route('search.hotel')}}">
                  @csrf
                   @foreach($star as $st)
                   <div class="form-check">
                      <input type="checkbox" name="star[]" id="star-{{$st->id}}" class="form-check-input" value="{{$st->id}}">
                      <label class="form-check-label" for="star-{{$st->id}}">
                        <h4 class="place">{{$st->name}}</h4>
                      </label>
                   </div>
                   @endforeach
                   <div class="col-md-12">
                     <input type="submit" name="submit" id="submit" value="Tìm kiếm" class="btn btn-primary btn-block">
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
 var angle = function($this){

   if($this.children('i').hasClass('fa-angle-down'))
   {
     $this.children('i').removeClass('fa-angle-down');
     $this.children('i').addClass('fa-angle-up');
   }
   else {
     $this.children('i').removeClass('fa-angle-up');
     $this.children('i').addClass('fa-angle-down');
   }
   // $('#more-comment').fadeToggle(600);

 };
   $('.more-comment').click(function(){
     event.preventDefault();
     angle();
   });
   $('.submit-comment').click(function(event){
     event.preventDefault();
     $url = "{{route('comment.post',['type' => 'tour','id_post' => $hotel->id])}}";
     $comment = $(this).parent().prev().children('input[name=content]');
     $user = $(this).parent().prev().children('input[name=user]').val();

     $.ajax({
       type:'post',
       url : $url,

       data : {
         'content' : $comment.val(),
         'user'    : $user,
         '_token'  : $('input[name=_token]').val(),

       },
       success:function($data)
       {

         if(!$data.errors && $data!=false)
         {

           $('#activity').append($data);
           $comment.val(" ");
         }
         else
         {
           if(($data.errors)=='sign')
           {
             $('#click-form').trigger( "click" );
           }
         }
       }
     });

   });
   $('#more-comment').click(function(event){

     event.preventDefault();

     var element = $('.comment').last().attr('id') ;
     var last  = element.split('-');

     $.ajax({
       type:'post',
       url : "{{route('get.more.comment',['type' => 'tour','id_post' => $hotel->id])}}",
       data:{
         '_token'  : $('input[name=_token]').val(),
         'id_last' : last[1]
       },
       success:function($data)
       {
         $('#activity').append($data);

       }
     });
   });
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
