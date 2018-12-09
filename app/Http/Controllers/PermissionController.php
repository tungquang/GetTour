<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PermissionServiceInterface;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function __construct(PermissionServiceInterface $response)
    {
      $this->middleware('auth');
      $this->middleware('role:own');
      $this->response = $response;
    }

    protected function validator($data)
    {
      return Validator::make($data,$this->rules(),$this->messesges());
    }
    protected function rules()
    {
      return [
        'name'            => 'required|string|max:255',
        'display_name'    => 'required|string|max:255',

      ];
    }
    protected function messesges()
    {
      return [
        'name.required'       => 'Yêu cầu điền tên Quyền',
        'display_name.required'    => 'Tên hiển thị ',
      ];
    }
    /*
    * Method to create new permssion
    */
    public function store(Request $request)
    {
      $this->validator($request->all())->validate();
      return $this->response->store($request);
    }
    public function update(Request $request,$id)
    {

      $this->validator($request->all())->validate();
      return $this->response->update($request,$id);
    }
    public function destroy($id)
    {
      return $this->response->destroy($id);
    }
}
