<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\RoleServiceInterface;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct(RoleServiceInterface $roleService)
    {
        $this->middleware('role:own');
        $this->roleService = $roleService;
    }

    private function validator($data)
    {
        return Validator::make($data,$this->rules(),$this->messesges());
    }

    private function rules()
    {
        return [
          'name'            => 'required|string|max:255',
          'display_name'    => 'required|string|max:255',

        ];
    }

    private function messesges()
    {
        return [
          'name.required'       => 'Yêu cầu điền tên Quyền',
          'display_name.required'    => 'Tên hiển thị ',
        ];
    }

    public function index()
    {
        return $this->roleService->index();
    }
    /**
     * Store the specified resource in role.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\roleService
     */

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        try {
          $this->roleService->store($request);
        } catch (\Exception $e) {
          abort('404',$e->getMessage());
        }
        return redirect()->route('role.index');
    }
    /**
     * Update the specified resource in role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     */
    public function update(Request $request, $id)
    {
        abort('404','Method not allow');
    }

    /**
     * Remove the specified resource from role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\roleService
     */
    public function destroy($id)
    {
        try {
          $view = $this->roleService->destroy($id);
        } catch (\Exception $e) {
          $view = false;
        }
        return response()->json($view);
    }

    public function attachToPermission(Request $request, $id)
    {
        try {
          return $this->roleService->attachToPermission($request, $id);
        } catch (\Exception $e) {
          return response()->json($value = false);
        }
    }
}
