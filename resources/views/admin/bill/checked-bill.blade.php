@extends('admin.layout')
@section('content')
<section class="content-header">
    <h1>
      Hoá đơn duyệt
      <p><small>Quản lý các hóa đơn qua duyệt</small></p>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý</a></li>
      <li><a href="#">Quản lý hóa đơn</a></li>
      <li class="active">Hóa đơn duyệt</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
     <!-- role table  -->
      <div class="col-xs-12">


        <div class="box">
          <div class="box-header">

          </div>
          <!-- /.box-header -->
          <div class="box-body" id="content">
            <table id="role-table" class="table table-bordered table-striped table-hover">
              <thead>
              <tr>
                <th>Khách hàng</th>
                <th>Giá trị đơn hàng</th>
                <th>Phương thức thanh toán</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody class="list-role">
                  @foreach($list as $bill)
                    <tr>
                      <td>{{$bill->customer->name}}</td>
                      <td>{{$bill->total}}</td>
                      <td>{{$bill->pay}}</td>
                      <td><button type="button" name="button" class="btn btn-primary">Check</button>  </td>
                    </tr>
                  @endforeach
              </tbody>
              <tfoot>

              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- end role -->

    </div>

  </section>
@endsection
