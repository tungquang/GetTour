@extends('admin.layout')
@section('content')
<section class="content-header">
  <h1>
    <small>#007612</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
    <li><a href="#">Hóa đơn</a></li>
  </ol>
</section>


<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> {{config('app.name')}}
        <small class="pull-right">{{$bill->created_at}}</small>
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
        <p>Khách hàng : {{$bill->customer->name}}</p>
        <p>Địa chỉ :{{$bill->customer->detail->address}}</p>
        <p>Điên thoại :{{$bill->customer->detail->phone}}</p>
      </i>
      <address>

      </address>
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>ID Pay <p id="pay-id">IC-{{$bill->created_at}}</p> </b><br>
      <b>Order ID:</b> {{$bill->customer->id}}<br>
      <b>Payment Due:</b> 2/22/2014<br>
      <b>Account:</b> {{$bill->customer->name}}
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
          <th>Giá </th>
          <th>Đơn vị</th>
          <th>Tổng</th>
        </tr>
        </thead>
        <tbody class="list">

          @foreach($list as $obj)
            <tr class="product" id="{{$obj['type']}}-{{$obj['object']->id}}">
              <td>

                <img src="{{Storage::disk('local')->url($obj['object']->img)}}" height="50px" width="50px" alt="">
              </td>
              <td>{{$obj['object']->name}}</td>
              <td>{{number_format($obj['book']->price)}}</td>
              <td>
                <div class="">
                  <p>{{$obj['book']->unit}}</p>
                </div>
              </td>
              <td class="obj-total">{{number_format($obj['book']->price*$obj['book']->unit)}}</td>

            </tr>

          @endforeach
          <tr>
            <td colspan="4">
              <h4>Tổng  :</h4>
            </td>
            <td>
              <p id="total">{{number_format($bill->total)}}</p>
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
      <input type="text" name="payment" value="{{$bill->pay}}" class="hidden">
      <img id="payment-1" class="payment" src="{{Storage::disk('local')->url('mastercard.png')}}" alt="Mastercard">
      <img id="payment-2" class="payment" src="{{Storage::disk('local')->url('visa.png')}}" alt="Visa">
      <img id="payment-3" class="payment" src="{{Storage::disk('local')->url('american-express.png')}}" alt="American Express">
      <img id="payment-4" class="payment" src="{{Storage::disk('local')->url('paypal2.png')}}" alt="Paypal">
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
    @if(Auth::guard('customer')->user())
    <div class="col-xs-12">
      @if(!$bill->check)
        <span style="color:#e08e0b;">Khách hàng đợi phản hồi của chúng tôi thông qua email hoặc sẽ có nhân viên tư vấn trực tiếp !</span>
      @endif
    </div>
    @endif

    <div class="col-xs-12">
      <a href="#" id="print" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
      @if(Auth::user())
        @if(!$bill->check)
        <a href="{{route('bill.check',['id_bill' => $bill->id])}}">
          <button type="button" id="submit" class="btn btn-success pull-right"><i class="fa fa-file"></i> Hoàn tất
          </button>
        </a>
        @endif
      @endif

    </div>

  </div>
</section>
<!-- /.content -->
<div class="clearfix"></div>
@endsection
@section('script')
  <script type="text/javascript">
    $(function(){
      var $idpay = $('input[name=payment]').val();
      $id = '#payment-'+$idpay;
      console.log($id);
      $('.payment').attr('style','opacity:0.1');
      $($id).attr('style','opacity:1;border:1px solid red');

    });
    $('#print').click(function(){
      window.print();
    });
    $('.product').dblclick(function(){
      var $id = $(this).attr('id').split('-')[1];
      var $type = $(this).attr('id').split('-')[0];
      var $url = "{{url('/')}}/"+$type +'/'+ $id;
      window.location.replace($url);
    });
  </script>

@endsection
