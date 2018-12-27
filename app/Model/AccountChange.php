<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountChange extends Model
{
    protected $table = 'account_change';
    protected $primaryKey = 'id';
    //public $timestamps = '';

    protected $fillable = ['id','memberId','acType','moreorless','balanceBeforeChange','balance','remark','details','time','relateId','created_at','updated_at'];
}
