@extends('admin.layout')
@section('content')
  <section class="content-header">
      <h1>
        Quản lý Topic
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý</a></li>
        <li><a href="#">Topic</a></li>
        <li class="active">Danh sách</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- home topic  -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <button class="btn btn-success" data-toggle="modal" data-target="#form-topic"> Thêm</button>
              <div class="modal fade" id="form-topic" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Topic</h4>
                      </div>
                      <div class="modal-body">
                        <p>
                          <form action="{{route('topic.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="photo">Ảnh</label>
                              <input type="file" name="photo"  class="form-control" requrie>
                              @if($errors->has('img'))
                                <span>{{$errors->first('img')}}</span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="content">Nội dung Topic</label>
                              <input type="text" name="content"  value="{{old('display_name')}}" class="form-control" requrie>
                              @if($errors->has('content'))
                                <span>{{$errors->first('content')}}</span>
                              @endif
                            </div>
                            <div class="form-group" >
                              <select name="type" class="form-control">
                                <option value="">Chọn Topic muốn thêm</option>
                                <option value="tour" >Tour</option>
                                <option value="hotel" >Hotel</option>
                                <option value="travel" >Travel</option>
                                <option value="contact" >Contact</option>
                                <option value="home" >Home</option>
                              </select>
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

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- end home opic-->

      <div class="row">
       <!-- role table  -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              Home
            </div>
            <div class="box-body" >
              <table id="listhome" class="list-show table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Ảnh</th>
                    <th>Nội dung</th>
                    <th>Cập nhật</th>
                    <th>Cài đặt</th>
                    <th>Xóa ảnh</th>
                  </tr>
                </thead>
                <tbody class="list-topic">
                  @foreach($home as $topic)
                  <tr id="home-{{$topic->id}}" class="topic">
                    <td><img height="50px" width="50px" src="{{asset('/storage/'.$topic->img)}}" alt=""> </td>
                    <td>{{$topic->content}}</td>
                    <td>{{$topic->created_at}}</td>
                    <td>
                      <button class="online btn btn-success" title="Cài đặt làm hình nền">
                        <i class="fa fa-cog"></i>
                      </button>
                      <button data-toggle="modal" data-target="#home-view-{{$topic->id}}" class="update btn btn-primary" title="xem chi tiết">
                        <i class="fa fa-eye"></i>
                      </button>
                    </td>
                    <td>
                        <button class="delete btn btn-danger">
                          <i class="fa fa-trash"></i>
                        </button>
                    </td>
                  </tr>
                  <div class="modal fade" id="home-view-{{$topic->id}}" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update</h4>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('topic.update',['topic' => $topic->id])}}" method="post">
                              @csrf
                              @method('put')
                              <input type="text" name="id_topic" class="hidden" value="{{$topic->id}}">
                              <div class="form-group">
                                <label for="img">Ảnh</label>
                                <h3 style="text-align: center;">
                                  <img height="300px" width="500px" src="{{asset('/storage/'.$topic->img)}}" title="Ảnh" disable="true">
                                </h3>
                              </div>
                              <div class="form-group">
                                <label for="display_name">Nội dung cập nhật</label>
                                <input type="text" name="content"  value="{{$topic->content}}" class="form-control" requrie>
                                @if($errors->has('content'))
                                  <span>{{$errors->first('content')}}</span>
                                @endif
                              </div>
                            </form>
                            <button type="submit" name="button" class="btn btn-success">Cập nhật</button>
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
        <!-- end role -->

      </div>
      <!-- topic tour -->
      <div class="row">
       <!-- role table  -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              Tour
            </div>
            <div class="box-body" >
              <table  id="listtour" class="list-show table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>Ảnh</th>
                    <th>Nội dung</th>
                    <th>Cập nhật</th>
                    <th>Cài đặt</th>
                    <th>Xóa ảnh</th>
                  </tr>
                </thead>
                <tbody class="list-topic">
                  @foreach($tour as $topic)
                    <tr id="tour-{{$topic->id}}" class="topic">
                      <td><img height="50px" width="50px" src="{{asset('/storage/'.$topic->img)}}" alt=""> </td>
                      <td>{{$topic->content}}</td>
                      <td>{{$topic->created_at}}</td>
                      <td>
                        <button class="online btn btn-success" title="Cài đặt làm hình nền">
                          <i class="fa fa-cog"></i>
                        </button>
                        <button data-toggle="modal" data-target="#tour-view-{{$topic->id}}" class="update btn btn-primary" title="xem chi tiết">
                          <i class="fa fa-eye"></i>
                        </button>
                      </td>
                      <td>
                          <button class="delete btn btn-danger">
                            <i class="fa fa-trash"></i>
                          </button>
                      </td>
                    </tr>
                    <div class="modal fade" id="tour-view-{{$topic->id}}" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update</h4>
                          </div>
                          <div class="modal-body">
                              <form action="{{route('topic.update',['topic' => $topic->id])}}" method="post">
                                @csrf
                                @method('put')
                                <input type="text" name="id_topic" class="hidden" value="{{$topic->id}}">
                                <div class="form-group">
                                  <label for="img">Ảnh</label>
                                  <h3 style="text-align: center;">
                                    <img height="300px" width="500px" src="{{asset('/storage/'.$topic->img)}}" title="Ảnh" disable="true">
                                  </h3>
                                </div>
                                <div class="form-group">
                                  <label for="display_name">Nội dung cập nhật</label>
                                  <input type="text" name="content"  value="{{$topic->content}}" class="form-control" requrie>
                                  @if($errors->has('content'))
                                    <span>{{$errors->first('content')}}</span>
                                  @endif
                                </div>
                                <button type="submit" name="button" class="btn btn-success">Cập nhật</button>
                              </form>
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
        <!-- end role -->

      </div>
      <!-- end topic tour -->

      <!-- topic travel -->
      <div class="row">
        <!-- permission table -->
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              Travel
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <table  class="list-show table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>Ảnh</th>
                    <th>Nội dung</th>
                    <th>Cập nhật</th>
                    <th>Cài đặt</th>
                    <th>Xóa ảnh</th>
                  </tr>
                </thead>
                <tbody class="list-topic">
                  @foreach($travel as $topic)
                  <tr id="travel-{{$topic->id}}" class="topic">
                    <td><img height="50px" width="50px" src="{{asset('/storage/'.$topic->img)}}" alt=""> </td>
                    <td>{{$topic->content}}</td>
                    <td>{{$topic->created_at}}</td>
                    <td>
                      <button class="online btn btn-success" title="Cài đặt làm hình nền">
                        <i class="fa fa-cog"></i>
                      </button>
                      <button data-toggle="modal" data-target="#travel-view-{{$topic->id}}" class="update btn btn-primary" title="xem chi tiết">

                        <i class="fa fa-eye"></i>
                      </button>
                    </td>
                    <td>
                        <button class="delete btn btn-danger">
                          <i class="fa fa-trash"></i>
                        </button>
                    </td>
                  </tr>
                  <div class="modal fade" id="travel-view-{{$topic->id}}" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update</h4>
                          </div>
                          <div class="modal-body">
                              <form action="{{route('topic.update',['topic' => $topic->id])}}" method="post">
                                @csrf
                                @method('put')
                                <input type="text" name="id_topic" class="hidden" value="{{$topic->id}}">
                                <div class="form-group">
                                  <label for="img">Ảnh</label>
                                  <h3 style="text-align: center;">
                                    <img height="300px" width="500px" src="{{asset('/storage/'.$topic->img)}}" title="Ảnh" disable="true">
                                  </h3>
                                </div>
                                <div class="form-group">
                                  <label for="display_name">Nội dung cập nhật</label>
                                  <input type="text" name="content"  value="{{$topic->content}}" class="form-control" requrie>
                                  @if($errors->has('content'))
                                    <span>{{$errors->first('content')}}</span>
                                  @endif
                                </div>
                                <button type="submit" name="button" class="btn btn-success">Cập nhật</button>
                              </form>
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
      <!-- end topic travel  -->

      <!-- hotel topic -->
      <div class="row">
        <!-- permission table -->
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              Khách sạn
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <table  class="list-show table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>Ảnh</th>
                    <th>Nội dung</th>
                    <th>Cập nhật</th>
                    <th>Cài đặt</th>
                    <th>Xóa ảnh</th>
                  </tr>
                </thead>
                <tbody class="list-topic">
                  @foreach($hotel as $topic)
                  <tr id="hotel-{{$topic->id}}" class="topic">
                    <td><img height="50px" width="50px" src="{{asset('/storage/'.$topic->img)}}" alt=""> </td>
                    <td>{{$topic->content}}</td>
                    <td>{{$topic->created_at}}</td>
                    <td>
                      <button class="online btn btn-success" title="Cài đặt làm hình nền">
                        <i class="fa fa-cog"></i>
                      </button>
                      <button data-toggle="modal" data-target="#hotel-view-{{$topic->id}}" class="update btn btn-primary" title="xem chi tiết">

                        <i class="fa fa-eye"></i>
                      </button>
                    </td>
                    <td>
                        <button class="delete btn btn-danger">
                          <i class="fa fa-trash"></i>
                        </button>
                    </td>
                  </tr>
                  <div class="modal fade" id="hotel-view-{{$topic->id}}" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update</h4>
                          </div>
                          <div class="modal-body">
                              <form action="{{route('topic.update',['topic' => $topic->id])}}" method="post">
                                @csrf
                                @method('put')
                                <input type="text" name="id_topic" class="hidden" value="{{$topic->id}}">
                                <div class="form-group">
                                  <label for="img">Ảnh</label>
                                  <h3 style="text-align: center;">
                                    <img height="300px" width="500px" src="{{asset('/storage/'.$topic->img)}}" title="Ảnh" disable="true">
                                  </h3>
                                </div>
                                <div class="form-group">
                                  <label for="display_name">Nội dung cập nhật</label>
                                  <input type="text" name="content"  value="{{$topic->content}}" class="form-control" requrie>
                                  @if($errors->has('content'))
                                    <span>{{$errors->first('content')}}</span>
                                  @endif
                                </div>
                                <button type="submit" name="button" class="btn btn-success">Cập nhật</button>
                              </form>
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
      <!-- end hotel topic  -->

      <!-- contact topic -->
      <div class="row">
        <!-- permission table -->
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              Liên hệ
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <table  class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>Ảnh</th>
                    <th>Nội dung</th>
                    <th>Cập nhật</th>
                    <th>Cài đặt</th>
                    <th>Xóa ảnh</th>
                  </tr>
                </thead>
                <tbody class="list-topic">
                  @foreach($contact as $topic)
                  <tr id="contact-{{$topic->id}}" class="topic">
                    <td><img height="50px" width="50px" src="{{asset('/storage/'.$topic->img)}}" alt=""> </td>
                    <td>{{$topic->created_at}}</td>
                    <td>
                      <button class="online btn btn-success" title="Cài đặt làm hình nền">
                        <i class="fa fa-cog"></i>
                      </button>
                      <button data-toggle="modal" data-target="#home-view-{{$topic->id}}" class="update btn btn-primary" title="xem chi tiết">

                        <i class="fa fa-eye"></i>
                      </button>
                    </td>
                    <td>
                        <button class="delete btn btn-danger">
                          <i class="fa fa-trash"></i>
                        </button>
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
        <!-- end permission -->
      </div>
      <!-- end contact topic  -->

    </section>

