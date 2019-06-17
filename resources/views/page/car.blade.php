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

<div class="colorlib-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="wrap-division">
						<div class="col-md-12 col-md-offset-0 heading2 animate-box fadeInUp animated-fast">
							<h2>Danh sách các các xe</h2>
						</div>
						@if(isset($alert))
						<div class="panel-header clearfix">
							<h3>{{$alert}} </h3>
						</div>
					@endif
					</div>
				</div>
				<div class="row">
					<div class="wrap-division">

						@foreach($list as $object)
							<div class="col-md-6 col-sm-6 animate-box box">
							<div class="hotel-entry">
								<a href="{{route('car.show',['id' => $object->id])}}" class="hotel-img" style="background-image: url({{asset('storage/'.$object->img)}});">
									<p class="price"><span>{{number_format($object->unit_price)}}</span><small> /km</small></p>
								</a>
								<div class="desc">
									<p>{{$object->getType->name}}</p>
									<h3><a href="{{route('car.show',['id' => $object->id])}}">{{$object->name}}</a></h3>
									<p >Số ghế : {{$object->seat}}</p>
									<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									<a class="cart" href="{{'product='.$object->id.'&&type=car'}}" >
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
