@extends('layout')
@section('content')
<section class="flexslider-container" id="flexslider-container-1">
    <div class="flexslider slider" id="slider-1">

      <ul class="slides" style="width: 800%; transition-duration: 0s; transform: translate3d(-1349px, 0px, 0px);">
        <li class="item-2" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)) 0% 0% / cover, url(&quot;images/homepage-slider-1.jpg&quot;) 50% 0%; height: 100%; width: 1349px; margin-right: 0px; float: left; display: block;" aria-hidden="true">
              <div class=" meta">
                  <div class="container">
                      <h2>Discover</h2>
                      <h1>Australia</h1>
                      <a href="#themes/star-travel/#" class="btn btn-default">View More</a>
                  </div><!-- end container -->
              </div><!-- end meta -->
          </li>

          <li class="item-1 flex-active-slide" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)) 0% 0% / cover, url(&quot;images/homepage-slider-1.jpg&quot;) 50% 0%; height: 100%; width: 1349px; margin-right: 0px; float: left; display: block;">
              <div class=" meta">
                  <div class="container">
                      <h2>Discover</h2>
                      <h1>Australia</h1>
                      <a href="#themes/star-travel/#" class="btn btn-default">View More</a>
                  </div><!-- end container -->
              </div><!-- end meta -->
          </li><!-- end item-1 -->

          <li class="item-2" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)) 0% 0% / cover, url(&quot;images/homepage-slider-1.jpg&quot;) 50% 0%; height: 100%; width: 1349px; margin-right: 0px; float: left; display: block;">
              <div class=" meta">
                  <div class="container">
                      <h2>Discover</h2>
                      <h1>Australia</h1>
                      <a href="#themes/star-travel/#" class="btn btn-default">View More</a>
                  </div><!-- end container -->
              </div><!-- end meta -->
          </li><!-- end item-2 -->

        <li class="item-1" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)) 0% 0% / cover, url(&quot;images/homepage-slider-1.jpg&quot;) 50% 0%; height: 100%; width: 1349px; margin-right: 0px; float: left; display: block;" aria-hidden="true">
              <div class=" meta">
                  <div class="container">
                      <h2>Discover</h2>
                      <h1>Australia</h1>
                      <a href="#themes/star-travel/#" class="btn btn-default">View More</a>
                  </div><!-- end container -->
              </div><!-- end meta -->
          </li>
      </ul>

      <ul class="flex-direction-nav">
        <li class="flex-nav-prev">
          <a class="flex-prev" href="#themes/star-travel/#">Previous</a>
        </li>
          <li class="flex-nav-next">
            <a class="flex-next" href="#themes/star-travel/#">Next</a>
        </li>
      </ul>
      </div>
    </div><!-- end slider -->

    <div class="search-tabs" id="search-tabs-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <ul class="nav nav-tabs center-tabs">
                        <li class="active"><a href="#themes/star-travel/#flights" data-toggle="tab"><span><i class="fa fa-plane"></i></span><span class="st-text">Flights</span></a></li>
                        <li><a href="#themes/star-travel/#hotels" data-toggle="tab"><span><i class="fa fa-building"></i></span><span class="st-text">Hotels</span></a></li>
                        <li><a href="#themes/star-travel/#tours" data-toggle="tab"><span><i class="fa fa-suitcase"></i></span><span class="st-text">Tours</span></a></li>
                        <li><a href="#themes/star-travel/#cruise" data-toggle="tab"><span><i class="fa fa-ship"></i></span><span class="st-text">Cruise</span></a></li>
                        <li><a href="#themes/star-travel/#cars" data-toggle="tab"><span><i class="fa fa-car"></i></span><span class="st-text">Cars</span></a></li>
                    </ul>

                    <div class="tab-content">

                        <div id="flights" class="tab-pane in active">
                            <form>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control" placeholder="From">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control" placeholder="To">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                        <div class="row">

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control dpd1" placeholder="Check In">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control dpd2" placeholder="Check Out">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                        <div class="form-group right-icon">
                                            <select class="form-control">
                                                <option selected="">Adults</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                        <button class="btn btn-orange">Search</button>
                                    </div><!-- end columns -->

                                </div><!-- end row -->
                            </form>
                        </div><!-- end flights -->

                        <div id="hotels" class="tab-pane">
                            <form>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control dpd1" placeholder="Check In">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control dpd2" placeholder="Check Out">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-12 col-md-4">
                                                <div class="form-group right-icon">
                                                    <select class="form-control">
                                                        <option selected="">Rooms</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-6 col-sm-6 col-md-4">
                                                <div class="form-group right-icon">
                                                    <select class="form-control">
                                                        <option selected="">Adults</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-6 col-sm-6 col-md-4">
                                                <div class="form-group right-icon">
                                                    <select class="form-control">
                                                        <option selected="">Kids</option>
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                        <button class="btn btn-orange">Search</button>
                                    </div><!-- end columns -->

                                </div><!-- end row -->
                            </form>
                        </div><!-- end hotels -->

                        <div id="tours" class="tab-pane">
                            <form>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4">
                                        <div class="form-group left-icon">
                                            <input type="text" class="form-control" placeholder="City,Country">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                        <div class="form-group right-icon">
                                            <select class="form-control">
                                                <option selected="">Month</option>
                                                <option>January</option>
                                                <option>February</option>
                                                <option>March</option>
                                                <option>April</option>
                                                <option>May</option>
                                                <option>June</option>
                                                <option>July</option>
                                                <option>August</option>
                                                <option>September</option>
                                                <option>October</option>
                                                <option>November</option>
                                                <option>December</option>
                                            </select>
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group right-icon">
                                                    <select class="form-control">
                                                        <option selected="">Adults</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group right-icon">
                                                    <select class="form-control">
                                                        <option selected="">Kids</option>
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                        <button class="btn btn-orange">Search</button>
                                    </div><!-- end columns -->

                                </div><!-- end row -->
                            </form>
                        </div><!-- end tours -->

                        <div id="cruise" class="tab-pane">
                            <form>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control" placeholder="From">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control" placeholder="To">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                        <div class="row">

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control dpd1" placeholder="Check In">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control dpd2" placeholder="Check Out">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                        <div class="form-group right-icon">
                                            <select class="form-control">
                                            <option selected="">Adults</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            </select>
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                        <button class="btn btn-orange">Search</button>
                                    </div><!-- end columns -->

                                </div><!-- end columns -->
                            </form>
                        </div><!-- end cruises -->

                        <div id="cars" class="tab-pane">
                            <form>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-6">
                                        <div class="row">

                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control" placeholder="Country">
                                                    <i class="fa fa-globe"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control" placeholder="City">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control" placeholder="Location">
                                                    <i class="fa fa-street-view"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                        <div class="row">

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control dpd1" placeholder="Check In">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <input type="text" class="form-control dpd2" placeholder="Check Out">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                        <button class="btn btn-orange">Search</button>
                                    </div><!-- end columns -->

                                </div><!-- end row -->
                            </form>
                        </div><!-- end cars -->

                    </div><!-- end tab-content -->

                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end search-tabs -->

