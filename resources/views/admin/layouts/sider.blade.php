<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        @if($user->detail)
            <img src="{{asset('/storage/'.$user->detail->img)}}" class="img-circle" alt="User Image">
        @else
          <img src="{{asset('/storage/default-user.png')}}" class="img-circle" alt="User Image">
        @endif
      </div>
      <div class="pull-left info">
        <p>
          {{$user->name}}
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

        <li class="">
        <a href="{{route('home.page')}}">
          <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

      </li>
      @if(Auth::user())
        @if(Auth::user()->hasRole(['own']))
          <li class="">
            <a href="{{route('role.index')}}">
              <i class="fa fa-files-o"></i>
              <span>Role and Permission</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right">4</span>
              </span>
            </a>
          </li>

        @endif
        @if(Auth::user()->can('user'))
        <li class="treeview">
            <a href="">
              <i class="fa fa-user"></i>
              <span>Quản lý nhân viên</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right">4</span>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('staff.index')}}"><i class="fa fa-circle-o"></i> Danh sách nhân viên</a></li>
              @if(Auth::user()->can('delete-tour'))
              <li><a href="{{route('staff.trash')}}"><i class="fa fa-trash"></i> Thùng rác</a></li>
              @endif
            </ul>
          </li>
        @endif
        @if(Auth::user()->can('tour')|| Auth::user()->hasRole('own') || Auth::user()->hasRole('tour') )
        <li class="treeview">
          <a href="">
            <i class="fa fa-train"></i>
            <span>Quản lý tour</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{route('tour.index')}}"><i class="fa fa-circle-o"></i> Danh sách Tour</a></li>

            @if(Auth::user()->can('create-tour'))
            <li><a href="{{route('tour.create')}}"><i class="fa fa-circle-o"></i> Tour Mới</a></li>
            <li><a href="{{route('tour.trash')}}"><i class="fa fa-trash"></i> Thùng rác</a></li>
            @endif
          </ul>
        </li>
        @endif

        @if(Auth::user()->can('car')|| Auth::user()->hasRole('own') || Auth::user()->hasRole('car') )
        <li class="treeview">

          <a href="">
            <i class="fa fa-car"></i>
            <span>Quản lý Car</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('car.index')}}"><i class="fa fa-circle-o"></i> Danh sách Car</a></li>
            @if(Auth::user()->can('create-car'))
            <li><a href="{{route('car.create')}}"><i class="fa fa-circle-o"></i> Car Mới</a></li>
            <li><a href="{{route('car.trash')}}"><i class="fa fa-trash"></i> Thùng rác</a></li>
            @endif

          </ul>
        </li>
        @endif

        @if(Auth::user()->can('hotel')|| Auth::user()->hasRole('own') || Auth::user()->hasRole('hotel') )
        <li class="treeview">
          <a href="#">
            <i class="fa fa-hotel"></i> <span>Quản lý khách sạn</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{route('hotel.index')}}"><i class="fa fa-circle-o"></i> Danh sách Hotel</a></li>

            @if(Auth::user()->can('create-hotel'))
            <li><a href="{{route('hotel.create')}}"><i class="fa fa-circle-o"></i> Hotel Mới</a></li>
            <li><a href="{{route('hotel.trash')}}"><i class="fa fa-trash"></i> Thùng rác</a></li>
            @endif
          </ul>
        </li>
        @endif

        @if(Auth::user()->can('customer')|| Auth::user()->hasRole('own') || Auth::user()->hasRole('customer') )
        <li class="treeview">
          <a href="">
            <i class="fa fa-users"></i> <span>Quản lý khách hàng</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('customer')}}"><i class="fa fa-circle-o"></i> Danh sách khách hàng</a></li>
            <li><a href="{{route('customer.trash')}}"><i class="fa fa-trash"></i> Thùng rác</a></li>

          </ul>

        </li>
        @endif
        @if(Auth::user()->can('bill')|| Auth::user()->hasRole('accountant'))
        <li class="treeview">

          <a href="{{url('customer')}}">
            <i class="fa fa-table"></i> <span>Quản lý hóa đơn</span>
          </a>

          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Thống kê hóa đơn</a></li>
            <li><a href="{{route('bill.new')}}"><i class="fa fa-file"></i> Hóa đơn cần duyệt</a></li>
            <li><a href="{{route('bill.checked')}}"><i class="fa fa-file"></i> Hóa đơn  duyệt</a></li>
          </ul>
        </li>
        @endif
      @endif


      @if(Auth::guard('customer')->user())
        <li class="">
          <a href="{{route('bill.customer')}}">
            <i class="fa fa-file"></i>
            <span>Hóa Đơn</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

        </li>
        <li class="">
          <a href="{{route('cart.index')}}">
            <i class="fa fa-cart-plus"></i>
            <span>Giỏ hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>

        @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
