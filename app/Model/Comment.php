<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Comment extends Model
{
    use ActionModel;

    protected $fillable = ['id_post','id_user','type','content','admin'];
    protected $table = 'comments';

    public function user()
    {
      if($this->admin)
      {
        return $this->hasOne('App\User','id','id_user');
      }
      return $this->hasOne('App\Model\Customer','id','id_user');

    }
    public function getMore($object,$last,$limit = 2)
    {
      return $this->where($object)
                  ->where('id','>',$last)
                  ->limit($limit)
                  ->get();
    }



}
