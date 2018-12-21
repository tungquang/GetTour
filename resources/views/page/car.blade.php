@extends('layout')
@section('content')

<aside id="colorlib-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url({{asset('storage/background_car.jpeg')}});">
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
			<div class="col-md-9">
				<div class="row">
					<div class="wrap-division">
						@foreach($list as $object)
							<div class="col-md-6 col-sm-6 animate-box">
							<div class="hotel-entry">
								<a href="hotel-room.html" class="hotel-img" style="background-image: url({{asset('storage/'.$object->img)}});">
									<p class="price"><span>{{number_format($object->unit_price)}}</span><small> /km</small></p>
								</a>
								<div class="desc">
									<p class="star"><span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> 545 Reviews</p>
									<h3><a href="hotel-room.html">{{$object->name}}</a></h3>
									<span class="place">Số ghế : {{$object->soghe}}</span>
									<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									<a class="cart" href="{{'product='.$object->id.'&&type=car'.'&&customer=1'}}" >
										<button type="button" name="button" class="btn btn-primary">Đặt xe</button>
									</a>
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
						<h3 class="sidebar-heading">Tìm kiếm xe</h3>
						<form method="post" class="colorlib-form">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="id_type">Loại xe</label>
													<div class="form-field">
														<i class="icon icon-arrow-down3"></i>
														<select name="id_type" id="id_type" class="form-control">
															<option value="#">1</option>
															<option value="#">2</option>
															<option value="#">3</option>
															<option value="#">4</option>
															<option value="#">5+</option>
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
														<select name="price" id="price" class="form-control">
															<option value="#">1</option>
															<option value="#">2</option>
															<option value="#">3</option>
															<option value="#">4</option>
															<option value="#">5+</option>
														</select>
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
