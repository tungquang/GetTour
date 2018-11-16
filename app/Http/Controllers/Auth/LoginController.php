<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;

class LoginController extends Controller
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
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

      $this->validator($request->all())->validate();

      $flag = $this->user->checkExists([
        'email' => $request->email,
        'status' => 1,
        ]);

      if($flag)
      {
        if (Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
          $id = User::where('email',$request->email)->first()->id;
          return redirect($this->redirectTo);
        }
      }

      return redirect()->back()->withInput($request->only('email','remember'));
    }


}
