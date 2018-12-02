@extends('admin.layout')
@section('content')
<section class="content-header">

    <h1>
      Quản lý hotel
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý </a></li>
      <li><a href="#">Quản lý khách sạn</a></li>
      <li class="active">Danh sách các khách sạn</li>
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
              <h3 class="box-title">Danh sách các khách sạn</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Ảnh</th>
                  <th>Khách sạn</th>
                  <th>Kiểu</th>
                  <th>Tỉnh</th>
                  <th>Room</th>
                  <th>Book</th>
                  <th>Giá thành</th>
                  <th>Sales</th>
                  <th>Hoạt động</th>
                </tr>
                </thead>
                <tbody class="list">
                  @foreach($list as $hotel)
                    <tr id="{{$hotel->id}}" class="hotel">
                      <td>
                        <img height="50px" width="50px" src="{{Storage::disk('local')->url('public/'.$hotel->img)}}"/>
                      </td>
                      <td>{{$hotel->name}}</td>
                      <td>{{$hotel->getStar->name}}</td>
                      <td>{{$hotel->getProvince->name}}</td>
                      <td>{{$hotel->room}}</td>
                      <td>{{$hotel->book}}</td>
                      <td>{{$hotel->unit_price}}</td>
                      <td>{{$hotel->promotion_price}}</td>
                      <td><button class="delete btn btn-danger">Xóa</button></td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Ảnh</th>
                    <th>Khách sạn</th>
                    <th>Kiểu</th>
                    <th>Tỉnh</th>
                    <th>Room</th>
                    <th>Book</th>
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
    url :"{{url('/hotel')}}/"+$id,
    data:{
      '_token':$('meta[name="csrf-token"]').attr('content'),
    },
    success:function($data)
    {
      if(($data.errors))
      {
          toastr.warning('Thao tác không thành công ! Xin kiểm tra lại hotel');
      }
      else
      {
        $('#'+$data).remove('');
        toastr.success('hotel đã được xóa');
      }
    }
  });
});
$('.hotel').dblclick(function(){
  $id = $(this).attr('id');
  $url = "{{url('/hotel')}}"+'/'+$id;
  window.location.replace($url);
});

</script>
@endsection