@endsection
@section('script')
  <script type="text/javascript">
  $(function () {
    $('.list-show').DataTable({
    })
  });
  $('.delete').click(function(){
    $parent = $(this).parent().parent().attr('id');
    $id = $parent.split('-')[1];

    $.ajax({
      type:'DELETE',
      url :"{{url('/topic')}}/"+$id + '?status=0',
      data:{
        '_token':$('meta[name="csrf-token"]').attr('content'),
      },
      success:function($data)
      {
        console.log($data);
        if(($data.errors))
        {
            toastr.warning('Thao tác không thành công ! Xin kiểm tra lại topic');
        }
        else
        {
          $('#'+$data).remove('');
          toastr.success('Topic đã được xóa');
        }
      }
    });
  });

  $('.online').click(function(){
    $parent = $(this).parent().parent().attr('id');
    $id = $parent.split('-');
    $.ajax({
      type:'get',
      url :"{{url('/topic')}}/"+$id[1] + '?type=' +$id[0],
      data:{
        '_token':$('meta[name="csrf-token"]').attr('content'),
      },
      success:function($data)
      {
        console.log($data);
        if(!$data)
        {
            toastr.warning('Thao tác không thành công ! Xin kiểm tra lại topic');
        }
        else
        {
          $('#'+$data).remove('');
          toastr.success('Topic đã được cập nhật');
        }
      }
    });
  });

  $('button[name=button]').click(function(event){
    event.preventDefault();
    $url = $(this).parent().children('form').attr('action');
    $token = $(this).parent().children('input[name=_token]').val();
    $method = $(this).parent().children('input[name=_method]').val();
    $content = $(this).parent().children('div').eq(1).children('input[name=content]').val();
    console.log($url);
    $.ajax({
      type:'post',
      url : $url,
      data :{
        '_token' : $token,
        '_method' : $method,
        'content' : $content,
      },
      success:function($data)
      {

        if($data)
        {
          $('#'+$data.id).children().eq(1).text($data.content);
          toastr.success('Topic đã được cập nhật');
        }
      }
    });
  });
  </script>
@endsection
