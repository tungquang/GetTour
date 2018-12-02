@extends('layout')
@section('content')
<section class="flexslider-container" id="flexslider-container-3">
    <div class="flexslider slider" id="slider-3">
     <ul class="slides">
        <li class="item-2" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)) 0% 0% / cover, url(&quot;images/hotel-slider-1.jpg&quot;) 50% 65%; height: 100%; width: 1349px; margin-right: 0px; float: left; display: block;" aria-hidden="true">
        </li>
        <li class="item-1 flex-active-slide" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)) 0% 0% / cover, url(&quot;images/hotel-slider-1.jpg&quot;) 50% 65%; height: 100%; width: 1349px; margin-right: 0px; float: left; display: block;">
        </li>
        <!-- end item-1 -->
        <li class="item-2" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)) 0% 0% / cover, url(&quot;images/hotel-slider-1.jpg&quot;) 50% 65%; height: 100%; width: 1349px; margin-right: 0px; float: left; display: block;">
        </li>
        <!-- end item-2 -->
        <li class="item-1" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)) 0% 0% / cover, url(&quot;images/hotel-slider-1.jpg&quot;) 50% 65%; height: 100%; width: 1349px; margin-right: 0px; float: left; display: block;" aria-hidden="true">
        </li>
     </ul>
      <ul class="flex-direction-nav">
         <li class="flex-nav-prev"><a class="flex-prev" href="#.net/themes/star-travel/hotel-homepage.html#">Previous</a></li>
         <li class="flex-nav-next"><a class="flex-next" href="#.net/themes/star-travel/hotel-homepage.html#">Next</a></li>
      </ul>
    </div><!-- end slider -->
    <div class="search-tabs" id="search-tabs-3">
      <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-pd-r">

                    <ul class="nav nav-tabs">
                        <li><a href="#.net/themes/star-travel/hotel-homepage.html#flights" data-toggle="tab"><span><i class="fa fa-plane"></i></span><span class="st-text">Flights</span></a></li>
                        <li class="active"><a href="#.net/themes/star-travel/hotel-homepage.html#hotels" data-toggle="tab"><span><i class="fa fa-building"></i></span><span class="st-text">Hotels</span></a></li>
                        <li><a href="#.net/themes/star-travel/hotel-homepage.html#tours" data-toggle="tab"><span><i class="fa fa-suitcase"></i></span><span class="st-text">Tours</span></a></li>
                        <li><a href="#.net/themes/star-travel/hotel-homepage.html#cruise" data-toggle="tab"><span><i class="fa fa-ship"></i></span><span class="st-text">Cruise</span></a></li>
                        <li><a href="#.net/themes/star-travel/hotel-homepage.html#cars" data-toggle="tab"><span><i class="fa fa-car"></i></span><span class="st-text">Cars</span></a></li>
                    </ul>

                    <div class="tab-content">

                        <div id="flights" class="tab-pane">
                            <form>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>From</label>
                                                    <input type="text" class="form-control" placeholder="City, Country">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>To</label>
                                                    <input type="text" class="form-control" placeholder="City, Country">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>Check In</label>
                                                    <input type="text" class="form-control dpd1" placeholder="mm/dd/yy">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>Check Out</label>
                                                    <input type="text" class="form-control dpd2" placeholder="mm/dd/yy">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group right-icon">
                                            <label>Adults</label>
                                            <select class="form-control">
                                                <option selected="">01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                            </select>
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search-btn">
                                        <button class="btn btn-orange">Search</button>
                                    </div><!-- end columns -->

                                </div><!-- end row -->
                            </form>
                        </div><!-- end flights -->

                        <div id="hotels" class="tab-pane in active">
                            <form>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group left-icon">
                                                    <label>Check In</label>
                                                    <input type="text" class="form-control dpd1" placeholder="Check In">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group left-icon">
                                                    <label>Check Out</label>
                                                    <input type="text" class="form-control dpd2" placeholder="Check Out">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group right-icon">
                                                    <label>Rooms</label>
                                                    <select class="form-control">
                                                        <option selected="">01</option>
                                                        <option>02</option>
                                                        <option>03</option>
                                                        <option>04</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group right-icon">
                                                    <label>Adults</label>
                                                    <select class="form-control">
                                                        <option selected="">01</option>
                                                        <option>02</option>
                                                        <option>03</option>
                                                        <option>04</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group right-icon">
                                                    <label>Kids</label>
                                                    <select class="form-control">
                                                        <option selected="">01</option>
                                                        <option>02</option>
                                                        <option>03</option>
                                                        <option>04</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search-btn">
                                        <button class="btn btn-orange">Search</button>
                                    </div><!-- end columns -->

                                </div><!-- end row -->
                            </form>
                        </div><!-- end hotels -->

                        <div id="tours" class="tab-pane">
                            <form>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group left-icon">
                                            <label>Your Destination</label>
                                            <input type="text" class="form-control" placeholder="City, Country">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group right-icon">
                                            <label>Month</label>
                                            <select class="form-control">
                                                <option selected="">January</option>
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

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group right-icon">
                                                    <label>Adults</label>
                                                    <select class="form-control">
                                                        <option selected="">01</option>
                                                        <option>02</option>
                                                        <option>03</option>
                                                        <option>04</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group right-icon">
                                                    <label>Kids</label>
                                                    <select class="form-control">
                                                        <option selected="">01</option>
                                                        <option>02</option>
                                                        <option>03</option>
                                                        <option>04</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search-btn">
                                        <button class="btn btn-orange">Search</button>
                                    </div><!-- end columns -->

                                </div><!-- end row -->
                            </form>
                        </div><!-- end tours -->

                        <div id="cruise" class="tab-pane">
                            <form>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>From</label>
                                                    <input type="text" class="form-control" placeholder="City, Country">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>To</label>
                                                    <input type="text" class="form-control" placeholder="City, Country">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>Check In</label>
                                                    <input type="text" class="form-control dpd1" placeholder="mm/dd/yy">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>Check Out</label>
                                                    <input type="text" class="form-control dpd2" placeholder="mm/dd/yy">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group right-icon">
                                            <label>Adults</label>
                                            <select class="form-control">
                                                <option selected="">01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                            </select>
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search-btn">
                                        <button class="btn btn-orange">Search</button>
                                    </div><!-- end columns -->

                                </div><!-- end row -->
                            </form>
                        </div><!-- end cruises -->

                        <div id="cars" class="tab-pane">
                            <form>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control" placeholder="Country">
                                                    <i class="fa fa-globe"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" placeholder="City">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group left-icon">
                                                    <label>Your Location</label>
                                                    <input type="text" class="form-control" placeholder="Location">
                                                    <i class="fa fa-street-view"></i>
                                                </div>
                                            </div><!-- end columns -->

                                        </div><!-- end row -->
                                    </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>Check In</label>
                                                    <input type="text" class="form-control dpd1" placeholder="mm/dd/yy">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>Check Out</label>
                                                    <input type="text" class="form-control dpd2" placeholder="mm/dd/yy">
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

                <div class="hidden-xs hidden-sm col-md-6 no-pd-l">
                    <div class="welcome-message">
                        <h2>Find Your Perfect Plan</h2>
                        <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper, imeam mnesarchum at, pro an eros perpetua ullamcorper.</p>
                        <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        <a href="#.net/themes/star-travel/hotel-homepage.html#" class="btn btn-w-border">Explore More</a>
                    </div>
                 </div>

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end search-tabs -->

