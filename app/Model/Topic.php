<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Topic extends Model
{
  use ActionModel;
  protected $table = 'topic';
  protected $fillable = ['id','img','content','type','id_admin','status','online'];

  public function home()
  {
    return $this->where([
      'status' => 1,
      'online'  => '1'
    ]);
  }

  public function tour()
  {
    return $this->where([
      'status' => 1,
      'type'   => 'tour',
      'online'  => '1'
    ]);
  }

  public function hotel()
  {
    return $this->where([
      'status' => 1,
      'type'   => 'hotel',
      'online'  => '1'
    ]);
  }

  public function travel()
  {
    return $this->where([
      'status' => 1,
      'type'   => 'travel',
      'online'  => '1'
    ]);
  }

  public function contact()
  {
    return $this->where([
      'status' => 1,
      'type'   => 'contact',
      'online'  => '1'
    ]);
  }

  public function setTopic($data,$user)
  {
    // //check exit topic
    $data['status'] = 1;
    $topic = $this->where($data);
    //change value of topic was used
    $topicFirst = $this->where([
      'online' => 1,
      'status' => 1,
      'type'   => $data['type']
    ]);
    $topicFirst->update([
      'online'   => 0,
      'id_admin' => $user->id
    ]);

    return $topic->update([
      'online' => 1,
      'id_admin' => $user->id
    ]);

  }


}
