@extends('admin.layout')
@section('content')
<section class="content-header">
      <h1>
        Danh sách khách hàng
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý</a></li>
        <li><a href="#">Quản lý khách hàng </a></li>
        <li class="active">Bảng khách hàng</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="row">
            <div class="col-xs-12">
              <div class="box-header">
                <h3>Danh sách tài khoản bị ban</h3>
              </div>
              <div class="box">
                <div class="box-body" id="content">
                  <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                      <th>Tên khách hàng</th>
                      <th>Tài khoản email</th>
                      <th>Thời gian tạo</th>
                      <th>Thời gian cập nhật</th>
                      <th>Kích hoạt</th>
                    </tr>
                    </thead>
                    <tbody class="listban">
                      @foreach($listBan as $customer)
                      <a href="{{url('customer')}}/{{$customer->id}}">
                        <tr id="ban{{$customer->id}}">
                          <td>{{$customer->name}}</td>
                          <td>{{$customer->email}}</td>
                          <td>{{$customer->created_at}}</td>
                          <td>{{$customer->updated_at}}</td>
                          <td>
                            <input type="text" class="hidden" name="customer-id" value="{{$customer->id}}">
                            <button class="active btn btn-warning">
                              <i class="fa fa-repeat"></i>
                            </button>
                        </tr>
                        </a>
                      @endforeach
                    </tbody>

                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

@endsection
@section('script')
  <script type="text/javascript">
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

      $('.listban').delegate('.active','click',function(){
        var $id = $(this).prev('input[name=customer-id]').val();

          $.ajax({
            url:"{{url('customer')}}/" + $id + '?status=1',
            type:'DELETE',
            data:{
              '_token':$("input[name=_token]").val(),
            },
            success:function($data)
            {
              if(($data.errors))
              {
                  toastr.warning('Thao tác không thành công ! Xin kiểm tra lại tài khoản');
              }
              else
              {
                $('.listban').children('#ban'+$data.id).html('');
                toastr.success('Tài khoản xóa thành công ');
              }
            }

          });



        });

  </script>
@endsection
