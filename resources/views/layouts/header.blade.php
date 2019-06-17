<nav class="colorlib-nav" role="navigation">
  <div class="top-menu">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-2">
          <div id="colorlib-logo"><a href="{{route('home.page')}}">Get Tour</a></div>
        </div>
        <div class="col-xs-10 text-right menu-1">
          <ul>
            <li class="@if(!isset($_GET['web'])) active @endif"><a href="{{route('home.page')}}">Trang Chủ</a></li>
            <li class="has-dropdown @if(isset($_GET['web'])) @if($_GET['web'] == 'tour') active @endif @endif">
              <a href="{{route('tour.page',['web'=>'tour'])}}">Tours </a>

            </li>
            <li class="has-dropdown @if(isset($_GET['web'])) @if($_GET['web'] == 'hotel') active @endif @endif">
              <a href="{{route('hotel.page',['web'=>'hotel'])}}">Khách sạn</a>

            </li>
            <li class="@if(isset($_GET['web'])) @if($_GET['web'] == 'car') active @endif @endif"><a href="{{route('car.page',['web'=>'car'])}}">Thuê xe</a></li>
{{--            <li class="@if(isset($_GET['web'])) @if($_GET['web'] == 'contact') active @endif @endif"><a href="{{route('contact.page',['web'=>'contact'])}}">Liên hệ</a></li>--}}
            <li class=""><a href="{{route('cart.index')}}" id="cart"><i class="fa fa-cart"></i>Giỏ hàng</a></li>
            @if(Auth::guard('web')->check())
            <li>  <a href="{{route('customer.show',['id'=>Auth::guard('web')->user()->id])}}">{{Auth::guard('web')->user()->name}}</a></li>
              @else
              <li>  <a href="{{route('customer.login')}}">Đăng nhập</a></li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
