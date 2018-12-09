<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';
    protected $primaryKey = 'ads_id';

    protected $fillable = ['ads_id','member_id','member_name','ads_name','ads_link','total_budget','daily_budget','per_cost','ismobile','ads_count_type','ads_type','more_setting','ads_photo','status','created_at','updated_at'];
}
