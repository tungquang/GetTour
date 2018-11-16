<?php
 namespace App\Services;

 use App\Interfaces\UserServiceInterface;
 use Illuminate\Support\Facades\Validator;
 use Response;
 use Auth;
 use App\User;
 /**
  *
  */
 class UserService implements UserServiceInterface
 {

   function __construct(User $staff)
   {
     $this->staff = $staff;
   }
   protected function validator(array $data,$rules)
   {
     return Validator::make($data,$rules);
   }
   protected function rulesAccount()
   {
     return [
       'email' => 'required|string|email|max:255',
       'name'  => 'required|string|min:4',
       'password' => 'required|string|min:6',

      ];
   }
   protected function rulesDetail()
   {
     return [
       'id'       => 'required',
       'address'  => 'required',
       'age'      => 'required',
       'phone'    => 'required|min:9',
       'passport' => 'required|min:9',
       'id_country' => 'required',
     ];
   }
   public function index()
   {
     $list = $this->staff->getAll();
     $user = Auth::user();

     return View('admin.staff.staff-list')
                ->with([
                  'list' => $list,
                  'user' => $user,
                ]);
   }
   // public function store(Request $request);
   public function show($id)
   {
     $staff = $this->staff->getbyIdOrfind($id);
     $user = Auth::guard()->user();

     if ($staff) {

       return view('admin.staff.profile')
                       ->with(
                         [
                           'staff' => $staff,
                           'user'     => $user,
                       ]);

     }
     $errors = ['account' => 'Tài khoản không tồn tại !'];
     return Response::json(['erros' => $errors]);
   }
   public function update($request, $id){

   }
   public function destroy($id){
     dd('xx');
   }
 }
