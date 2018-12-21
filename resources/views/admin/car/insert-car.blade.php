@extends('admin.layout')
@section('content')
<section class="content-header">

    <h1>
      Quản lý tour
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý </a></li>
      <li><a href="#">Quản lý tour</a></li>
      <li class="active">Thêm tour mới</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="container">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Xe mới</h3>
          </div>
          <!-- /.box-header -->
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{route('car.store')}}" role="form" enctype="multipart/form-data" method="post">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Biển Xe</label>
                <input type="text" value="{{old('name')}} "name="name" class="form-control" id="exampleInputEmail1" placeholder="88K-5568">
                @if($errors->has('name'))
                <span class="text-red">
                  {{$errors->first('name')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="description">Mô tả cơ bản</label>
                <textarea id="description" name="description" placeholder="">
                                  {{old('description')}}
                </textarea>
                @if($errors->has('description'))
                <span class="text-red">
                  {{$errors->first('description')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="content">Thông tin xe</label>
                <textarea id="content" name="content" id="content" placeholder="">
                                  {{old('content')}}
                </textarea>
                @if($errors->has('content'))
                <span class="text-red">
                  {{$errors->first('content')}}
                </span>
                @endif
              </div>
              <div class="form-group dropzone" id="my-awesome-dropzone" >
                <label for="img">Ảnh đại diện</label>
                <input type="file" name="img" id="img">
                @if($errors->has('img'))
                <span class="text-red">
                  {{$errors->first('img')}}
                </span>
                @endif
              </div>


              <div class="form-group">
                <label for="country">Kiểu</label>
                <select name="id_type" class="form-control select2" style="width: 100%;" id="id_type">
                  <option value=""></option>
                  @foreach($type as $ty)
                    <option value="{{$ty->id}}">{{$ty->name}}</option>
                  @endforeach

                </select>
                @if($errors->has('id_type'))
                <span class="text-red">
                  {{$errors->first('id_type')}}
                </span>
                @endif
              </div>
              <div class="row">
                <div class="form-group col-xs-6">
                  <label for="seat">Số ghế </label>
                  <input type="number" name="seat" id="seat" value="{{old('seat')}}" class="form-control">
                  @if($errors->has('seat'))
                  <span class="text-red">
                    {{$errors->first('seat')}}
                  </span>
                  @endif
                </div>
                <div class="form-group col-xs-6">
                  <label for="book">Số ghế đặt</label>
                  <input type="number" name="book" id="book" value="{{old('book')}}" class="form-control">
                  @if($errors->has('book'))
                  <span class="text-red">
                    {{$errors->first('book')}}
                  </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                    <label for="unit">Giá thành tiền</label>
                    <input type="text" name="unit_price" id="unit" value="{{old('unit_price')}}" class="form-control">
                    @if($errors->has('unit_price'))
                    <span class="text-red">
                      {{$errors->first('unit_price')}}
                    </span>
                    @endif
              </div>
              <div class="form-group">
                <label for="note">Nội dung chú ý</label>
                <input type="text" name="note" value="{{old('note')}}" class="form-control">
              </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <!-- /.box -->
      </div>
    </div>
  </section>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>

  <script type="text/javascript">
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('description')
    CKEDITOR.replace('content')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  });

  </script>
@endsection
