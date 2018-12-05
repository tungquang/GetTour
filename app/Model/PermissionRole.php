<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
  protected $table = 'permission_role';
  protected $fillable = ['permission_id','role_id'];

  public static function checkExits($permission,$role)
  {
    return self::where([
                'permission_id'=>$permission,
                'role_id'=>$role
      ])->first();
  }
}
