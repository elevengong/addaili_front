<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $primaryKey = 'set_id';

    public $timestamps = false;
    //protected $fillable = ['set_id','pwd','type','qq','balance','frozen','status','login_ip','lastlogined_at'];
}
