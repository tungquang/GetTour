@extends('admin.layout')
@section('content')
<section class="content-header">

    <h1>
      Quản lý car
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý </a></li>
      <li><a href="#">Quản lý car</a></li>
      <li class="active">{{$car->name}}</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="container">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title container center" style="text-align: center;">
              <img height="50%" width="300px" src="{{Storage::disk('local')->url($car->img)}}" alt="">
            </h3>
          </div>
          <!-- /.box-header -->
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{url('car')}}/{{$car->id}}" role="form" enctype="multipart/form-data" method="post">
            @method('put')
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Biển số xe</label>
                <input type="text" name="name" value="{{$car->name}}" class="form-control" id="exampleInputEmail1" placeholder="Du lịch sinh thái">
                @if($errors->has('name'))
                <span class="text-red">
                  {{$errors->first('name')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea id="description" name="description" value="{{$car->content}}" >
                                  {{$car->description}}
                </textarea>
                @if($errors->has('description'))
                <span class="text-red">
                  {{$errors->first('description')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="content">Nội dung chuyến đi</label>
                <textarea id="content" name="content" value="{{$car->content}}" id="content" placeholder="">
                                  {!!$car->content!!}
                </textarea>
                @if($errors->has('content'))
                <span class="text-red">
                  {{$errors->first('content')}}
                </span>
                @endif
              </div>

              <div class="form-group dropzone" id="my-awesome-dropzone" >
                <label for="photo">Ảnh đại diện</label>
                <input type="file" name="photo" id="photo">

                @if($errors->has('photo'))
                <span class="text-red">
                  {{$errors->first('photo')}}
                </span>
                @endif
              </div>


              <div class="form-group">
                <label for="country">Kiểu</label>
                <select name="id_type" class="form-control select2" style="width: 100%;" id="{{$car->id_type-1}}">
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

                <div class="form-group col-xs-4">
                  <label for="seat">Số ghế </label>
                  <input type="text" name="seat" id="seat" value="{{$car->seat}}" class="form-control">
                  @if($errors->has('seat'))
                  <span class="text-red">
                    {{$errors->first('seat')}}
                  </span>
                  @endif
                </div>
                <div class="form-group col-xs-4">
                  <label for="book">Số ghế đặt </label>
                  <input type="number" name="book" id="book" value="{{$car->book}}" class="form-control">
                  @if($errors->has('book'))
                  <span class="text-red">
                    {{$errors->first('book')}}
                  </span>
                  @endif
                </div>
                <div class="form-group col-xs-4">
                  <label for="unit">Unit</label>
                  <input type="number" name="unit" id="unit" value="{{$car->unit}}" class="form-control">

                </div>
              </div>

                <div class="form-group">
                  <label for="unit_price">Giá thành tiền</label>
                  <input type="text" name="unit_price" id="unit_price" value="{{$car->unit_price}}" class="form-control">
                  @if($errors->has('unit_price'))
                  <span class="text-red">
                    {{$errors->first('unit_price')}}
                  </span>
                  @endif
                </div>


              <div class="form-group">
                <label for="note">Nội dung chú ý</label>
                <input type="text" name="note" value="{{$car->note}}" class="form-control">
              </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Cập nhật</button>
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
    CKEDITOR.replace('content')
    CKEDITOR.replace('description')

    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
    //select type
    $id_type = $('select[name=id_type]').attr('id');
    $('select[name=id_type]').children('option').eq($id_type).attr('selected','selected');
    //select country
    $id_province = $('select[name=id_province]').attr('id');
    $('select[name=id_province]').children('option').eq($id_province).attr('selected','selected');
  });

  </script>
@endsection
