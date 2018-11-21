<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('css/admin.jpeg')}}" class="img-circle" alt="User Image">
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
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li>
      <li class="">
        <a href="{{route('staff.index')}}">
          <i class="fa fa-files-o"></i>
          <span>Quản lý nhân viên</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">4</span>
          </span>
        </a>
      </li>

      <li class="treeview">
        <a href="">
          <i class="fa fa-laptop"></i>
          <span>Quản lý tour</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('tour.index')}}"><i class="fa fa-circle-o"></i> Danh sách Tour</a></li>
          <li><a href="{{route('tour.create')}}"><i class="fa fa-circle-o"></i> Tour Mới</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Quản lý khách sạn</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

      </li>
      <li class="">
        <a href="{{url('customer')}}">
          <i class="fa fa-table"></i> <span>Quản lý khách hàng</span>
        </a>

      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
