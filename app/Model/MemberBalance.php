<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberBalance extends Model
{
    protected $table = 'member_balance';
    //protected $primaryKey = 'member_id';
    public $timestamps = false;

    protected $fillable = ['id','balance'];
}
