<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Comment1 extends Model
{
    use ActionModel;

    protected $fillable = ['id_comment','id_customer','content','admin'];
    protected $table = 'comments1';
}