</section>
<!-- end flexslider-container -->
<!--=============== HOTEL OFFERS ===============-->
<section id="hotel-offers" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-heading">
                    <h2>Hotels Offers</h2>
                    <hr class="heading-line">
                </div><!-- end page-heading -->
                <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-hotel-offers">
                    <div class="item">
                      <div class="main-block hotel-block">
                          <div class="main-img">
                              <a href="#themes/star-travel/#">
                                  <img src="images/hotel-1.jpg" class="img-responsive" alt="hotel-img">
                              </a>
                              <div class="main-mask">
                                  <ul class="list-unstyled list-inline offer-price-1">
                                      <li class="price">$568.00
                                        <span class="divider">|</span>
                                        <span class="pkg">Avg/Night</span>
                                      </li>
                                      <li class="rating">
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star lightgrey"></i></span>
                                      </li>
                                  </ul>
                              </div><!-- end main-mask -->
                          </div><!-- end offer-img -->

                          <div class="main-info hotel-info">
                              <div class="arrow">
                                  <a href="#themes/star-travel/#"><span><i class="fa fa-angle-right"></i></span></a>
                              </div><!-- end arrow -->

                              <div class="main-title hotel-title">
                                  <a href="#themes/star-travel/#">Herta Berlin Hotel</a>
                                  <p>From: Scotland</p>
                              </div><!-- end hotel-title -->
                          </div><!-- end hotel-info -->
                      </div><!-- end hotel-block -->
                    </div>
                    <div class="item">
                      <div class="main-block hotel-block">
                          <div class="main-img">
                              <a href="#themes/star-travel/#">
                                  <img src="images/hotel-1.jpg" class="img-responsive" alt="hotel-img">
                              </a>
                              <div class="main-mask">
                                  <ul class="list-unstyled list-inline offer-price-1">
                                      <li class="price">$568.00
                                        <span class="divider">|</span>
                                        <span class="pkg">Avg/Night</span>
                                      </li>
                                      <li class="rating">
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star lightgrey"></i></span>
                                      </li>
                                  </ul>
                              </div><!-- end main-mask -->
                          </div><!-- end offer-img -->

                          <div class="main-info hotel-info">
                              <div class="arrow">
                                  <a href="#themes/star-travel/#"><span><i class="fa fa-angle-right"></i></span></a>
                              </div><!-- end arrow -->

                              <div class="main-title hotel-title">
                                  <a href="#themes/star-travel/#">Herta Berlin Hotel</a>
                                  <p>From: Scotland</p>
                              </div><!-- end hotel-title -->
                          </div><!-- end hotel-info -->
                      </div><!-- end hotel-block -->
                    </div>
                    <div class="item">
                      <div class="main-block hotel-block">
                          <div class="main-img">
                              <a href="#themes/star-travel/#">
                                  <img src="images/hotel-1.jpg" class="img-responsive" alt="hotel-img">
                              </a>
                              <div class="main-mask">
                                  <ul class="list-unstyled list-inline offer-price-1">
                                      <li class="price">$568.00
                                        <span class="divider">|</span>
                                        <span class="pkg">Avg/Night</span>
                                      </li>
                                      <li class="rating">
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star lightgrey"></i></span>
                                      </li>
                                  </ul>
                              </div><!-- end main-mask -->
                          </div><!-- end offer-img -->

                          <div class="main-info hotel-info">
                              <div class="arrow">
                                  <a href="#themes/star-travel/#"><span><i class="fa fa-angle-right"></i></span></a>
                              </div><!-- end arrow -->

                              <div class="main-title hotel-title">
                                  <a href="#themes/star-travel/#">Herta Berlin Hotel</a>
                                  <p>From: Scotland</p>
                              </div><!-- end hotel-title -->
                          </div><!-- end hotel-info -->
                      </div><!-- end hotel-block -->
                    </div>
                    <div class="item">
                              <div class="main-block hotel-block">
                                  <div class="main-img">
                                      <a href="#themes/star-travel/#">
                                          <img src="images/hotel-1.jpg" class="img-responsive" alt="hotel-img">
                                      </a>
                                      <div class="main-mask">
                                          <ul class="list-unstyled list-inline offer-price-1">
                                              <li class="price">$568.00
                                                <span class="divider">|</span>
                                                <span class="pkg">Avg/Night</span>
                                              </li>
                                              <li class="rating">
                                                  <span><i class="fa fa-star orange"></i></span>
                                                  <span><i class="fa fa-star orange"></i></span>
                                                  <span><i class="fa fa-star orange"></i></span>
                                                  <span><i class="fa fa-star orange"></i></span>
                                                  <span><i class="fa fa-star lightgrey"></i></span>
                                              </li>
                                          </ul>
                                      </div><!-- end main-mask -->
                                  </div><!-- end offer-img -->

                                  <div class="main-info hotel-info">
                                      <div class="arrow">
                                          <a href="#themes/star-travel/#"><span><i class="fa fa-angle-right"></i></span></a>
                                      </div><!-- end arrow -->

                                      <div class="main-title hotel-title">
                                          <a href="#themes/star-travel/#">Herta Berlin Hotel</a>
                                          <p>From: Scotland</p>
                                      </div><!-- end hotel-title -->
                                  </div><!-- end hotel-info -->
                              </div><!-- end hotel-block -->
                            </div>
                    <div class="item">
                      <div class="main-block hotel-block">
                          <div class="main-img">
                              <a href="#themes/star-travel/#">
                                  <img src="images/hotel-1.jpg" class="img-responsive" alt="hotel-img">
                              </a>
                              <div class="main-mask">
                                  <ul class="list-unstyled list-inline offer-price-1">
                                      <li class="price">$568.00
                                        <span class="divider">|</span>
                                        <span class="pkg">Avg/Night</span>
                                      </li>
                                      <li class="rating">
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star orange"></i></span>
                                          <span><i class="fa fa-star lightgrey"></i></span>
                                      </li>
                                  </ul>
                              </div><!-- end main-mask -->
                          </div><!-- end offer-img -->

                          <div class="main-info hotel-info">
                              <div class="arrow">
                                  <a href="#themes/star-travel/#"><span><i class="fa fa-angle-right"></i></span></a>
                              </div><!-- end arrow -->

                              <div class="main-title hotel-title">
                                  <a href="#themes/star-travel/#">Herta Berlin Hotel</a>
                                  <p>From: Scotland</p>
                              </div><!-- end hotel-title -->
                          </div><!-- end hotel-info -->
                      </div><!-- end hotel-block -->
                    </div>
                    <!-- end item -->

                </div><!-- end owl-hotel-offers -->
                <div class="view-all text-center">
                    <a href="#themes/star-travel/#" class="btn btn-orange">View All</a>
                </div><!-- end view-all -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hotel-offers -->


