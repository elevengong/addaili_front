<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WithdrawInfo extends Model
{
    protected $table = 'withdraw_info';
    protected $primaryKey = 'withdraw_info_id';
//    public $timestamps = false;

    protected $fillable = ['withdraw_info_id','webmember_id','bank_id','bank_branch','account_name','bank_number','province_id','created_at','updated_at'];
}
