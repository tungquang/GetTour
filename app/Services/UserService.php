<?php
 namespace App\Services;

 use App\Interfaces\UserServiceInterface;
 use Illuminate\Support\Facades\Validator;
 use Response;
 use Auth;
 use App\User;
 use App\Model\UserDetail;
 /**
  *
  */
 class UserService implements UserServiceInterface
 {

   function __construct(User $staff,UserDetail $detail)
   {
     $this->staff = $staff;
     $this->detail = $detail;
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
     $errors = 'Tài khoản không tồn tại !';
     return view('errors.notfound')->with(['errors'=>$errors]);

   }
   public function update($request, $id){

     $this->validator($request->all(),$this->rulesDetail())->validate();

     $detail = [
       'id'       => $id,
       'address'  => $request->address,
       'age'      => $request->age,
       'phone'    => $request->phone,
       'sex'      => $request->sex,
       'passport' => $request->passport,
       'id_country' => $request->id_country
     ];

     $data = [
      'id'    => $id,
      'name'  => $request->name,
      'email' =>$request->email,
      ];
      
      $this->detail->updateOrCreateNew($detail);
      $this->staff->updateOrCreateNew($data);

    return redirect()->route('staff.show',['staff'=>$id]);


   }
   public function destroy($id){

     $staff = $this->staff->DeleteOrGet($id,0);
     if(!$staff)
     {
       return Response::json(['errors'=>'Thao tác không thành công']);
     }
     return response()->json($staff);

   }
 }
