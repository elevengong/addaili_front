<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $primaryKey = 'msg_id';

    public $timestamps = false;
    //protected $fillable = ['set_id','pwd','type','qq','balance','frozen','status','login_ip','lastlogined_at'];
}
