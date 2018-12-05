<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
  protected $table = 'role_user';
  protected $fillable = ['user_id','role_id'];
  public $timestamps = false;

  public static function checkExits($user,$role)
  {
    return self::where([
                'user_id'=>$user,
                'role_id'=>$role
      ])->first();
  }
  public function roleName()
  {
    return $this->belongsTo('App\Model\Role','role_id','id');
  }
}
