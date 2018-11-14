<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\CustomerDetail;

class Customer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $table = 'customer';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function checkExists($data)
    {
      return self::where($data)->first();
    }
    public function getAll()
    {
      return self::where(['status' => 1])->get();
    }
    public function getbyIdOrfind($id = '',array $data=[])
    {
      if ($id == '') {
        return self::where($data)->get();
      }
      else {

        return self::find($id);
      }
    }
    public function detail()
    {
      return $this->belongsTo('App\Model\CustomerDetail','id','id');
    }
    public function DeleteOrGet($id,$status)
    {

      try {
          if(self::find($id))
          {
            $customer = $this->where('id',$id)->update(['status'=>$status]);
            return $id;
          }
      } catch (\Exception $e) {
        return false;
      }

    }


}
