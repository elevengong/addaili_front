<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Websites extends Model
{
    protected $table = 'websites';
    protected $primaryKey = 'web_id';

    protected $fillable = ['web_id','member_id','web_name','domain','icp','webtype','status','created_at','updated_at'];
}
