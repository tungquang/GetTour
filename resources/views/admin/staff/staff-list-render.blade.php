@foreach($list as $staff)
    <tr class="staff" id={{$staff->id}}>
      <td>{{$staff->name}}</td>
      <td>{{$staff->email}}</td>
      <td>{{$staff->role->roleName->display_name}}</td>
      <td>
        <div class="form-group">
          <select class="form-control" name="" id="role-in-{{$staff->id}}">
            @foreach($role as $ro)
              <option value="{{$ro->id}}">{{$ro->name}}</option>
            @endforeach
              <option value="20">Test</option>
          </select>
        </div>
      </td>
      <td>{{$staff->updated_at}}</td>
      <td>
        <button class="btn btn-danger" data-toggle="modal" data-target="#form-delete-{{$staff->id}}">Xóa</button>
        <a href="{{route('user.attach.role',$staff->id)}}" name="update">
          <button type="button" class="btn btn-warning">
            <i class="fa fa-repeat"></i>
            </button>
        </a>
        <input type="text" class="hidden" name="staff-id" value="{{$staff->id}}">
        <div class="modal fade" id="form-delete-{{$staff->id}}" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                  <h3>Bạn muốn xóa tài khoản {{$staff->email}} ?</h3>
                </div>
                <div class="modal-footer">
                  <button type="button" class="delete btn btn-primary" data-dismiss="modal">Đồng ý</button>
                </div>
              </div>

            </div>
          </div>
      </td>
    </tr>
@endforeach