</section><!-- end flexslider-container -->


<!--======================= BEST FEATURES ======================-->
<section id="best-features" class="banner-padding orange-features">
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


<!--=============== HOTEL OFFERS ===============-->
<section id="hotel-offers" class="section-padding" style="background:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url({{asset('/images/hotel-offers.jpg')}}) 50% 80%;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <div class="page-heading white-heading">
              <h2>Hotels Offers</h2>
              <hr class="heading-line">
          </div><!-- end page-heading -->
          <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-hotel-offers">
                  <div class="item">
                     <div class="main-block hotel-block">
                        <div class="main-img">
                           <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html">
                           <img src="images/hotel-1.jpg" class="img-responsive" alt="hotel-img">
                           </a>
                           <div class="main-mask">
                              <ul class="list-unstyled list-inline offer-price-1">
                                 <li class="price">$568.00<span class="divider">|</span><span class="pkg">Avg/Night</span></li>
                                 <li class="rating">
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star lightgrey"></i></span>
                                 </li>
                              </ul>
                           </div>
                           <!-- end main-mask -->
                        </div>
                        <!-- end offer-img -->
                        <div class="main-info hotel-info">
                           <div class="arrow">
                              <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html"><span><i class="fa fa-angle-right"></i></span></a>
                           </div>
                           <!-- end arrow -->
                           <div class="main-title hotel-title">
                              <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html">Herta Berlin Hotel</a>
                              <p>From: Scotland</p>
                           </div>
                           <!-- end hotel-title -->
                        </div>
                        <!-- end hotel-info -->
                     </div>
                     <!-- end hotel-block -->
                  </div>
                  <div class="item">
                     <div class="main-block hotel-block">
                        <div class="main-img">
                           <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html">
                           <img src="images/hotel-2.jpg" class="img-responsive" alt="hotel-img">
                           </a>
                           <div class="main-mask">
                              <ul class="list-unstyled list-inline offer-price-1">
                                 <li class="price">$568.00<span class="divider">|</span><span class="pkg">Avg/Night</span></li>
                                 <li class="rating">
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star lightgrey"></i></span>
                                 </li>
                              </ul>
                           </div>
                           <!-- end main-mask -->
                        </div>
                        <!-- end offer-img -->
                        <div class="main-info hotel-info">
                           <div class="arrow">
                              <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html"><span><i class="fa fa-angle-right"></i></span></a>
                           </div>
                           <!-- end arrow -->
                           <div class="main-title hotel-title">
                              <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html">Roosevelt Hotel</a>
                              <p>From: Germany</p>
                           </div>
                           <!-- end hotel-title -->
                        </div>
                        <!-- end hotel-info -->
                     </div>
                     <!-- end hotel-block -->
                  </div>
                  <div class="item">
                     <div class="main-block hotel-block">
                        <div class="main-img">
                           <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html">
                           <img src="images/hotel-3.jpg" class="img-responsive" alt="hotel-img">
                           </a>
                           <div class="main-mask">
                              <ul class="list-unstyled list-inline offer-price-1">
                                 <li class="price">$568.00<span class="divider">|</span><span class="pkg">Avg/Night</span></li>
                                 <li class="rating">
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star lightgrey"></i></span>
                                 </li>
                              </ul>
                           </div>
                           <!-- end main-mask -->
                        </div>
                        <!-- end offer-img -->
                        <div class="main-info hotel-info">
                           <div class="arrow">
                              <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html"><span><i class="fa fa-angle-right"></i></span></a>
                           </div>
                           <!-- end arrow -->
                           <div class="main-title hotel-title">
                              <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html">Hotel Fort De</a>
                              <p>From: Austria</p>
                           </div>
                           <!-- end hotel-title -->
                        </div>
                        <!-- end hotel-info -->
                     </div>
                     <!-- end hotel-block -->
                  </div>
                  <div class="item">
                               <div class="main-block hotel-block">
                                  <div class="main-img">
                                     <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html">
                                     <img src="images/hotel-4.jpg" class="img-responsive" alt="hotel-img">
                                     </a>
                                     <div class="main-mask">
                                        <ul class="list-unstyled list-inline offer-price-1">
                                           <li class="price">$568.00<span class="divider">|</span><span class="pkg">Avg/Night</span></li>
                                           <li class="rating">
                                              <span><i class="fa fa-star orange"></i></span>
                                              <span><i class="fa fa-star orange"></i></span>
                                              <span><i class="fa fa-star orange"></i></span>
                                              <span><i class="fa fa-star orange"></i></span>
                                              <span><i class="fa fa-star lightgrey"></i></span>
                                           </li>
                                        </ul>
                                     </div>
                                     <!-- end main-mask -->
                                  </div>
                                  <!-- end offer-img -->
                                  <div class="main-info hotel-info">
                                     <div class="arrow">
                                        <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html"><span><i class="fa fa-angle-right"></i></span></a>
                                     </div>
                                     <!-- end arrow -->
                                     <div class="main-title hotel-title">
                                        <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html">Roosevelt Hotel</a>
                                        <p>From: Germany</p>
                                     </div>
                                     <!-- end hotel-title -->
                                  </div>
                                  <!-- end hotel-info -->
                               </div>
                               <!-- end hotel-block -->
                            </div>
          </div>
          <!-- end owl-hotel-offers -->
          <div class="view-all text-center">
            <a href="#.net/themes/star-travel/hotel-grid-right-sidebar.html" class="btn btn-orange">View All</a>
          </div><!-- end view-all -->
      </div><!-- end columns -->
    </div><!-- end row -->
  </div><!-- end container -->
