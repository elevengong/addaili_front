<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SettingGroup extends Model
{
    protected $table = 'setting_group';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
