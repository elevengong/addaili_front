<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';
    protected $primaryKey = 'id';
    //public $timestamps = '';

    protected $fillable = ['id','ads_id','settinggroup','image','tag','status','created_at','updated_at'];
}
