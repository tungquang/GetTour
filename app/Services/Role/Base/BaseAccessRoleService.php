<?php
namespace App\Services\Role\Base;

use Auth;
use App\Model\Permission;
use App\Model\PermissionRole;
/**
 *
 */
abstract class BaseAccessRoleService
{
    protected $object;

    protected function user()
    {
        return Auth::user();
    }
    protected function permission()
    {
        return new Permission();
    }
    protected function permissionRole()
    {
        return new PermissionRole();
    }

    protected function checkExitsPremission($id)
    {
        $permission = $this->permission()->find($id);
        if(!$permission)
        {
          throw new \Exception("Permission not found", 1);
        }
        return $permission;
    }

    protected function detachPermission($request, $role)
    {
        if(!$request->permissionOut)
        {
          throw new \Exception("Permissin not exit", 1);
        }
        $permissionOut  = $this->checkExitsPremission($request->permissionOut);
        if($permissionOut && $this->hasPermisson($role->id,$request->permissionOut)){
            $role->detachPermission($permissionOut);
        }
    }
    protected function attachPermission($request, $role)
    {
        if(!$request->permissionIn)
        {
          throw new \Exception("Permissin not exit", 1);
        }
        $permissionIn = $this->checkExitsPremission($request->permissionIn);

        if($permissionIn && !$this->hasPermisson($role->id,$request->permissionIn)){
            $role->attachPermission($permissionIn);
        }
    }

    private function hasPermisson($id,$permission_id)
    {
        $role = $this->checkExitsRole($id);
        $this->checkExitsPremission($permission_id);

        $permission = $role->permission()
                           ->where(['permission_id' => $permission_id])
                           ->first();
        if(!is_null($permission))
        {
          return true;
        }
        return false;
    }

    protected function checkExitsRole($id)
    {
      $role = $this->role->find($id);
      if(!$role)
      {
        throw new \Exception("Permission not found", 1);
      }
      return $role;
    }

}
