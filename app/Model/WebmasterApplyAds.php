<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebmasterApplyAds extends Model
{
    protected $table = 'webmaster_apply_ads';
    protected $primaryKey = 'webmaster_ads_id';

    protected $fillable = ['webmaster_ads_id','webmaster_id','name','ads_type','ads_count_type','created_at','updated_at'];
}
