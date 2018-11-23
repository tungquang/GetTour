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
      <li class="active">{{$tour->name}}</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="container">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title container" style="text-algin:center;">
              <img height="50%" width="50%" src="{{Storage::disk('local')->url($tour->img)}}" alt="">
            </h3>
          </div>
          <!-- /.box-header -->
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{url('tour')}}/{{$tour->id}}" role="form" enctype="multipart/form-data" method="post">
            @method('put')
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên Tour Du Lịch</label>
                <input type="text" name="name" value="{{$tour->name}}" class="form-control" id="exampleInputEmail1" placeholder="Du lịch sinh thái">
                @if($errors->has('name'))
                <span class="text-red">
                  {{$errors->first('name')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="content">Nội dung chuyến đi</label>
                <textarea id="content" name="content" value="{{$tour->content}}" id="content" placeholder="">
                                  {!!$tour->content!!}
                </textarea>
                @if($errors->has('content'))
                <span class="text-red">
                  {{$errors->first('content')}}
                </span>
                @endif
              </div>
              <div class="row">

                <div class="form-group col-xs-6 bootstrap-timepicker">
                  <label for="time_in">Thời gian đi</label>
                  <input type="time"  name="time_in" value="{{$tour->time_in}}" class="form-control timepicker" id="time_in" >
                  @if($errors->has('time_in'))
                  <span class="text-red">
                    {{$errors->first('time_in')}}
                  </span>
                  @endif
                </div>
                <div class="form-group col-xs-6 bootstrap-timepicker">
                  <label for="time_out">Thời gian về</label>
                  <input type="time" class="form-control" value="{{$tour->time_out}}" name="time_out" id="time_out">
                  @if($errors->has('time_out'))
                  <span class="text-red">
                    {{$errors->first('time_out')}}
                  </span>
                  @endif
                </div>
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
                <select name="id_province" class="form-control select2" style="width: 100%;" id="{{$tour->id_province}}">
                  <option value="0" >Alabama</option>
                  <option value="1">Alaska</option>
                  <option value="2">California</option>
                  <option value="3">Delaware</option>
                  <option value="4">Tennessee</option>
                  <option value="5">Texas</option>
                  <option value="6">Washington</option>
                </select>
                @if($errors->has('id_province'))
                <span class="text-red">
                  {{$errors->first('id_province')}}
                </span>
                @endif
              </div>

              <div class="form-group">
                <label for="country">Kiểu</label>
                <select name="id_type" class="form-control select2" style="width: 100%;" id="{{$tour->id_type}}">

                  <option value="0">Du lịch trong nước</option>
                  <option value="1">Du lịch ngoài nước</option>
                  <option value="2">Du lịch nhóm</option>
                </select>
                @if($errors->has('id_type'))
                <span class="text-red">
                  {{$errors->first('id_type')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="place">Địa danh</label>
                <input type="text" name="place" value="{{$tour->place}}" class="form-control">
                @if($errors->has('place'))
                <span class="text-red">
                  {{$errors->first('place')}}
                </span>
                @endif
              </div>
              <div class="row">

                <div class="form-group col-xs-4">
                  <label for="day">Số ngày </label>
                  <input type="text" name="day" id="day" value="{{$tour->day}}" class="form-control">
                  @if($errors->has('day'))
                  <span class="text-red">
                    {{$errors->first('day')}}
                  </span>
                  @endif
                </div>
                <div class="form-group col-xs-4">
                  <label for="seat">Số ghế </label>
                  <input type="number" name="seat" id="seat" value="{{$tour->seat}}" class="form-control">
                  @if($errors->has('seat'))
                  <span class="text-red">
                    {{$errors->first('seat')}}
                  </span>
                  @endif
                </div>
                <div class="form-group col-xs-4">
                  <label for="number_seated">Số ghế đặt</label>
                  <input type="number" name="number_seated" id="number_seated" value="{{$tour->number_seated}}" class="form-control">

                </div>
              </div>
              <div class="row">
                <div class="form-group col-xs-6">
                  <label for="unit">Giá thành tiền</label>
                  <input type="text" name="unit_price" id="unit" value="{{$tour->unit_price}}" class="form-control">
                  @if($errors->has('unit_price'))
                  <span class="text-red">
                    {{$errors->first('unit_price')}}
                  </span>
                  @endif
                </div>
                <div class="form-group col-xs-6">
                  <label for="unit">Giảm giá</label>
                  <input type="text" name="promotion_price" id="unit" value="{{$tour->promotion_price}}" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="note">Nội dung chuyến đi</label>
                <input type="text" name="note" value="{{$tour->note}}" class="form-control">
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