<!--======================= BEST FEATURES =====================-->
<section id="best-features" class="banner-padding black-features">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="b-feature-block">
                    <span><i class="fa fa-dollar"></i></span>
                    <h3>Best Price Guarantee</h3>
                    <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                </div><!-- end b-feature-block -->
           </div><!-- end columns -->

           <div class="col-sm-6 col-md-3">
                <div class="b-feature-block">
                    <span><i class="fa fa-lock"></i></span>
                    <h3>Safe and Secure</h3>
                    <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                </div><!-- end b-feature-block -->
           </div><!-- end columns -->

           <div class="col-sm-6 col-md-3">
                <div class="b-feature-block">
                    <span><i class="fa fa-thumbs-up"></i></span>
                    <h3>Best Travel Agents</h3>
                    <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                </div><!-- end b-feature-block -->
           </div><!-- end columns -->

           <div class="col-sm-6 col-md-3">
                <div class="b-feature-block">
                    <span><i class="fa fa-bars"></i></span>
                    <h3>Travel Guidelines</h3>
                    <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                </div><!-- end b-feature-block -->
           </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end best-features -->


<!--=============== TOUR OFFERS ===============-->
<section id="tour-offers" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-heading">
                    <h2>Tour Offers</h2>
                    <hr class="heading-line">
                </div><!-- end page-heading -->

                 <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-tour-offers">
                    <div class="item">
                      <div class="main-block tour-block">
                          <div class="main-img">
                              <a href="#themes/star-travel/#">
                                  <img src="images/tour-1.jpg" class="img-responsive" alt="tour-img">
                              </a>
                          </div><!-- end offer-img -->

                          <div class="offer-price-2">
                              <ul class="list-unstyled">
                                  <li class="price">$568.00
                                    <a href="#themes/star-travel/#">
                                      <span class="arrow">
                                        <i class="fa fa-angle-right"></i>
                                      </span>
                                    </a>
                                  </li>
                              </ul>
                          </div><!-- end offer-price-2 -->

                          <div class="main-info tour-info">
                              <div class="main-title tour-title">
                                  <a href="#themes/star-travel/#">China Temple Tour</a>
                                  <p>From: China</p>
                                  <div class="rating">
                                      <span><i class="fa fa-star orange"></i></span>
                                      <span><i class="fa fa-star orange"></i></span>
                                      <span><i class="fa fa-star orange"></i></span>
                                      <span><i class="fa fa-star orange"></i></span>
                                      <span><i class="fa fa-star grey"></i></span>
                                  </div>
                              </div><!-- end tour-title -->
                          </div><!-- end tour-info -->
                      </div><!-- end tour-block -->
                    </div>
                    <div class="item">
                      <div class="main-block tour-block">
                        <div class="main-img">
                            <a href="#themes/star-travel/#">
                                <img src="images/tour-2.jpg" class="img-responsive" alt="tour-img">
                            </a>
                        </div><!-- end offer-img -->

                        <div class="offer-price-2">
                            <ul class="list-unstyled">
                                <li class="price">$745.00<a href="#themes/star-travel/#"><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                            </ul>
                        </div><!-- end offer-price-2 -->

                        <div class="main-info tour-info">
                          <div class="main-title tour-title">
                              <a href="#themes/star-travel/#">African Safari Tour</a>
                              <p>From: Africa</p>
                              <div class="rating">
                                  <span><i class="fa fa-star orange"></i></span>
                                  <span><i class="fa fa-star orange"></i></span>
                                  <span><i class="fa fa-star orange"></i></span>
                                  <span><i class="fa fa-star orange"></i></span>
                                  <span><i class="fa fa-star grey"></i></span>
                              </div>
                          </div><!-- end tour-title -->
                      </div><!-- end tour-info -->
                      </div><!-- end tour-block -->
                    </div>
                    <div class="item">
                      <div class="main-block tour-block">
                          <div class="main-img">
                                <a href="#themes/star-travel/#">
                                    <img src="images/tour-3.jpg" class="img-responsive" alt="tour-img">
                                </a>
                            </div><!-- end offer-img -->

                          <div class="offer-price-2">
                                <ul class="list-unstyled">
                                    <li class="price">$459.00<a href="#themes/star-travel/#"><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                </ul>
                            </div><!-- end offer-price-2 -->

                            <div class="main-info tour-info">
                                <div class="main-title tour-title">
                                    <a href="#themes/star-travel/#">Paris City Tour</a>
                                    <p>From: Paris</p>
                                    <div class="rating">
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star grey"></i></span>
                                    </div>
                                </div><!-- end tour-title -->
                            </div><!-- end tour-info -->
                      </div><!-- end tour-block -->
                    </div>
                    <div class="item">
                      <div class="main-block tour-block">
                          <div class="main-img">
                                <a href="#themes/star-travel/#">
                                    <img src="images/tour-3.jpg" class="img-responsive" alt="tour-img">
                                </a>
                            </div><!-- end offer-img -->

                          <div class="offer-price-2">
                                <ul class="list-unstyled">
                                    <li class="price">$459.00<a href="#themes/star-travel/#"><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                </ul>
                            </div><!-- end offer-price-2 -->

                            <div class="main-info tour-info">
                                <div class="main-title tour-title">
                                    <a href="#themes/star-travel/#">Paris City Tour</a>
                                    <p>From: Paris</p>
                                    <div class="rating">
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star grey"></i></span>
                                    </div>
                                </div><!-- end tour-title -->
                            </div><!-- end tour-info -->
                      </div><!-- end tour-block -->
                    </div>
                    <div class="item">
                      <div class="main-block tour-block">
                          <div class="main-img">
                                <a href="#themes/star-travel/#">
                                    <img src="images/tour-3.jpg" class="img-responsive" alt="tour-img">
                                </a>
                            </div><!-- end offer-img -->

                          <div class="offer-price-2">
                                <ul class="list-unstyled">
                                    <li class="price">$459.00<a href="#themes/star-travel/#"><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                </ul>
                            </div><!-- end offer-price-2 -->

                            <div class="main-info tour-info">
                                <div class="main-title tour-title">
                                    <a href="#themes/star-travel/#">Paris City Tour</a>
                                    <p>From: Paris</p>
                                    <div class="rating">
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star grey"></i></span>
                                    </div>
                                </div><!-- end tour-title -->
                            </div><!-- end tour-info -->
                      </div><!-- end tour-block -->
                    </div>
                    <div class="item">
                      <div class="main-block tour-block">
                          <div class="main-img">
                                <a href="#themes/star-travel/#">
                                    <img src="images/tour-3.jpg" class="img-responsive" alt="tour-img">
                                </a>
                            </div><!-- end offer-img -->

                          <div class="offer-price-2">
                                <ul class="list-unstyled">
                                    <li class="price">$459.00<a href="#themes/star-travel/#"><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                </ul>
                            </div><!-- end offer-price-2 -->

                            <div class="main-info tour-info">
                                <div class="main-title tour-title">
                                    <a href="#themes/star-travel/#">Paris City Tour</a>
                                    <p>From: Paris</p>
                                    <div class="rating">
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star grey"></i></span>
                                    </div>
                                </div><!-- end tour-title -->
                            </div><!-- end tour-info -->
                      </div><!-- end tour-block -->
                    </div>
                </div>
                <div class="view-all text-center">
                    <a href="#themes/star-travel/#" class="btn btn-orange">View All</a>
                </div><!-- end view-all -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end tour-offers -->