</section><!-- end hotel-offers -->


<!--=============== LUXURY ROOMS ===============-->
<section id="luxury-rooms" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-6 luxury-img luxury-room-imgs">
                <div class="row">
                  <div class="col-xs-6 col-sm-6 luxury-room-block">
                      <a href="./Hotel Homepage_files/luxury-room-1.jpg" title="image-7" class="with-caption gallery image-link">
                        <img class="img-responsive" src="images/luxury-room-1.jpg" alt="luxury-room-img">
                        </a>
                    </div>

                    <div class="col-xs-6 col-sm-6 luxury-room-block">
                      <a href="images/luxury-room-2.jpg" title="image-7" class="with-caption gallery image-link">
                        <img class="img-responsive" src="images/luxury-room-2.jpg" alt="luxury-room-img">
                        </a>
                    </div>

                    <div class="col-xs-6 col-sm-6 luxury-room-block">
                      <a href="images/luxury-room-3.jpg" title="image-7" class="with-caption gallery image-link">
                        <img class="img-responsive" src="images/luxury-room-3.jpg" alt="luxury-room-img">
                        </a>
                    </div>

                    <div class="col-xs-6 col-sm-6 luxury-room-block">
                      <a href="images/luxury-room-4.jpg" title="image-7" class="with-caption gallery image-link">
                        <img class="img-responsive" src="images/luxury-room-4.jpg" alt="luxury-room-img">
                        </a>
                    </div>
                </div>

            </div><!-- end columns -->

            <div class="col-sm-12 col-md-12 col-lg-6 luxury-text luxury-room-text">
              <h2>Luxurious Rooms</h2>
                <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri.</p>
                <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html" class="btn btn-black">From $99/Day</a>
                <a href="#.net/themes/star-travel/hotel-detail-right-sidebar.html" class="btn btn-o-border">View Details</a>
            </div><!-- end columns -->
        </div><!-- end row -->
  </div><!-- end container -->
