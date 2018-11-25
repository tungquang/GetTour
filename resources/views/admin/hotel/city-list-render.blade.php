
<option value="" selected="selected"></option>
@foreach($list as $city)
  <option value="{{$city->id}}">{{$city->name}}</option>
@endforeach