<!--=============== CRUISE OFFERS ===============-->
<section id="cruise-offers" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-heading">
                    <h2>Cruise Offers</h2>
                    <hr class="heading-line">
                </div><!-- end page-heading -->

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="main-block cruise-block">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-md-push-6 no-pd-l">
                                    <div class="main-img cruise-img">
                                        <a href="#themes/star-travel/#">
                                            <img src="images/cruise-1.jpg" class="img-responsive" alt="cruise-img">
                                            <div class="cruise-mask">
                                                <p>7 Nights, 6 Days</p>
                                            </div><!-- end cruise-mask -->
                                        </a>
                                    </div><!-- end cruise-img -->
                                </div><!-- end columns -->

                                <div class="col-sm-12 col-md-6 col-md-pull-6 no-pd-r">
                                    <div class=" main-info cruise-info">
                                        <div class="main-title cruise-title">
                                            <a href="#themes/star-travel/#">Spain Boat Tour</a>
                                            <p>From: Italy to Spain</p>
                                            <div class="rating">
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star grey"></i></span>
                                            </div><!-- end rating -->

                                            <span class="cruise-price">$950.00</span>
                                        </div><!-- end cruise-title -->
                                    </div><!-- end cruise-info -->
                                </div><!-- end columns -->

                            </div><!-- end row -->
                        </div><!-- end cruise-block -->
                    </div><!-- end columns -->

                    <div class="col-sm-6 col-md-6">
                        <div class="main-block cruise-block">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-md-push-6 no-pd-l">
                                    <div class="main-img cruise-img">
                                        <a href="#themes/star-travel/#">
                                            <img src="images/cruise-2.jpg" class="img-responsive" alt="cruise-img">
                                            <div class="cruise-mask">
                                                <p>7 Nights, 6 Days</p>
                                            </div><!-- end cruise-mask -->
                                        </a>
                                    </div><!-- end cruise-img -->
                                </div><!-- end columns -->

                                <div class="col-sm-12 col-md-6 col-md-pull-6 no-pd-r">
                                    <div class=" main-info cruise-info">
                                        <div class="main-title cruise-title">
                                            <a href="#themes/star-travel/#">Spain Boat Tour</a>
                                            <p>From: Italy to Spain</p>
                                            <div class="rating">
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star grey"></i></span>
                                            </div><!-- end rating -->

                                            <span class="cruise-price">$950.00</span>
                                        </div><!-- end cruise-title -->
                                    </div><!-- end cruise-info -->
                                </div><!-- end columns -->

                            </div><!-- end row -->
                        </div><!-- end cruise-block -->
                    </div><!-- end columns -->

                    <div class="col-sm-6 col-md-6">
                        <div class="main-block cruise-block">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-md-push-6 no-pd-l">
                                    <div class="main-img cruise-img">
                                        <a href="#themes/star-travel/#">
                                            <img src="images/cruise-3.jpg" class="img-responsive" alt="cruise-img">
                                            <div class="cruise-mask">
                                                <p>7 Nights, 6 Days</p>
                                            </div><!-- end cruise-mask -->
                                        </a>
                                    </div><!-- end cruise-img -->
                                </div><!-- end columns -->

                                <div class="col-sm-12 col-md-6 col-md-pull-6 no-pd-r">
                                    <div class=" main-info cruise-info">
                                        <div class="main-title cruise-title">
                                            <a href="#themes/star-travel/#">Spain Boat Tour</a>
                                            <p>From: Italy to Spain</p>
                                            <div class="rating">
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star grey"></i></span>
                                            </div><!-- end rating -->

                                            <span class="cruise-price">$950.00</span>
                                        </div><!-- end cruise-title -->
                                    </div><!-- end cruise-info -->
                                </div><!-- end columns -->

                            </div><!-- end row -->
                        </div><!-- end cruise-block -->
                    </div><!-- end columns -->

                    <div class="col-sm-6 col-md-6">
                        <div class="main-block cruise-block">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-md-push-6 no-pd-l">
                                    <div class="main-img cruise-img">
                                        <a href="#themes/star-travel/#">
                                            <img src="images/cruise-4.jpg" class="img-responsive" alt="cruise-img">
                                            <div class="cruise-mask">
                                                <p>7 Nights, 6 Days</p>
                                            </div><!-- end cruise-mask -->
                                        </a>
                                    </div><!-- end cruise-img -->
                                </div><!-- end columns -->

                                <div class="col-sm-12 col-md-6 col-md-pull-6 no-pd-r">
                                    <div class=" main-info cruise-info">
                                        <div class="main-title cruise-title">
                                            <a href="#themes/star-travel/#">Spain Boat Tour</a>
                                            <p>From: Italy to Spain</p>
                                            <div class="rating">
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star grey"></i></span>
                                            </div><!-- end rating -->

                                            <span class="cruise-price">$950.00</span>
                                        </div><!-- end cruise-title -->
                                    </div><!-- end cruise-info -->
                                </div><!-- end columns -->

                            </div><!-- end row -->
                        </div><!-- end cruise-block -->
                    </div><!-- end columns -->
                </div><!-- end row -->

                <div class="view-all text-center">
                    <a href="#themes/star-travel/#" class="btn btn-orange">View All</a>
                </div><!-- end view-all -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cruise-offers -->


