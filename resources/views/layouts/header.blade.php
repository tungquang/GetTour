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
              <ul class="dropdown">
                <li><a href="#">Phổ biến</a></li>
                <li><a href="#">Tour đi biển</a></li>
                <li><a href="#">Tour khám phá</a></li>
                <li><a href="#">Tour trang mật</a></li>
              </ul>
            </li>
            <li class="has-dropdown @if(isset($_GET['web'])) @if($_GET['web'] == 'hotel') active @endif @endif">
              <a href="{{route('hotel.page',['web'=>'hotel'])}}">Khách sạn</a>
              <ul class="dropdown">
                <li><a href="#">Nổi bật</a></li>
              </ul>
            </li>
            <li class="@if(isset($_GET['web'])) @if($_GET['web'] == 'car') active @endif @endif"><a href="{{route('car.page',['web'=>'car'])}}">Di chuyển</a></li>
            <li class="@if(isset($_GET['web'])) @if($_GET['web'] == 'service') active @endif @endif"><a href="{{route('service.page',['web'=>'service'])}}">Dịch vụ</a></li>
            <li class="@if(isset($_GET['web'])) @if($_GET['web'] == 'blog') active @endif @endif"><a href="{{route('blog.page',['web'=>'blog'])}}">Blog</a></li>
            <li class="@if(isset($_GET['web'])) @if($_GET['web'] == 'contact') active @endif @endif"><a href="{{route('contact.page',['web'=>'contact'])}}">Liên hệ</a></li>
            <li class=""><a href="{{route('cart.index')}}"><i class="fa fa-cart"></i>Giỏ hàng</a></li>
            <li>  <a href="{{route('customer.login')}}">Đăng nhập</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
