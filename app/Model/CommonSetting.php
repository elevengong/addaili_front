<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommonSetting extends Model
{
    protected $table = 'common_setting';
    protected $primaryKey = 'common_set_id';
    public $timestamps = false;
}