<!--==================== VIDEO BANNER ===================-->
<section id="video-banner" class="banner-padding back-size">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Take a Video Tour</h2>
                <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</p>

                <a href="https://youtube.com/watch?v=0O2aH4XLbto" class="popup-youtube" id="play-button"><span><i class="fa fa-play"></i></span></a>
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end video-banner -->


<!--================= FLIGHT OFFERS =============-->
<section id="flight-offers" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-heading">
                    <h2>Flight Offers</h2>
                    <hr class="heading-line">
                </div><!-- end page-heading -->

                <div class="row">

                    <div class="col-sm-6 col-md-4">
                        <div class="main-block flight-block">
                            <a href="#themes/star-travel/#">
                                <div class="flight-img">
                                    <img src="images/flight-1.jpg" class="img-responsive" alt="flight-img">
                                </div><!-- end flight-img -->

                                <div class="flight-info">
                                    <div class="flight-title">
                                        <h3><span class="flight-destination">Spain</span>|<span class="flight-type">OneWay Flight</span></h3>
                                    </div><!-- end flight-title -->

                                    <div class=" flight-timing">
                                        <ul class="list-unstyled">
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 02-2017 </span>(8:40 PM)</li>
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 03-2017 </span>(8:40 PM)</li>
                                        </ul>
                                    </div><!-- end flight-timing -->

                                    <ul class="list-unstyled list-inline offer-price-1">
                                        <li class="price">$568.00<span class="pkg">Avg/Person</span></li>
                                        <li class="rating">
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star lightgrey"></i></span>
                                        </li>
                                    </ul>
                                </div><!-- end flight-info -->
                            </a>
                        </div><!-- end flight-block -->
                    </div><!-- end columns -->

                    <div class="col-sm-6 col-md-4">
                        <div class="main-block flight-block">
                            <a href="#themes/star-travel/#">
                                <div class="flight-img">
                                    <img src="images/flight-2.jpg" class="img-responsive" alt="flight-img">
                                </div><!-- end flight-img -->

                                <div class="flight-info">
                                    <div class="flight-title">
                                        <h3><span class="flight-destination">Spain</span>|<span class="flight-type">OneWay Flight</span></h3>
                                    </div><!-- end flight-title -->

                                    <div class=" flight-timing">
                                        <ul class="list-unstyled">
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 02-2017 </span>(8:40 PM)</li>
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 03-2017 </span>(8:40 PM)</li>
                                        </ul>
                                    </div><!-- end flight-timing -->

                                    <ul class="list-unstyled list-inline offer-price-1">
                                        <li class="price">$568.00<span class="pkg">Avg/Person</span></li>
                                        <li class="rating">
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star lightgrey"></i></span>
                                        </li>
                                    </ul>
                                </div><!-- end flight-info -->
                            </a>
                        </div><!-- end flight-block -->
                    </div><!-- end columns -->

                    <div class="col-sm-6 col-md-4">
                        <div class="main-block flight-block">
                            <a href="#themes/star-travel/#">
                                <div class="flight-img">
                                    <img src="images/flight-3.jpg" class="img-responsive" alt="flight-img">
                                </div><!-- end flight-img -->

                                <div class="flight-info">
                                    <div class="flight-title">
                                        <h3><span class="flight-destination">Spain</span>|<span class="flight-type">OneWay Flight</span></h3>
                                    </div><!-- end flight-title -->

                                    <div class=" flight-timing">
                                        <ul class="list-unstyled">
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 02-2017 </span>(8:40 PM)</li>
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 03-2017 </span>(8:40 PM)</li>
                                        </ul>
                                    </div><!-- end flight-timing -->

                                    <ul class="list-unstyled list-inline offer-price-1">
                                        <li class="price">$568.00<span class="pkg">Avg/Person</span></li>
                                        <li class="rating">
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star lightgrey"></i></span>
                                        </li>
                                    </ul>
                                </div><!-- end flight-info -->
                            </a>
                        </div><!-- end flight-block -->
                    </div><!-- end columns -->

                    <div class="col-sm-6 col-md-4">
                        <div class="main-block flight-block">
                            <a href="#themes/star-travel/#">
                                <div class="flight-img">
                                    <img src="images/flight-4.jpg" class="img-responsive" alt="flight-img">
                                </div><!-- end flight-img -->

                                <div class="flight-info">
                                    <div class="flight-title">
                                        <h3><span class="flight-destination">Spain</span>|<span class="flight-type">OneWay Flight</span></h3>
                                    </div><!-- end flight-title -->

                                    <div class=" flight-timing">
                                        <ul class="list-unstyled">
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 02-2017 </span>(8:40 PM)</li>
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 03-2017 </span>(8:40 PM)</li>
                                        </ul>
                                    </div><!-- end flight-timing -->

                                    <ul class="list-unstyled list-inline offer-price-1">
                                        <li class="price">$568.00<span class="pkg">Avg/Person</span></li>
                                        <li class="rating">
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star lightgrey"></i></span>
                                        </li>
                                    </ul>
                                </div><!-- end flight-info -->
                            </a>
                        </div><!-- end flight-block -->
                    </div><!-- end columns -->

                    <div class="col-sm-6 col-md-4">
                        <div class="main-block flight-block">
                            <a href="#themes/star-travel/#">
                                <div class="flight-img">
                                    <img src="images/flight-5.jpg" class="img-responsive" alt="flight-img">
                                </div><!-- end flight-img -->

                                <div class="flight-info">
                                    <div class="flight-title">
                                        <h3><span class="flight-destination">Spain</span>|<span class="flight-type">OneWay Flight</span></h3>
                                    </div><!-- end flight-title -->

                                    <div class=" flight-timing">
                                        <ul class="list-unstyled">
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 02-2017 </span>(8:40 PM)</li>
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 03-2017 </span>(8:40 PM)</li>
                                        </ul>
                                    </div><!-- end flight-timing -->

                                    <ul class="list-unstyled list-inline offer-price-1">
                                        <li class="price">$568.00<span class="pkg">Avg/Person</span></li>
                                        <li class="rating">
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star lightgrey"></i></span>
                                        </li>
                                    </ul>
                                </div><!-- end flight-info -->
                            </a>
                        </div><!-- end flight-block -->
                    </div><!-- end columns -->

                    <div class="col-sm-6 col-md-4">
                        <div class="main-block flight-block">
                            <a href="#themes/star-travel/#">
                                <div class="flight-img">
                                    <img src="images/flight-6.jpg" class="img-responsive" alt="flight-img">
                                </div><!-- end flight-img -->

                                <div class="flight-info">
                                    <div class="flight-title">
                                        <h3><span class="flight-destination">Spain</span>|<span class="flight-type">OneWay Flight</span></h3>
                                    </div><!-- end flight-title -->

                                    <div class=" flight-timing">
                                        <ul class="list-unstyled">
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 02-2017 </span>(8:40 PM)</li>
                                            <li><span><i class="fa fa-plane"></i></span><span class="date">Aug, 03-2017 </span>(8:40 PM)</li>
                                        </ul>
                                    </div><!-- end flight-timing -->

                                    <ul class="list-unstyled list-inline offer-price-1">
                                        <li class="price">$568.00<span class="pkg">Avg/Person</span></li>
                                        <li class="rating">
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star lightgrey"></i></span>
                                        </li>
                                    </ul>
                                </div><!-- end flight-info -->
                            </a>
                        </div><!-- end flight-block -->
                    </div><!-- end columns -->

                </div><!-- end row -->

                <div class="view-all text-center">
                    <a href="#themes/star-travel/#" class="btn btn-orange">View All</a>
                </div><!-- end view-all -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end flight-offers -->


