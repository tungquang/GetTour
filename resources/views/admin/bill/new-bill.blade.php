@extends('admin.layout')
@section('content')
<section class="content-header">
    <h1>
      Hoá đơn mới
      <p><small>Quản lý các hóa đơn chưa qua duyệt</small></p>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý</a></li>
      <li><a href="#">Quản lý hóa đơn</a></li>
      <li class="active">Hóa đơn mới</li>
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
                <th>Thời gian tạo</th>
              </tr>
              </thead>
              <tbody class="list-role">
                  @foreach($list as $bill)
                    <tr id="bill-{{$bill->id}}" class="bill">
                      <td>{{$bill->customer->name}}</td>
                      <td>{{number_format($bill->total)}}</td>
                      <td>{{$bill->getPayment->name}}</td>
                      <th>{{$bill->created_at}}</th>

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
@section('script')
  <script type="text/javascript">
    $('.bill').dblclick(function(){
      var $id = $(this).attr('id').split('-')[1];
      var $url = "{{url('bill/detail')}}/" + $id;
      window.location.replace($url);
    });
  </script>
@endsection
