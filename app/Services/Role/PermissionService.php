<?php
namespace App\Services\Role;

use App\Interfaces\PermissionServiceInterface;
use App\Model\Permission;
use App\Model\Role;
/**
 *@return App\Http\Controllers\PermissionController
 */
class PermissionService implements PermissionServiceInterface
{
  function __construct(Permission $permission,Role $role)
  {
      $this->permission = $permission;
      $this->role = $role;
  }
  /* @return App\Http\Controller\PermissionController
  *  Method to creaate new permission
  * The new permission is must add to "Own" role after create
  * The own had name is own
  */
  public function store($request)
  {
      $per = $this->permission->create($request->all());
      $role = $this->role->where(['name' => 'own'])->first();
      $role->attachPermission($per);
  }
  public function update($request,$id)
  {
    $per = $this->permission->update($request->all());
    if(!$per)
    {
      throw new \Exception("Not found permission", 1);
    }
  }
  public function destroy($id)
  {
    return $id;
  }
}