<!--==================== HIGHLIGHTS ====================-->
<section id="highlights" class="section-padding back-size">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div id="boxes">

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="highlight-box">
                                <div class="h-icon">
                                    <span><i class="fa fa-plane"></i></span>
                                </div><!-- end h-icon -->

                                <div class="h-text">
                                    <span class="numbers">2496</span>
                                    <p>Outstanding Tours</p>
                                </div><!-- end h-text -->
                            </div><!-- end highlight-box -->
                        </div><!-- end columns -->

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="highlight-box">
                                <div class="h-icon">
                                    <span><i class="fa fa-ship"></i></span>
                                </div><!-- end h-icon -->

                                <div class="h-text cruise">
                                    <span class="numbers">1906</span>
                                    <p>Worldwide Cruise</p>
                                </div><!-- end h-text -->
                            </div><!-- end highlight-box -->
                        </div><!-- end columns -->

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="highlight-box">
                                <div class="h-icon">
                                    <span><i class="fa fa-taxi"></i></span>
                                </div><!-- end h-icon -->

                                <div class="h-text taxi">
                                    <span class="numbers">2033</span>
                                    <p>Luxury Car Booking</p>
                                </div><!-- end h-text -->
                            </div><!-- end highlight-box -->
                        </div><!-- end columns -->

                    </div><!-- end boxes -->
                </div><!-- end row -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end highlights -->


