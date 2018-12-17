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
    <td>{{number_format(Cart::get($obj->id)->getPriceSum())}}</td>

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
