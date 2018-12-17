<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Comment extends Model
{
    use ActionModel;

    protected $fillable = ['id_post','id_user','type','content','admin'];
    protected $table = 'comments';

    
}
