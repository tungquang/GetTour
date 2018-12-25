@extends('admin.layout')
@section('content')
  <section class="content-header">
      <h1>
        Quản lý Topic
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý</a></li>
        <li><a href="#">Topic</a></li>
        <li class="active">Danh sách bị xóa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <!-- role table  -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              Danh sách Topic bị xóa
            </div>
            <div class="box-body" >
              <table id="listhome" class="list-show table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Ảnh</th>
                    <th>Cập nhật</th>
                    <th>Nội dung</th>
                    <th>Kích hoạt</th>
                  </tr>
                </thead>
                <tbody class="list-topic">

                  @foreach($topics as $topic)
                  <tr id="home-{{$topic->id}}" class="topic">
                    <td><img height="50px" width="50px" src="{{asset('/storage/'.$topic->img)}}" alt=""> </td>
                    <td>{{$topic->content}}</td>
                    <td>{{$topic->created_at}}</td>
                    <td>
                        <button class="delete btn btn-warning">
                          <i class="fa fa-repeat"></i>
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
        <!-- end role -->

      </div>
    </section>

@endsection
@section('script')
  <script type="text/javascript">
  $(function () {

    $('.list-show').DataTable({

    })
  });

  </script>
@endsection