</section><!-- end luxury-rooms -->


<!--=============== TESTIMONIALS ===============-->
<section id="testimonials" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
              <div class="page-heading white-heading">
                  <h2>Testimonials</h2>
                    <hr class="heading-line">
                </div><!-- end page-heading -->

                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <div class="carousel-inner text-center">

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

                        <div class="item active left">
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

                        <div class="item next left">
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
                        <li data-target="#quote-carousel" data-slide-to="0" class=""><img src="images/client-1.jpg" class="img-responsive" alt="client-img">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="1" class=""><img src="images/client-2.jpg" class="img-responsive" alt="client-img">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="2" class="active"><img src="images/client-3.jpg" class="img-responsive" alt="client-img">
                        </li>
                    </ol>

                </div><!-- end quote-carousel -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end testimonials -->


<!--============== HIGHLIGHTS =============-->
<section id="highlights" class="highlights-2">
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


<!--================ PACKAGES ==============-->
<section id="hotel-packages" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="page-heading">
                  <h2>Our Packages</h2>
                    <hr class="heading-line">
                </div><!-- end page-heading -->

                <div class="row" id="hotel-package-tables">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-offset-1 col-lg-10 col-lg-offset-1">

                      <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center no-pd-r">
                                <div class="package hotel-package">
                                    <div class="h-pkg-heading">
                                        <h2 class="h-pkg-title">Luxury Room</h2>
                                        <h2 class="h-pkg-price">$199<span>night</span></h2>
                                    </div><!-- end h-pkg-heading -->

                                    <div class="pkg-features">
                                        <ul class="list-unstyled text-center">
                                            <li>Breakfast</li>
                                            <li>Private Balcony</li>
                                            <li>Sea View</li>
                                            <li>Free Wifi</li>
                                            <li>Bathroom</li>
                                            <li>Water Heated pool</li>
                                        </ul>
                                    </div><!-- end features -->
                                    <button class="btn">Select Package</button>
                                </div><!-- end hotel-package -->
                            </div><!-- end columns -->

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center no-pd-r no-pd-l">
                                <div class="package hotel-package best-package">
                                    <div class="h-pkg-heading">
                                        <h2 class="h-pkg-title">Comfort Room</h2>
                                        <h2 class="h-pkg-price">$199<span>night</span></h2>
                                    </div><!-- end h-pkg-heading -->

                                    <div class="pkg-features">
                                        <ul class="list-unstyled text-center">
                                            <li>Breakfast</li>
                                            <li>Private Balcony</li>
                                            <li>Sea View</li>
                                            <li>Free Wifi</li>
                                            <li>Bathroom</li>
                                            <li>Water Heated pool</li>
                                        </ul>
                                    </div><!-- end features -->
                                    <button class="btn">Select Package</button>
                                </div><!-- end hotel-package -->
                            </div><!-- end columns -->

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center no-pd-l">
                                <div class="package hotel-package">
                                    <div class="h-pkg-heading">
                                        <h2 class="h-pkg-title">Deluxe Room</h2>
                                        <h2 class="h-pkg-price">$199<span>night</span></h2>
                                    </div><!-- end h-package-heading -->

                                    <div class="pkg-features">
                                        <ul class="list-unstyled text-center">
                                            <li>Breakfast</li>
                                            <li>Private Balcony</li>
                                            <li>Sea View</li>
                                            <li>Free Wifi</li>
                                            <li>Bathroom</li>
                                            <li>Water Heated pool</li>
                                        </ul>
                                    </div><!-- end features -->
                                    <button class="btn">Select Package</button>
                                </div><!-- end hotel-package -->
                            </div><!-- end columns -->

                        </div><!-- end row -->
                  </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hotel-packages -->


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
