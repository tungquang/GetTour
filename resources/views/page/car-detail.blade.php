@extends('layout')
@section('content')
<aside id="colorlib-hero">
  <div class="flexslider">
    <ul class="slides">
      <li style="background-image: url({{asset('/storage/cover-img-3.jpg')}});">
        <div class="overlay"></div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
              <div class="slider-text-inner text-center">
                <h2>by colorlib.com</h2>
                <h1>Tour Overview</h1>
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

                          <h2>{{$car->name}}</h2>
                          <h4>{!!$car->description!!} </h4>
                        </div>
                      </div>
                      <!-- image -->
                      <div class="col-md-12 col-sm-12">
                        <div class="room-img" style="background-image: url({{asset('/storage/'.$car->img)}});"></div>
                      </div>
                      <!-- content -->
                      <div class="col-md-12 col-sm-12">
                        <div class="desc">

                          <p>{{$car->name}}</p>
                          <p>{!!$car->content!!}</p>
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
  										<h4>Thông tin xe</h4>
                      <div class="col-md-12 animate-box">
                        <div class="room-wrap">
                          <div class="row">
                            <div class="tab-content">
                              <div class="active tab-pane" >
                                <div class="content panel-heading clearfix">
                                  <ul class="">
                                    <li><span>Loại xe : </span> {{$car->getType->name}}</li>

                                    <li><span>Số ghế :</span> {{$car->seat}}</li>
                                    <li><span>Giá xe :</span> {{number_format($car->unit_price) }} VNĐ</li>
                                    <li><span>Khuyến mãi :</span> {{$car->promotion_price}}</li>

                                  </ul>
                                </div>

                                <div class="col-sm-3 pull-right">
                                    <a href="{{'product='.$car->id.'&&type=car'}}" class="cart">
                                      <button type="button" class="btn btn-primary pull-left btn-block btn-sm submit-comment ">Đặt xe</button>
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
                              @foreach($car->comment as $com)
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
						<h3 class="sidebar-heading">Tìm kiếm xe</h3>
						<form method="post" class="colorlib-form" action="{{route('search.car')}}">
							@csrf
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="id_type">Loại xe</label>
													<div class="form-field">
														<i class="icon icon-arrow-down3"></i>
														<select name="id_type" id="id_type" class="form-control select">
															<option value="">Chọn loại xe bạn muốn</option>
															@foreach($typecar as $type)
																<option value="{{$type->id}}">{{$type->name}}</option>
															@endforeach

														</select>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="seat"><i class="fa fa-char"></i>Số ghế</label>
													<div class="form-field">
														<i class="icon icon-calendar2"></i>
														<input type="text" min="1" id="seat" name="seat" class="form-control " placeholder="Số phòng trống">
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="price">Giá</label>
													<div class="form-field">
														<i class="icon icon-arrow-down3"></i>
														<input type="text" name="price" class="form-control" placeholder="Giá xe nhỏ nhất">
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<input type="submit" name="submit" id="submit" value="Tìm kiếm" class="btn btn-primary btn-block">
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
     $url = "{{route('comment.post',['type' => 'tour','id_post' => $car->id])}}";
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
       url : "{{route('get.more.comment',['type' => 'tour','id_post' => $car->id])}}",
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
