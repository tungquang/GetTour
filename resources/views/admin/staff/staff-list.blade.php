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
              <button class="btn btn-primay" data-toggle="modal" data-target="#form-insert">Thêm thông tin khách hàng</button>

            <div class="modal fade" id="form-insert" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                      <p>
                        <form class="" action="index.html" method="post">
                          @csrf
                        </form>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="content">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Tên khách hàng</th>
                  <th>Tài khoản email</th>
                  <th>Nhóm quyền</th>
                  <th>Danh sách các nhóm quyền</th>
                  <th>Cập nhật</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody class="list">
                  @foreach($list as $staff)

                      <tr class="staff" id={{$staff->id}}>
                        <td>{{$staff->name}}</td>
                        <td>{{$staff->email}}</td>
                        <td>
                          @if($staff->role)
                            {{$staff->role->roleName->display_name}}
                          @endif
                        </td>
                        <td>
                          <div class="form-group">
                            <select class="form-control" name="" id="role-in-{{$staff->id}}">
                              @foreach($role as $ro)
                                <option value="{{$ro->id}}">{{$ro->display_name}}</option>
                              @endforeach
                                <option value="20">Test</option>
                            </select>
                          </div>
                        </td>
                        <td>{{$staff->updated_at}}</td>
                        <td>
                          @if($user->hasRole('own'))
                            <button class="btn btn-danger" data-toggle="modal" data-target="#form-delete-{{$staff->id}}">Xóa</button>

                          <a href="{{route('user.attach.role',$staff->id)}}" name="update">
                            <button type="button" class="btn btn-warning">
                              <i class="fa fa-repeat"></i>
                              </button>
                          </a>
                          @endif
                          <input type="text" class="hidden" name="staff-id" value="{{$staff->id}}">
                          <div class="modal fade" id="form-delete-{{$staff->id}}" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                  </div>
                                  <div class="modal-body">
                                    <h3>Bạn muốn xóa tài khoản {{$staff->email}} ?</h3>
                                  </div>
                                  <div class="modal-footer">
                                    <input type="text" class="hidden" name="staff-id" value="{{$staff->id}}">
                                    <button type="button" class="delete btn btn-primary" data-dismiss="modal">Đồng ý</button>
                                  </div>
                                </div>

                              </div>
                            </div>
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
    $('.staff').dblclick(function(){
      var $id = $(this).attr('id');
      if ($id) {
        window.location.replace("{{url('staff')}}/"+$id);
      }
      else{
        alert('Không ton tai tai khoan hoac id khong dung');
      }

    });

  </script>
  @if($user->hasRole('own'))
    <script type="text/javascript">
    $('.list').delegate('.delete','click',function(){
      var $id = $(this).parent().children('input').val();


        $.ajax({
          url:"{{url('staff')}}/" + $id,
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
      $('.list').delegate('a[name=update]','click',function(event){
        event.preventDefault();
        $user   = $(this).parent().children('input').val();
        $url    = $(this).attr('href');
        $rolIn  = $('#role-in-'+$user).val();
        $.ajax({
          url:$url,
          type:'post',
          data:{
            '_method':'put',
            '_token' : $('input[name=_token]').val(),
            'roleIn' : $rolIn,
          },
          success:function($data)
          {
              console.log($data);
            if(!$data)
            {
              toastr.warning('Thao tác không thành công !');
            }
            else {
              console.log($data);
              $('.list').html('');
              $('.list').append($data);
              toastr.success('Thao tác thành công !');
            }
          }
        });
      });

    </script>
  @endif

@endsection
