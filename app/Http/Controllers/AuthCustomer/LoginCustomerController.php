<?php

namespace App\Http\Controllers\AuthCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class LoginCustomerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/customer';

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('customer')->except('logout');

    }

    public function loginCustomer(Request $request)
    {
        $this->validator($request->all())->validate();


        if (Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
          return redirect($this->redirectTo);
        }
        return redirect()->back()->withInput($request->only('email','remember'));


    }

    public function showFormCustomerLogin()
    {
      return view('authcustomer.login');
    }
    public function logoutCustomer()
    {
      return Auth::guard('customer')->logout();
    }


}
