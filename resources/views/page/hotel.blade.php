@extends('layout')
@section('content')

<aside id="colorlib-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url({{asset('storage/cover-img-4.jpg')}});">
				<div class="overlay"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
							<div class="slider-text-inner text-center">
								<h2>by colorlib.com</h2>
								<h1>Tìm kiếm</h1>
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
			<div class="col-md-9" >
				<div class="row">
					<div class="wrap-division">
							<div class="col-md-12 col-md-offset-0 heading2 animate-box fadeInUp animated-fast">
								<h2>Danh sách các khách sạn</h2>
							</div>
							@if(isset($alert))
							<div class="panel-header clearfix">
								<h3>{{$alert}} </h3>
							</div>
						@endif
					</div>
				</div>
				<div class="row" >
					<div class="wrap-division" id="list-hotel">
						@foreach($list as $ho)
							<div class="col-md-6 col-sm-6 animate-box box" id="hotel-{{$ho->id}}">
								<div class="hotel-entry">
									<a href="{{route('hotel.show',['hotel'=>$ho->id])}}" class="hotel-img" style="background-image: url({{asset('storage/'.$ho->img)}});">
										<p class="price"><span>{{number_format($ho->unit_price)}} VNĐ</span><small> /night</small></p>
									</a>
									<div class="desc">
										<p class="star"><span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> 545 Reviews</p>
										<h3><a href="hotel-room.html">{{$ho->name}}</a></h3>
										<span class="place">{{$ho->getProvince->name}}</span>
										<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
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


<div id="colorlib-subscribe" style="background-image: url({{asset('/storage/img_bg_2.jpg')}})" data-stellar-background-ratio="0.5">
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

@endsection
