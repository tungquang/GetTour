<?php
 namespace App\Services\User;

 use App\User;
 use App\Interfaces\UserServiceInterface;
 use Illuminate\Support\Facades\Validator;
 use App\Services\User\Base\BaseAccessUserService;
 /**
  *
  */
 class UserService extends BaseAccessUserService implements UserServiceInterface
 {
     function __construct(User $staff)
     {
        $this->staff = $staff;
     }

     public function index()
     {
         $list = $this->staff->getAll();
         return view('admin.staff.staff-list')->with([
              'list' => $list,
              'user' => $this->user(),
              'role' => $this->role()->get(),
         ]);
     }

     /*Method to show all staff was disable
     */
     public function indexBan()
     {
         $staff = $this->staff->getBan();
         return view('admin.staff.staff-trash')->with([
              'list' => $staff,
              'user' => $this->user(),
         ]);
     }

     /* Method to show detail user
     * If has permission user or id was Auth::user(), then show detail
     * Else alert
     */
     public function show($id)
     {
          $this->checkAccessPermission($id);
          return view('admin.staff.profile')->with([
                'staff'   => $this->user,
                'user'    => $this->user(),
                'cities'  => $this->city()->get()
          ]);
     }

     public function update($request, $id)
     {
         $this->checkExit($id);
         $detail = $request->except(['_method','_token','email','name','gender','photo']);
         $data = $request->only(['email','name']);
         // If the detail wasn't isset then $image was đefaul
         try {
            $this->UploadFile($request);
            if ($this->img !== '') {
              $detail['img'] = $this->img;
            }
         } catch (\Exception $e) {
           // To do next request
         }
         $detail['id'] = $this->user->id;
         $this->user->update($data);
         $this->detail()->updateOrCreateNew($detail);
     }
     public function destroy($id,$staus)
     {
         $staff = $this->staff->DeleteOrGet($id,$staus);
         if(!$staff)
         {
           return Response::json(['errors'=>'Thao tác không thành công']);
         }
         return response()->json($staff);
     }
     public function attachToRole($request, $id)
     {
        $role = $this->role()->find($request->roleIn);
        try {
          if ($this->checkExit($id) && $role) {
              if ($this->user->role) {
                    $this->user->role->where(['user_id' => $id])
                               ->update([
                          'role_id' => $request->roleIn
                    ]);
               } else {
                  $this->user->attachRole($role);
               }
             }
         } catch (\Exception $e) {
           return response()->json($value = false);
         }
         $view = view('admin.staff.staff-list-render')->with([
                'list' => $this->staff->getAll(),
                'role'  => $this->role()->get()
        ])->render();
        return response()->json($view);
     }
 }
