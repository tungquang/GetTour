<?php
namespace App\Services;
use App\Interfaces\RoleServiceInterface;
use App\Model\Role;
use Auth;
use App\Model\Permission;
use App\Model\PermissionRole;
use Response;


/**
 * @return App\Http\Controller\RoleController
 */
class RoleService implements RoleServiceInterface
{
  protected $permissionIn;
  protected $permissionOut;
  protected $roleIn;

  public function __construct(Role $role,Permission $permission)
  {
    $this->role = $role;
    $this->permission = $permission;
  }

  public function index()
  {
    $user = Auth::user();
    return view('admin.role.role-list')
              ->with([
                'role' => Role::all(),
                'user' => $user,
                'permission' => Permission::all(),
              ]);
  }

  public function store($request)
  {
    //format data
    $data = [
      'name'         => strtolower($request->name),
      'display_name' => $request->display_name,
      'description'  => $request->description,
    ];
    //check name role is exists
    if(!$this->role->createNew($data))
    {
      return view('errors.notfound');
    }

    return redirect()->route('role.index');
  }
  public function update($request, $id)
  {
    dd($request->all());
    $this->permissionIn = '0';
    return response()->json($id);
  }
  /*
  * @Method to add a new Permission to Role
  */
  public function attachToPermission($request, $id)
  {
    $this->permissionIn = $request->permissionIn;
    $this->permissionOut = $request->permissionOut;
    $this->roleIn = $id;

    $role = $this->role->find($this->roleIn);



    try {
      $role->attachPermission(
        $this->permission->find($this->permissionIn)
      );
      if($this->permissionOut)
      {
        $role->detachPermission(
          $this->permission->find($this->permissionOut)
        );
      }


      $view = view('admin.role.role-list-render')
                    ->with([
                      'permission' => Permission::all(),
                      'role'       => Role::all(),
                    ])
                    ->render();
      return response()->json($view);

    } catch (\Exception $e) {
      return response()->json($value = false);
    }

    return response()->json($role);
  }

  public function destroy($id)
  {


    try {
      $role = $this->role->findOrFail($id);
      // Regular Delete
      $this->role->destroy($id);

      // Force Delete
      $role->users()->sync([]); // Delete relationship data
      $role->perms()->sync([]); // Delete relationship data

      $role->forceDelete(); // Now force delete will work regardless of whether the pivot table has cascading delete

    } catch (\Exception $e) {
      return response()->json($value = false);
    }

    $view = view('admin.role.role-list-render')
                  ->with([
                    'permission' => Permission::all(),
                    'role'       => Role::all(),
                  ])
                  ->render();

    return response()->json($view);
  }
  private function exits()
  {
    return PermissionRole::checkExits($this->permissionOut,$this->roleIn);
  }


}
