@extends('admin.layout')
@section('content')
  <section class="content-header">
      <h1>
        Quản lý Role
        <p><small>Quản lý quyền hạn của nhân viên ! Đảm bảo các thao tác không vượt quá quyền</small></p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý</a></li>
        <li><a href="#">Role and Permission</a></li>
        <li class="active">Quản lý Role</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <!-- role table  -->
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <button class="btn btn-success" data-toggle="modal" data-target="#form-role"> + Role</button>

              <div class="modal fade" id="form-role" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm nhóm Quyền</h4>
                      </div>
                      <div class="modal-body">
                        <p>
                          <form class="" action="{{route('role.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="name">Nhóm</label>
                              <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" requrie>
                              @if($errors->has('name'))
                                <span>{{$errors->first('name')}}</span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="display_name">Hiển thị</label>
                              <input type="text" name="display_name" id="display_name" value="{{old('display_name')}}" class="form-control" requrie>
                              @if($errors->has('display_name'))
                                <span>{{$errors->first('display_name')}}</span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="description">Miêu tả</label>
                              <input type="text" name="description" id="description" value="{{old('description')}}" class="form-control" requrie>

                            </div>
                            <button type="submit" name="button" class="btn btn-success">Tạo mới</button>
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
              <table id="role-table" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Nhóm</th>
                  <th>Mô tả tên</th>
                  <th>Danh sách các quyền tồn tại</th>
                  <th>Miêu tả</th>
                  <th>Thời gian cập nhật</th>
                  <th>Tước quyền</th>
                  <th>Quyền mới</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody class="list-role">
                  @foreach($role as $ro)

                    <tr>
                      <td>{{$ro->name}}</td>
                      <td>{{$ro->display_name}}</td>
                      <th>
                        @foreach($ro->permission as $per)
                          <span>{{$per->name}} ,</span>
                        @endforeach
                      </th>
                      <td>{{$ro->description}}</td>
                      <td>{{$ro->updated_at}}</td>
                      <td>
                        <div class="form-group">
                          <select class="form-control" id="permission-out-{{$ro->id}}">
                              <option value="">Default</option>
                            @foreach($ro->permission as $per)
                              <option value="{{$per->id}}">{{$per->display_name}}</option>
                            @endforeach
                          </select>
                        </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <select class="form-control" id="permission-in-{{$ro->id}}">
                            <option value="">Default</option>
                          @foreach($permission as $per)
                            <option value="{{$per->id}}">{{$per->display_name}}</option>
                          @endforeach

                        </select>
                      </div>
                    </td>
                    <td>
                        <input type="text" name="role" value="{{$ro->id}}" class="hidden">
                        <a href="{{route('role.destroy',$ro->id)}}" name="delete">
                          <button type="button" class="btn btn-danger">
                              <i class="fa fa-trash"></i>

                          </button>
                        </a>
                        <a href="{{route('role.attach',$ro->id)}}" name="update">
                          <button type="button" class="btn btn-warning">
                            <i class="fa fa-repeat"></i>
                            </button>
                        </a>


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
        <!-- end role -->

      </div>
      <div class="row">
        <!-- permission table -->
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <button class="btn btn-success" data-toggle="modal" data-target="#form-permission"> + Permission</button>

              <div class="modal fade" id="form-permission" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Form thêm Permission</h4>
                      </div>
                      <div class="modal-body">
                        <p>
                          <form action="{{route('permission.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                              <label for="name">Quyền</label>
                              <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" requrie>
                              @if($errors->has('name'))
                                <span>{{$errors->first('name')}}</span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="display_name">Hiển thị</label>
                              <input type="text" name="display_name" id="display_name" value="{{old('display_name')}}" class="form-control" requrie>
                              @if($errors->has('display_name'))
                                <span>{{$errors->first('display_name')}}</span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="description">Miêu tả</label>
                              <input type="text" name="description" id="description" value="{{old('description')}}" class="form-control" requrie>

                            </div>
                            <button type="submit" name="button" class="btn btn-success">Tạo mới</button>
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
              <table id="permission" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Quyền</th>
                  <th>Tên</th>
                  <th>Miêu tả</th>
                  <th>Thời gian cập nhật</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody class="list-permission">
                  @foreach($permission as $per)
                  <tr data-toggle="modal" data-target="{{'#permission'.$per->id}}">
                    <td>{{$per->name}}</td>
                    <td>{{$per->display_name}}</td>
                    <td>{{$per->description}}</td>
                    <td>{{$per->updated_at}}</td>
                    <td>Loại</td>
                  </tr>
                  <div class="modal fade" id="{{'permission'.$per->id}}" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{$per->display_name}}</h4>
                          </div>
                          <div class="modal-body">
                            <p>
                              <form action="{{route('permission.update',$per->id)}}" method="post">

                                @csrf
                                @method('patch')
                                <div class="form-group">
                                  <label for="name">Quyền</label>
                                  <input type="text" name="name" id="name" value="{{$per->name}}" class="form-control" requrie>
                                  @if($errors->has('name'))
                                    <span>{{$errors->first('name')}}</span>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <label for="display_name">Hiển thị</label>
                                  <input type="text" name="display_name" id="display_name" value="{{$per->display_name}}" class="form-control" requrie>
                                  @if($errors->has('display_name'))
                                    <span>{{$errors->first('display_name')}}</span>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <label for="description">Miêu tả</label>
                                  <input type="text" name="description" id="description" value="{{$per->description}}" class="form-control" requrie>

                                </div>
                                <button type="submit" name="button" class="btn btn-primary">Cập nhật</button>
                              </form>
                            </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                  </div>
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
        <!-- end permission -->
      </div>
      <!-- /.row -->
    </section>

@endsection
@section('script')
  <script type="text/javascript">
    $('.list-role').delegate('a[name=update]','click',function(event){
      event.preventDefault();
      $rol   = $(this).parent().children('input').val();
      $url   = $(this).attr('href');
      $perIn = $('#permission-in-'+$rol).val();
      $perOut = $('#permission-out-'+$rol).val();

      $.ajax({
        url:$url,
        type:'post',
        data:{
          '_method':'put',
          '_token' : $('input[name=_token]').val(),
          'permissionIn' : $perIn,
          'permissionOut' : $perOut,
        },
        success:function($data)
        {
          console.log($data);
          if(!$data)
          {
            toastr.warning('Thao tác không thành công !');
          }
          else {
            $('.list-role').html('');
            $('.list-role').append($data);
            toastr.success('Thao tác thành công !');
          }
        }
      });
    });

    $('.list-role').delegate('a[name=delete]','click',function(event){
      event.preventDefault();
      $rol   = $(this).parent().children('input').val();
      $url   = $(this).attr('href');

      $.ajax({
        url:$url,
        type:'post',
        data:{
          '_method':'delete',
          '_token' : $('input[name=_token]').val(),
        },
        success:function($data)
        {

          if(!$data)
          {
            toastr.warning('Thao tác không thành công !');
          }
          else {
            $('.list-role').html('');
            $('.list-role').append($data);
            toastr.success('Thao tác thành công !');
          }
        }
      });
    });
  </script>
@endsection
