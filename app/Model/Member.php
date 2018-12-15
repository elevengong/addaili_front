<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'member_id';
    //public $timestamps = '';

    protected $fillable = ['parent_daili_id','name','pwd','type','qq','mobile','frozen','status','login_ip','lastlogined_at'];
}
