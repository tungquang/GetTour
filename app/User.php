<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\ActionModel;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Model\RoleUser;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    use ActionModel;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function detail()
    {
      return $this->belongsTo('App\Model\UserDetail','id','id');
    }
    public function role()
    {
      return $this->belongsTo('App\Model\RoleUser','id','user_id');
    }
    public function checkExists($data)
    {
      return self::where($data)->first();
    }
}
