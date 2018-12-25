<?php
namespace App\Services\Role;


use Response;
use App\Model\Role;
use App\Services\Role\Base\BaseAccessRoleService;
use App\Interfaces\RoleServiceInterface;
/**
 * @return App\Http\Controller\RoleController
 */
class RoleService extends BaseAccessRoleService implements RoleServiceInterface
{

    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    /* Method to show all role and permission
    *
    */
    public function index()
    {
        return view('admin.role.role-list')->with([
              'role'       => $this->role->all(),
              'user'       => $this->user(),
              'permission' => $this->permission()->all()
        ]);
    }
    /*Method to create new r//
    *
    */
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
          throw new \Exception("Role has exit", 1);
        }
    }
    public function update($request, $id)
    {
        $this->permissionIn = '0';
        return response()->json($id);
    }
    /*
    * @Method to add a new Permission to Role
    */
    public function attachToPermission($request, $id)
    {
        $role = $this->checkExitsRole($id);
        /*To delete role and relatioship with user
        */
        try {
            $this->detachPermission($request,$role);
        } catch (\Exception $e) {
            //don't do things
        }
        try {
            /*To create new relatioship Role with User
            */
            $this->attachPermission($request,$role);
        } catch (\Exception $e) {
          //don't do things
        }
        $view = view('admin.role.role-list-render')->with([
              'role'       => $this->role->all(),
              'permission' => $this->permission()->all()
        ])->render();
        return response()->json($view);
    }
    /*
    * Method to delete realtionship with role
    * If role is own the method will return false
    */
    public function destroy($id)
    {
        $role = $this->checkExitsRole($id);
        // If role is own the method is not work
        if($role->name == 'own')
        {
            throw new \Exception("Role can't delete", 1);
        }
        // Regular Delete
        $this->role->destroy($id);
        // Force Delete
        $role->users()->sync([]); // Delete relationship data
        $role->perms()->sync([]); // Delete relationship data
          // $role->forceDelete(); // Now force delete will work regardless of whether the pivot table has cascading delete
        $view = view('admin.role.role-list-render')->with([
              'role'       => $this->role->all(),
              'permission' => $this->permission()->all()
        ])->render();
        return $view;

    }



}
