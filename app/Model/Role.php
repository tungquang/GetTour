<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
use App\Model\Permission;
use App\Model\PermissionRole;

class Role extends EntrustRole
{
  protected $table = 'roles';
  protected $fillable = ['name','description','display_name'];

  public function createNew($data)
  {
    $role = $this->where(['name' => $data['name']])->first();
    if($role){
      return false;
    }
    return $this->create($data);
  }

  public function permission()
  {
    return $this->belongsToMany(Permission::class);
  }


}
