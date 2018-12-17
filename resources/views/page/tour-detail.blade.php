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
                          <span class="day-tour">{{$tour->getProvince->name}}</span>
                          <h2>{{$tour->name}}</h2>
                          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                        </div>
                      </div>
                      <!-- image -->
                      <div class="col-md-12 col-sm-12">
                        <div class="room-img" style="background-image: url({{asset('/storage/tour-1.jpg')}});"></div>
                      </div>
                      <!-- content -->
                      <div class="col-md-12 col-sm-12">
                        <div class="desc">
                          <span class="day-tour">{{$tour->getProvince->name}}</span>
                          <p>{{$tour->name}}</p>
                          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
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
                              @foreach($comment as $com)
                              <div class="post">
                                <div class="user-block row ">
                                  <img class="img-circle img-bordered-sm"  src="{{url('/storage/1544717424-daidien.jpg')}}" alt="user image">
                                      <span class="username">
                                        <a href="#">{{$com->user}}</a>

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
                                <div class="clearfix" id="more-comment">
                                  <ul class="dropdown list">
                                    <li>
                                      <div class="post ">
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
                                        <button type="submit" class="btn btn-default pull-right btn-block btn-sm submit-comment"> Bình luận</button>
                                      </div>
                                </form>
                              </div>
                            </div>
                            <!-- /.post -->
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
                              <form class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                                  <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                  <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                  <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
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
                        </div>
                      </div>
                    </div>
									</div>

								</div>
							</div>

                <div class="col-md-12 animate-box text-center">
                  <p><a href="#" class="btn btn-primary">Book Now!</a></p>
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
            <h3 class="sidebar-heading">Tìm kiếm Tour</h3>
            <form method="post" class="colorlib-form">
              @csrf
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
                         @csrf
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
                  @csrf
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
</div>fa-angle-down
@endsection
@section('script')
   <script type="text/javascript">
      $('.more-comment').click(function(event){
        event.preventDefault();
        if($(this).children('i').hasClass('fa-angle-down'))
        {
          $(this).children('i').removeClass('fa-angle-down');
          $(this).children('i').addClass('fa-angle-up');
        }
        else {
          $(this).children('i').removeClass('fa-angle-up');
          $(this).children('i').addClass('fa-angle-down');
        }
        $('#more-comment').fadeToggle(600);

      });
      $('.submit-comment').click(function(event){
        event.preventDefault();
        $url = "{{route('comment.post',['type' => 'tour','id_post' => $tour->id])}}";
        $comment = $(this).parent().prev().children('input[name=content]');
        $user = $(this).parent().prev().children('input[name=user]').val();

        $.ajax({
          type:'post',
          url : $url,

          data : {
            'content' : $comment.val(),
            'user'    : $user,
            '_token'  : $('input[name=_token]').val(),
            'id_post' : {{$tour->id}},
            'type'    : 'tour'
          },
          success:function($data)
          {
            if($data)
            {
              $('#activity').append($data);
              $comment.val(" ");
            }
            else
            {
              console.log('failt');
            }
          }
        });

      });
   </script>
@endsection
