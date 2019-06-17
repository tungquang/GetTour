<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct(UserServiceInterface $userService)
    {
      $this->middleware('auth');
      $this->middleware('role:own')->only(['attachToRole']);
      $this->middleware('permission:user')->except(['show','update']);
      $this->middleware('permission:delete-user')->only(['destroy']);
      $this->userService = $userService;
    }

    protected function validator($data)
    {
      return Validator::make($data,$this->rules(),$this->messengers());
    }

    protected function rules()
    {
      return [
        'email' => 'required|string|email|max:255',
        'name'  => 'required|string|min:4',
        'address'  => 'required',
        'age'      => 'required',
        'phone'    => 'required|min:9',
        'passport' => 'required|min:9',
        'id_country' => 'required',
      ];
    }
    protected function messengers()
    {
      return [
        'name.required'       => 'Yêu cầu điền tên tài khoản',
        'id_country.required' => 'Yêu cầu điền thông tin thành phố',
        'address.required'    => 'Yêu cầu điền địa chỉ ',
        'age.required'        => 'Yêu cầu điền số ngày',
        'email.required'      => 'Yêu cầu điền đúng dạng email',
        'email.email'         => 'Yêu cầu điền đúng dạng email',
        'password.required'   => 'Yêu cầu điền mật khẩu',
        'password.min'        => 'Yêu cầu điền đầy đủ kí tự mật khẩu',
      ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\userService
     */
    public function index()
    {
       return $this->userService->index();
    }

    /**
     * Show the customẻ is disable
     *
     * @return \Illuminate\Http\userService
     */
    public function indexBan()
    {
        return $this->userService->indexBan();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\userService
     */
    public function show($id)
    {
        try {
          return $this->userService->show($id);
        } catch (\Exception $e) {
          abort('404',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\userService
     */
    public function update(Request $request, $id)
    {

        $this->validator($request->all())->validate();
        $this->userService->update($request, $id);
        try {

        } catch (\Exception $e) {
          abort('404',$e->getMessage());
        }
        return redirect()->route('staff.show',['staff'=>$id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\userService
     */
     public function destroy($id)
     {
         if(!isset($_GET['status']))
         {
           return userService::json(['errors'=>'Thao tác không thành công']);
         }
         return $this->userService->destroy($id,$_GET['status']);
     }

     /*Method to create role for user
     */
    public function attachToRole(Request $request, $id)
    {
        return $this->userService->attachToRole($request, $id);
    }
}
