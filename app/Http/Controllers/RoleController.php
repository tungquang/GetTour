<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\RoleServiceInterface;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
  public function __construct(RoleServiceInterface $response)
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return $this->response->index();
    }
    /**
     * Store the specified resource in role.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
      return $this->response->store($request);
    }
    /**
     * Update the specified resource in role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        return $this->response->update($request, $id);
    }

    /**
     * Remove the specified resource from role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->response->destroy($id);
    }

    public function attachToPermission(Request $request, $id)
    {
      return $this->response->attachToPermission($request, $id);
    }
}
