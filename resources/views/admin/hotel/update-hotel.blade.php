@extends('admin.layout')
@section('content')
<section class="content-header">

    <h1>
      Quản lý hotel
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý </a></li>
      <li><a href="#">Quản lý hotel</a></li>
      <li class="active">{{$hotel->name}}</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="container">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title container" style="text-algin:center;">
              <img height="50%" width="50%" src="{{Storage::disk('local')->url($hotel->img)}}" alt="">
            </h3>
          </div>
          <!-- /.box-header -->
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{route('hotel.update',$hotel->id)}}" role="form" enctype="multipart/form-data" method="post">
            @method('put')
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="name">Tên khách sạn</label>
                <input type="text" name="name" value="{{$hotel->name}}" class="form-control" id="name" placeholder="Mường Thanh Hotel">
                @if($errors->has('name'))
                <span class="text-red">
                  {{$errors->first('name')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="content">Thông tin khách sạn</label>
                <textarea id="content" name="content" id="content" placeholder="">
                                  {!!$hotel->content!!}
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
                <label for="country">Thành phố</label>
                <select name="id_province" class="form-control select2" style="width: 100%;" id="{{$hotel->id_province}}">
                  @foreach($city as $cy)
                    <option value="{{$cy->id}}">{{$cy->name}}</option>
                  @endforeach
                </select>
                @if($errors->has('id_province'))
                <span class="text-red">
                  {{$errors->first('id_province')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="country">Kiểu khách sạn</label>
                <select name="star" class="form-control select2" style="width: 100%;" id="{{$hotel->star}}">
                    @foreach($star as $st)
                      <option value="{{$st->id}}">{{$st->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('star'))
                <span class="text-red">
                  {{$errors->first('star')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                  <label for="room">Số phòng</label>
                  <input type="number" name="room" id="room" value="{{$hotel->room}}" class="form-control">
              </div>
              <div class="row">
                <div class="form-group col-xs-6">
                  <label for="unit">Giá thành tiền</label>
                  <input type="text" name="unit_price" id="unit" value="{{$hotel->unit_price}}" class="form-control">
                  @if($errors->has('unit_price'))
                  <span class="text-red">
                    {{$errors->first('unit_price')}}
                  </span>
                  @endif
                </div>
                <div class="form-group col-xs-6">
                  <label for="promotion_price">Giảm giá</label>
                  <input type="text" name="promotion_price" id="promotion_price" value="{{$hotel->promotion_price}}" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="note">Chú ý *</label>
                <input type="text" name="note" value="{{$hotel->note}}" class="form-control">
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
    CKEDITOR.replace('content')

    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
    //select star
    $star = $('select[name=star]').attr('id');
    $('select[name=star]').children('option').eq($star-1).attr('selected','selected');
    //select country
    $id_province = $('select[name=id_province]').attr('id');
    $('select[name=id_province]').children('option').eq($id_province-1).attr('selected','selected');
  });


  </script>
@endsection