<!--================ VEHICLE OFFERS ==============-->
<section id="vehicle-offers" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-heading">
                    <h2>Vehicle Offers</h2>
                    <hr class="heading-line">
                </div><!-- end page-heading -->

                <div class="row">

                    <div class="col-sm-6 col-md-4">
                        <div class="main-block vehicle-block">
                            <div class="main-img vehicle-img">
                                <a href="#themes/star-travel/#">
                                    <img src="images/vehicle-1.jpg" class="img-responsive" alt="tour-img">
                                </a>
                                <div class="vehicle-time">
                                    <p><span><i class="fa fa-clock-o"></i></span>22/h</p>
                                </div><!-- end vehicle-time -->
                            </div><!-- end vehicle-img -->

                            <div class="offer-price-2">
                                <ul class="list-unstyled">
                                    <li class="price">$89<a href="#themes/star-travel/#"><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                </ul>
                            </div><!-- end offer-price-2 -->

                            <div class="main-info vehicle-info">
                                <div class="main-title vehicle-title">
                                    <a href="#themes/star-travel/#">Mercedes Benz</a>
                                    <p>Per Day</p>
                                    <div class="rating">
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star lightgrey"></i></span>
                                    </div>
                                </div><!-- end vehicle-title -->
                            </div><!-- end vehicle-info -->
                        </div><!-- end vehicle-block -->
                    </div><!-- end columns -->

                    <div class="col-sm-6 col-md-4">
                        <div class="main-block vehicle-block">
                            <div class="main-img vehicle-img">
                                <a href="#themes/star-travel/#">
                                    <img src="images/vehicle-2.jpg" class="img-responsive" alt="tour-img">
                                </a>
                                <div class="vehicle-time">
                                    <p><span><i class="fa fa-clock-o"></i></span>22/h</p>
                                </div><!-- end vehicle-time -->
                            </div><!-- end vehicle-img -->

                            <div class="offer-price-2">
                                <ul class="list-unstyled">
                                    <li class="price">$99<a href="#themes/star-travel/#"><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                </ul>
                            </div><!-- end offer-price-2 -->

                            <div class="main-info vehicle-info">
                                <div class="main-title vehicle-title">
                                    <a href="#themes/star-travel/#">Ferrari</a>
                                    <p>Per Day</p>
                                    <div class="rating">
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star lightgrey"></i></span>
                                    </div>
                                </div><!-- end vehicle-title -->
                            </div><!-- end vehicle-info -->
                        </div><!-- end vehicle-block -->
                    </div><!-- end columns -->

                    <div class="col-sm-6 col-md-4">
                        <div class="main-block vehicle-block">
                            <div class="main-img vehicle-img">
                                <a href="#themes/star-travel/#">
                                    <img src="images/vehicle-3.jpg" class="img-responsive" alt="tour-img">
                                </a>
                                <div class="vehicle-time">
                                    <p><span><i class="fa fa-clock-o"></i></span>22/h</p>
                                </div><!-- end vehicle-time -->
                            </div><!-- end vehicle-img -->

                            <div class="offer-price-2">
                                <ul class="list-unstyled">
                                    <li class="price">$79<a href="#themes/star-travel/#"><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                </ul>
                            </div><!-- end offer-price-2 -->

                            <div class="main-info vehicle-info">
                                <div class="main-title vehicle-title">
                                    <a href="#themes/star-travel/#">Range Rover</a>
                                    <p>Per Day</p>
                                    <div class="rating">
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star lightgrey"></i></span>
                                    </div>
                                </div><!-- end vehicle-title -->
                            </div><!-- end vehicle-info -->
                        </div><!-- end vehicle-block -->
                    </div><!-- end columns -->

                </div><!-- end row -->

                <div class="view-all text-center">
                    <a href="#themes/star-travel/#" class="btn btn-orange">View All</a>
                </div><!-- end view-all -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end vehicle-offers -->


