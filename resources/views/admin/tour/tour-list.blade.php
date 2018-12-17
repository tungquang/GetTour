@extends('admin.layout')
@section('content')

<section class="content-header">
  
    <h1>
      Quản lý tour

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý </a></li>
      <li><a href="#">Quản lý tour</a></li>
      <li class="active">Danh sách các Tour</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="">
        <div class="box">
          <!-- /.box-header -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách các tour </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Ảnh</th>
                  <th>Tour</th>
                  <th>Kiểu</th>
                  <th>Tỉnh</th>
                  <th>Địa điểm</th>
                  <th>Thời gian đi</th>
                  <th>Thời gian về </th>
                  <th>Số ngày</th>
                  <th>Số ghế</th>
                  <th>Số ghế đã đặt</th>
                  <th>Giá thành</th>
                  <th>Sales</th>
                  <th>Hoạt động</th>
                </tr>
                </thead>
                <tbody class="list">
                  @foreach($list as $tour)
                    <tr id="{{$tour->id}}" class="tour">
                      <td>
                        <img height="50px" width="50px" src="{{Storage::disk('local')->url('public/'.$tour->img)}}"/>
                      </td>
                      <td>{{$tour->name}}</td>
                      <td>{{$tour->getType['name']}}</td>
                      <td>{{$tour->getProvince['name']}}</td>
                      <td>{{$tour->place}}</td>
                      <td>{{$tour->time_in}}</td>
                      <td>{{$tour->time_out}}</td>
                      <td>{{$tour->day}}</td>
                      <td>{{$tour->seat}}</td>
                      <td>{{$tour->number_seated}}</td>
                      <td>{{$tour->unit_price}}</td>
                      <td>{{$tour->promotion_price}}</td>
                      <td><button class="delete btn btn-danger">Xóa</button></td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Ảnh</th>
                    <th>Tour</th>
                    <th>Kiểu</th>
                    <th>Tỉnh</th>
                    <th>Địa điểm</th>
                    <th>Thời gian đi</th>
                    <th>Thời gian về </th>
                    <th>Số ngày</th>
                    <th>Số ghế</th>
                    <th>Số ghế đã đặt</th>
                    <th>Giá thành</th>
                    <th>Sales</th>
                    <th>Hoạt động</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box-body -->

        </div>
        <!-- /.box -->


        <!-- /.box -->
      </div>
      <!-- /.col -->

      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
@endsection
@section('script')

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });
$('.delete').click(function(){
  $id= $(this).parent().parent().attr('id');

  $.ajax({
    type:'DELETE',
    url :"{{url('/tour')}}/"+$id + '?status=0',
    data:{
      '_token':$('meta[name="csrf-token"]').attr('content'),
    },
    success:function($data)
    {
      if(($data.errors))
      {
          toastr.warning('Thao tác không thành công ! Xin kiểm tra lại Tour');
      }
      else
      {
        $('#'+$data).remove('');
        toastr.success('Tour đã được xóa');
      }
    }
  });
});
$('.tour').dblclick(function(){
  $id = $(this).attr('id');
  $url = "{{url('/tour')}}"+'/'+$id+'/edit';
  window.location.replace($url);
});

</script>
@endsection
