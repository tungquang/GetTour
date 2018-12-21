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
