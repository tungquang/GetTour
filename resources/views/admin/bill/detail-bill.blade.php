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
      <i>
        <p>Địa chỉ : 120- Láng Hạ - Đống Đa</p>
        <p>Khách hàng : {{$user->name}}</p>
        <p>Địa chỉ :{{$user->detail->address}}</p>
        <p>Điên thoại :{{$user->detail->phone}}</p>
      </i>
      <address>

      </address>
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>ID Pay <p id="pay-id">IC-<?php echo(time())?>-{{date('d-m-y')}}</p> </b><br>
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
                <div class="">
                  <p>{{$obj->quantity}}</p>
                </div>
              </td>
              <td class="obj-total">{{number_format($obj->price*$obj->quantity)}}</td>

            </tr>

          @endforeach
          <tr>
            <td colspan="4">
              <h4>Tổng  :</h4>
            </td>
            <td>
              <p id="total">{{number_format($total)}}</p>
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
      <input type="text" name="payment" value="{{$_GET['payment']}}" class="hidden">
      <img id="1" class="payment" src="{{Storage::disk('local')->url('mastercard.png')}}" alt="Mastercard">
      <img id="2" class="payment" src="{{Storage::disk('local')->url('visa.png')}}" alt="Visa">
      <img id="3" class="payment" src="{{Storage::disk('local')->url('american-express.png')}}" alt="American Express">
      <img id="4" class="payment" src="{{Storage::disk('local')->url('paypal2.png')}}" alt="Paypal">
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
            <th>Thuế (9.3%)</th>
            <th><p id="tax">{{number_format(Cart::getSubTotal() * 0.01)}}</p> <span>VNĐ</span></th>
          </tr>
          <tr>
            <th>Vận chuyển:</th>
            <th><p id="ship"></p> <span>VNĐ</span></th>
          </tr>
          <tr>
            <th>Thanh Toán:</th>
            <th><p id="pay">
              {{number_format(Cart::getSubTotal()+ (Cart::getSubTotal() * 0.01))}}
            </p><span>VNĐ</span></th>
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
      <a href="#" id="print" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
      <button type="button" id="submit" class="btn btn-success pull-right"><i class="fa fa-file"></i> Get PDF
      </button>
    </div>
  </div>
</section>
<!-- /.content -->
<div class="clearfix"></div>
@endsection
@section('script')
  <script type="text/javascript">
    $(function(){
      $idpay = $('input[name=payment]').val();
      $('.payment').attr('style','opacity:0.2');
      $('#'+$idpay).attr('style','opacity:1');

    });
    $('#print').click(function(){
      window.print();
    });

  </script>
@endsection
