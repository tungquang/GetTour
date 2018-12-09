@extends('admin.layout')
@section('content')
  <section class="content-header">
      <h1>
        Danh sách nhân viên
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


          <div class="box">
            <div class="box-header">
                <h4>Danh sách các tài khoản bị vô hiệu hóa</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="content">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Tên khách hàng</th>
                  <th>Tài khoản email</th>
                  <th>Cập nhật</th>
                  <th>Kích hoạt</th>
                </tr>
                </thead>
                <tbody class="list">
                  @foreach($list as $staff)

                      <tr class="staff" id={{$staff->id}}>
                        <td>{{$staff->name}}</td>
                        <td>{{$staff->email}}</td>
                        <td>{{$staff->updated_at}}</td>
                        <td>
                          <input type="text" class="hidden" name="staff-id" value="{{$staff->id}}">
                          @if($user->can('delete-user'))
                          <button type="button" class="repeat btn btn-warning">
                            <i class="fa fa-repeat"></i>
                          </button>
                          @endif
                        </td>
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

  </script>

  <script type="text/javascript">
    $('.repeat').click(function(){

      var $id = $(this).prev('input').val();
        $.ajax({
          url:"{{url('staff')}}/" + $id + '?status=1',
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

              $('.list').children('#'+ $data).html('');
              toastr.success('Tài khoản xóa thành công ');
            }
          }

        });

      });


  </script>


@endsection