<!--==================== TESTIMONIALS ====================-->
<section id="testimonials" class="section-padding back-size">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-heading white-heading">
                    <h2>Testimonials</h2>
                    <hr class="heading-line">
                </div><!-- end page-heading -->

                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <div class="carousel-inner text-center">

                        <div class="item active">
                            <blockquote>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</blockquote>
                            <div class="rating">
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star lightgrey"></i></span>
                            </div><!-- end rating -->
                            <small>Jhon Smith</small>
                        </div><!-- end item -->

                        <div class="item">
                            <blockquote>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</blockquote>
                            <div class="rating">
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star lightgrey"></i></span>
                            </div><!-- end rating -->

                            <small>Jhon Smith</small>
                        </div><!-- end item -->

                        <div class="item">
                            <blockquote>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</blockquote>
                            <div class="rating">
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star orange"></i></span>
                                <span><i class="fa fa-star lightgrey"></i></span>
                            </div><!-- end rating -->

                            <small>Jhon Smith</small>
                        </div><!-- end item -->

                    </div><!-- end carousel-inner -->

                    <ol class="carousel-indicators">
                        <li data-target="#quote-carousel" data-slide-to="0" class="active"><img src="images/client-1.jpg" class="img-responsive" alt="client-img">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="1" class=""><img src="images/client-2.jpg" class="img-responsive" alt="client-img">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="2" class=""><img src="images/client-3.jpg" class="img-responsive" alt="client-img">
                        </li>
                    </ol>

                </div><!-- end quote-carousel -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end testimonials -->


<!--================ LATEST BLOG ==============-->
<section id="latest-blog" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-heading">
                    <h2>Our Latest Blogs</h2>
                    <hr class="heading-line">
                </div>

                <div class="row">

                     <div class="col-sm-6 col-md-4">
                        <div class="main-block latest-block">
                            <div class="main-img latest-img">
                                <a href="#themes/star-travel/#">
                                    <img src="images/latest-blog-1.jpg" class="img-responsive" alt="blog-img">
                                </a>
                            </div><!-- end latest-img -->

                            <div class="latest-info">
                                <ul class="list-unstyled">
                                    <li><span><i class="fa fa-calendar-minus-o"></i></span>29 April,2017<span class="author">by: <a href="#themes/star-travel/#">Jhon Smith</a></span></li>
                                </ul>
                            </div><!-- end latest-info -->

                            <div class="main-info latest-desc">
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10 main-title">
                                        <a href="#themes/star-travel/#">Travel Insuranve Benefits</a>
                                        <p>Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</p>
                                    </div><!-- end columns -->
                                </div><!-- end row -->

                                <span class="arrow"><a href="#themes/star-travel/#"><i class="fa fa-angle-right"></i></a></span>
                            </div><!-- end latest-desc -->
                        </div><!-- end latest-block -->
                    </div><!-- end columns -->

                    <div class="col-sm-6 col-md-4">
                        <div class="main-block latest-block">
                            <div class="main-img latest-img">
                                <a href="#themes/star-travel/#">
                                    <img src="images/latest-blog-2.jpg" class="img-responsive" alt="blog-img">
                                </a>
                            </div><!-- end latest-img -->

                            <div class="latest-info">
                                <ul class="list-unstyled">
                                    <li><span><i class="fa fa-calendar-minus-o"></i></span>29 April,2017<span class="author">by: <a href="#themes/star-travel/#">Jhon Smith</a></span></li>
                                </ul>
                            </div><!-- end latest-info -->

                            <div class="main-info latest-desc">
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10 main-title">
                                        <a href="#themes/star-travel/#">Travel Guideline Agents</a>
                                        <p>Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</p>
                                    </div><!-- end columns -->
                                </div><!-- end row -->

                                <span class="arrow"><a href="#themes/star-travel/#"><i class="fa fa-angle-right"></i></a></span>
                            </div><!-- end latest-desc -->
                        </div><!-- end latest-block -->
                     </div><!-- end columns -->

                     <div class="col-sm-6 col-md-4">
                        <div class="main-block latest-block">
                            <div class="main-img latest-img">
                                <a href="#themes/star-travel/#">
                                    <img src="images/latest-blog-3.jpg" class="img-responsive" alt="blog-img">
                                </a>
                            </div><!-- end latest-img -->

                            <div class="latest-info">
                                <ul class="list-unstyled">
                                    <li><span><i class="fa fa-calendar-minus-o"></i></span>29 April,2017<span class="author">by: <a href="#themes/star-travel/#">Jhon Smith</a></span></li>
                                </ul>
                            </div><!-- end latest-info -->

                            <div class="main-info latest-desc">
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10 main-title">
                                        <a href="#themes/star-travel/#">Secure Travel Tips</a>
                                        <p>Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</p>
                                    </div><!-- end columns -->
                                </div><!-- end row -->

                                <span class="arrow"><a href="#themes/star-travel/#"><i class="fa fa-angle-right"></i></a></span>
                            </div><!-- end latest-desc -->
                        </div><!-- end latest-block -->
                     </div><!-- end columns -->

                </div><!-- end row -->

                <div class="view-all text-center">
                    <a href="#themes/star-travel/#" class="btn btn-orange">View All</a>
                </div><!-- end view-all -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end latest-blog -->


<!--========================= NEWSLETTER-1 ==========================-->
<section id="newsletter-1" class="section-padding back-size newsletter">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h2>Subscribe Our Newsletter</h2>
                <p>Subscibe to receive our interesting updates</p>
                <form>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" class="form-control input-lg" placeholder="Enter your email address" required="">
                            <span class="input-group-btn"><button class="btn btn-lg"><i class="fa fa-envelope"></i></button></span>
                        </div>
                    </div>
                </form>
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end newsletter-1 -->


@endsection
