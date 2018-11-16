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

   public function index()
   {
     $list = $this->staff->all();
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

   }
   public function update($request, $id){

   }
   public function destroy($id){}
 }
