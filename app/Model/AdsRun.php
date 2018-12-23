<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdsRun extends Model
{
    protected $table = 'ads_run';
    //protected $primaryKey = 'bank_id';
    public $timestamps = false;
    
    protected $fillable = ['id'];
}
