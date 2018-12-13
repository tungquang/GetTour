@extends('admin.layout')
@section('content')
<section class="content-header">

    <h1>
      Quản lý Car
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý </a></li>
      <li><a href="#">Quản lý Car</a></li>
      <li class="active">Danh sách các Car</li>
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
              <h3 class="box-title">Danh sách các Car </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Ảnh</th>
                  <th>Car</th>
                  <th>Giá thành</th>
                  <th>Số ghế</th>
                  <th>Ghế đặt</th>
                  <th>Unit</th>
                  <th>Chú ý</th>
                  <th>Hoạt động</th>
                </tr>
                </thead>
                <tbody class="list">
                  @foreach($list as $car)
                    <tr id="{{$car->id}}" class="car">
                      <td>
                        <img height="50px" width="50px" src="{{Storage::disk('local')->url('public/'.$car->img)}}"/>
                      </td>
                      <td>{{$car->name}}</td>
                      <td>{{$car->unit_price}}</td>
                      <td>{{$car->soghe}}</td>
                      <td>{{$car->book}}</td>
                      <td>{{$car->unit}}</td>
                      <td>{{$car->note}}</td>
                      <td>
                        <input type="text" class="hidden" name="car-id" value="{{$car->id}}">
                        @if($user->can('delete-car'))
                        <button type="button" class="repeat btn btn-warning">
                          <i class="fa fa-repeat"></i>
                        </button>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>

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


$('.repeat').click(function(){
  $id= $(this).prev().val();

  $.ajax({
    type:'DELETE',
    url :"{{url('/car')}}/"+$id + '?status=1',
    data:{
      '_token':$('meta[name="csrf-token"]').attr('content'),
    },
    success:function($data)
    {
      if(($data.errors))
      {
          toastr.warning('Thao tác không thành công ! Xin kiểm tra lại car');
      }
      else
      {
        $('#'+$data).remove('');

        toastr.success('car đã được xóa');
      }
    }
  });
});

</script>
@endsection
