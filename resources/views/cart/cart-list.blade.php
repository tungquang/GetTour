@extends('admin.layout')
@section('content')
<section class="content-header">
  <h1>
    <small>#007612</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Bill</a></li>
  </ol>
</section>


<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> Get Tour
        <small class="pull-right"><?php echo date('d-m-y')?></small>
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-8 invoice-col">
      <h4>  Công ty cổ phần đầu tư và phát triển TNT </h4>
      <p>Địa chỉ : 120- Láng Hạ - Đống Đa</p>

      <address>

      </address>
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>Order ID:</b> 4F3S8J<br>
      <b>Payment Due:</b> 2/22/2014<br>
      <b>Account:</b> {{Auth::guard('customer')->user()->name}}
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table id="form-pay" class="table table-striped">
        <thead>
        <tr>
          <th>Ảnh</th>
          <th>Tên</th>
          <th>Giá #</th>
          <th>Đơn vị</th>
          <th>Tổng</th>
        </tr>
        </thead>
        <tbody class="list">
          @foreach($list as $obj)
            <tr>
              <td>

                <img src="{{Storage::disk('local')->url($obj->attributes->object->img)}}" height="50px" width="50px" alt="">
              </td>
              <td>{{$obj->name}}</td>
              <td>{{number_format($obj->price)}}</td>
              <td>
                <div class="row col-md-6">

                    <input type="number" name="quantity" value="{{$obj->quantity}}">
                    <input type="text" name="href" class="hidden" value="{{'item='.$obj->id.'&&type='.$obj->attributes->type}}">
                </div>
                <div class="col-md-6">
                  <a class="add" href="{{'item='.$obj->id.'&&type='.$obj->attributes->type.'&&method=add'}}">
                    <button type="button" class="add btn btn-success">
                      <i class="fa fa-plus-square"></i>
                    </button>
                  </a>
                  <a class="delete" href="{{'item='.$obj->id.'&&type='.$obj->attributes->type.'&&method=delete'}}">
                    <button type="button" name="delete" class="delete btn btn-danger">
                      <i class="fa fa-minus-square"></i>
                    </button>
                  </a>
                </div>

              </td>
              <td class="obj-total">{{number_format(Cart::get($obj->id)->getPriceSum())}}</td>

            </tr>

          @endforeach
          <tr>
            <td colspan="4">
              <h4>Tổng tiền :</h4>
            </td>
            <td>
              <p>{{number_format(Cart::getSubTotal())}}</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">
      <p class="lead chose-pay">Payment Methods:</p>
      <img id="1" class="payment" src="{{Storage::disk('local')->url('mastercard.png')}}" alt="Mastercard" style="width: 50px;">
      <img id="2" class="payment" src="{{Storage::disk('local')->url('visa.png')}}" alt="Visa" style="width: 50px;">
      <img id="4" class="payment" src="{{Storage::disk('local')->url('paypal2.png')}}" alt="Paypal" style="width: 50px;">
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        Yêu cầu bạn chọn phương thức thanh toán để tạo sự tiện lợi
      </p>
    </div>
    <!-- /.col -->
    <div class="col-xs-6">
      <p class="lead">Amount Due 2/22/2014</p>

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>Tax (9.3%)</th>
            <td><p id="tax"></p> VNĐ</td>
          </tr>
          <tr>
            <th>Shipping:</th>
            <td><p id="ship"></p> VNĐ</td>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">

      <button type="button" id="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Thanh toán
      </button>
    </div>
  </div>
</section>
<!-- /.content -->
<div class="clearfix"></div>
@endsection

@section('script')
  <script type="text/javascript">

      $('.list').delegate('.add','click',function(event){
        event.preventDefault();
        $url = "{{url('cart/update')}}?" + $(this).attr('href');

        $.ajax({
          url:$url,
          type:'get',
          success:function($data)
          {

            if($data)
            {
              $('.list').html('');
              $('.list').append($data);
              toastr.success('Yêu cầu của bạn đã được thực thi !');
            }
            else
            {
              toastr.warning('Yêu cầu của bạn không thành công');
            }
          }
        });
      });
      $('.list').delegate('.delete','click',function(event){
        event.preventDefault();
        $url = "{{url('cart/update')}}?" + $(this).attr('href');
        $.ajax({
          url:$url,
          type:'get',
          success:function($data)
          {

            if($data)
            {
              $('.list').html('');
              $('.list').append($data);
              toastr.success('Yêu cầu của bạn đã được thực thi !');
            }
            else
            {
              toastr.warning('Yêu cầu của bạn không thành công');
            }
          }
        });
      });
      $('.list').delegate('input[name=quantity]','change',function(){
        $quantity = $(this).val();
        $url ="{{url('cart/edit')}}?"+$(this).parent().children('input[name=href]').val()+'&&quantity='+$quantity;
        $.ajax({
          url:$url,
          type:'get',
          success:function($data)
          {

            if($data)
            {
              $('.list').html('');
              $('.list').append($data);
              toastr.success('Yêu cầu của bạn đã được thực thi !');
            }
            else
            {
              toastr.warning('Yêu cầu của bạn không thành công');
            }
          }
        });
      });
      $('#submit').click(function(){
        $payment = $('.active-pay').attr('id');
        if($payment==undefined)
        {
          alert('Yêu cầu bạn chọn phương thức thanh toán !');
        }
        else
        {

          $url = "{{url('cart/submit')}}?payment="+$payment;
          window.location.replace($url);
        }

      });
      $('.payment').click(function(){

        $('.payment').attr('style','opacity: 0.2;');
        $('.payment').removeClass('active-pay');

        $(this).attr('style','opacity: 1;');
        $(this).addClass('active-pay');
      });

  </script>
@endsection
