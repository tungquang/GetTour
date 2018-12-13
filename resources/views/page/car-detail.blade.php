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
              <div class="col-md-12 col-md-offset-0 heading2 animate-box">
                <h2>Athens, Greece Tour</h2>
              </div>
              <div class="row">
                <div class="col-md-12 animate-box">
                  <div class="room-wrap">
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="room-img" style="background-image: url({{asset('/storage/tour-1.jpg')}});"></div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="desc">
                          <span class="day-tour">Day 1</span>
                          <h2>Athens, Greece</h2>
                          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 animate-box">
                  <div class="room-wrap">
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="room-img" style="background-image: url({{asset('/storage/tour-2.jpg')}});"></div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="desc">
                          <span class="day-tour">Day 2</span>
                          <h2>Thailand</h2>
                          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 animate-box">
                  <div class="room-wrap">
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="room-img" style="background-image: url({{asset('/storage/tour-3.jpg')}});"></div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="desc">
                          <span class="day-tour">Day 3</span>
                          <h2>Boracay, Philippines</h2>
                          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 animate-box">
                  <div class="room-wrap">
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="room-img" style="background-image: url({{asset('/storage/tour-4.jpg')}});"></div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="desc">
                          <span class="day-tour">Day 4</span>
                          <h2>Tokyo, Japan</h2>
                          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 animate-box">
                  <div class="room-wrap">
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="room-img" style="background-image: url({{asset('/storage/tour-5.jpg')}});"></div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="desc">
                          <span class="day-tour">Day 5</span>
                          <h2>Paris, Italy</h2>
                          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 animate-box">
                  <div class="room-wrap">
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="room-img" style="background-image: url({{asset('/storage/tour-6.jpg')}});"></div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="desc">
                          <span class="day-tour">Day 6</span>
                          <h2>Greece</h2>
                          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
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
