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
      <li class="active">Thêm hotel mới</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="container">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Hotel mới</h3>
          </div>
          <form action="{{route('hotel.store')}}"  method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="name">Tên khách sạn</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Mường Thanh Hotel">
                @if($errors->has('name'))
                <span class="text-red">
                  {{$errors->first('name')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea id="description" name="description"  >
                                  {{old('description')}}
                </textarea>
                @if($errors->has('description'))
                <span class="text-red">
                  {{$errors->first('description')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="content">Thông tin khách sạn</label>
                <textarea id="content" name="content" id="content" placeholder="">
                                  Gethotel chân thành cảm ơn quý khách
                </textarea>
                @if($errors->has('content'))
                <span class="text-red">
                  {{$errors->first('content')}}
                </span>
                @endif
              </div>
              <div class="form-group" >
                <label for="photo">Ảnh hotel</label>
                <input type="file" name="photo" id="photo">
                <span>Yêu cầu ảnh có kích thước nhỏ hơn 2 MB</span>
              </div>
              <div class="form-group">
                <label for="nation">Quốc gia</label>
                <select name="nation" class="form-control select2" style="width: 100%;" id="nation">
                  <option  selected="selected"></option>
                  @foreach($nation as $na)
                    <option value="{{$na->id}}">{{$na->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="country">Thành phố</label>
                <select name="id_province" class="form-control select2" style="width: 100%;" id="id_province">

                </select>
                @if($errors->has('id_province'))
                <span class="text-red">
                  {{$errors->first('id_province')}}
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="country">Kiểu khách sạn</label>
                <select name="star" class="form-control select2" style="width: 100%;" id="star">
                @foreach($stars as $star)
                  <option value="{{$star->id}}">{{$star->name}}</option>
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
                  <input type="number" name="room" id="room"  class="form-control">
              </div>
              <div class="row">
                <div class="form-group col-xs-6">
                  <label for="unit">Giá thành tiền</label>
                  <input type="text" name="unit_price" class="form-control">
                  @if($errors->has('unit_price'))
                  <span class="text-red">
                    {{$errors->first('unit_price')}}
                  </span>
                  @endif
                </div>
                <div class="form-group col-xs-6">
                  <label for="unit">Giảm giá</label>
                  <input type="text" name="promotion_price" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="note">Chú ý *</label>
                <input type="text" name="note"  class="form-control">
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

      </div>
    </div>
  </section>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
  <script type="text/javascript">
  $(function () {

    CKEDITOR.replace('content')
    CKEDITOR.replace('description')

    $('.textarea').wysihtml5()
  });
  $('#nation').change(function(){
    var $nation = $(this).val();

    $.ajax({

      url:"{{url('city')}}/" + $nation,
      type:'get',
      success:function($data)
      {
        $('#id_province').append($data);
      }
    });
  });
  </script>
@endsection
