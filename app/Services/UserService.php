<?php
 namespace App\Services;

 use Auth;
 use Response;
 use App\Traits\StorageFunction;
 use App\Model\Role;
 use App\Model\RoleUser;
 use App\User;
 use App\Model\UserDetail;
 use App\Interfaces\UserServiceInterface;
 use Illuminate\Support\Facades\Validator;
 /**
  *
  */
 class UserService implements UserServiceInterface
 {
   use StorageFunction;

   private $image = 'default-user.png';

   function __construct(User $staff,UserDetail $detail)
   {
     $this->staff = $staff;
     $this->detail = $detail;
   }

   public function index()
   {
     $list = $this->staff->getAll();
     $user = Auth::user();

     return View('admin.staff.staff-list')
                ->with([
                  'list' => $list,
                  'user' => $user,
                  'role' => Role::all(),
                ]);
   }

   /*Method to show all staff was disable
   */
   public function indexBan()
   {

     $staff = $this->staff->getBan();

     return view('admin.staff.staff-trash')
                  ->with(
                    [
                      'list' => $staff,
                      'user'    => Auth::user(),
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
     $errors = 'Tài khoản không tồn tại !';
     return view('errors.notfound')->with(['errors'=>$errors]);

   }

   public function update($request, $id){

     $user = Auth::user();
     // If the detail wasn't isset then $image was đefaul
     try {
        $image = $user->detail->img;
     } catch (\Exception $e) {
       $image = $this->image;
     }
     //if Has file image , the new avatar will be update
     if($request->file)
     {
      $flage = $this->hasImage($request->file);

      if($flage)
      {
        $flage = $this->putFile('public',$request->file);
      }

      $image = ($flage) ? $flage['name'] : $image;
     }

     $detail = [
       'id'       => $user->id,
       'address'  => $request->address,
       'age'      => $request->age,
       'phone'    => $request->phone,
       'sex'      => $request->sex,
       'passport' => $request->passport,
       'id_country' => $request->id_country,
       'img'    => $image
     ];

     $data = [
      'id'    => $user->id,
      'name'  => $request->name,
      'email' =>$request->email,
      ];

      $this->detail->updateOrCreateNew($detail);
      $this->staff->updateOrCreateNew($data);

    return redirect()->route('staff.show',['staff'=>$id]);


   }
   public function destroy($id,$staus){

     $staff = $this->staff->DeleteOrGet($id,$staus);
     if(!$staff)
     {
       return Response::json(['errors'=>'Thao tác không thành công']);
     }
     return response()->json($staff);

   }
   public function attachToRole($request, $id)
   {
     $user = $this->staff->getbyIdOrfind($id);
     $role = Role::find($request->roleIn);
     if(!$role)
     {
       return response()->json($value = false);
     }


     try {
       if($user->role)
       {
         $user->role->where([
            'user_id' => $id,
         ])
         ->update([
           'role_id' => $request->roleIn
         ]);
       }
       else
       {
         $user->attachRole($role);
       }

     } catch (\Exception $e) {
       return response()->json($value = false);
     }

     $view = view('admin.staff.staff-list-render')
                    ->with([
                      'list' => $this->staff->getAll(),
                      'role'  => Role::all()
                    ])
                    ->render();

     return response()->json($view);
   }
 }
