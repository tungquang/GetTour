@foreach($role as $ro)

  <tr>
    <td>{{$ro->name}}</td>
    <td>{{$ro->display_name}}</td>
    <th>
      @foreach($ro->permission as $per)
        <span>{{$per->name}}, </span>
      @endforeach
    </th>
    <td>{{$ro->description}}</td>
    <td>{{$ro->updated_at}}</td>
    <td>
      <div class="form-group">
        <select class="form-control" id="permission-out-{{$ro->id}}">
            <option value="">Default</option>
          @foreach($ro->permission as $per)
            <option value="{{$per->id}}">{{$per->display_name}}</option>
          @endforeach
        </select>
      </div>
  </td>
  <td>
    <div class="form-group">
      <select class="form-control" id="permission-in-{{$ro->id}}">
          <option value="">Default</option>
        @foreach($permission as $per)
          <option value="{{$per->id}}">{{$per->display_name}}</option>
        @endforeach

      </select>
    </div>
  </td>
  <td>
      <input type="text" name="role" value="{{$ro->id}}" class="hidden">
      <a href="{{route('role.destroy',$ro->id)}}" name="delete">
        <button type="button" class="btn btn-danger">
            <i class="fa fa-trash"></i>

        </button>
      </a>
      <a href="{{route('role.attach',$ro->id)}}" name="update">
        <button type="button" class="btn btn-warning">
          <i class="fa fa-repeat"></i>
          </button>
        </a>


    </td>
  </tr>
  @endforeach
