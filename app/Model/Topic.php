<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Topic extends Model
{
  use ActionModel;
  protected $table = 'topic';
  protected $fillable = ['id','img','content','type','id_admin','status','online'];

  public function getTopic($type)
  {
    return $this->where([
      'status' => 1,
      'type' => $type
    ]);
  }
  public function getTopicOnline($type)
  {
      return $this->getTopic($type)->where([
          'online' =>1
      ])->get();
  }

  public function setTopic($data,$user)
  {
    // //check exit topic
    $data['status'] = 1;
    $topic = $this->where($data)->first();
    if($topic->online){
        //change value of topic was used


       $result= $topic->update([
            'online'   => 0,
            'id_admin' => $user->id
        ]);
    }else {
        $result= $topic->update([
            'online' => 1,
            'id_admin' => $user->id
        ]);
    }



    return $result;

  }


}
