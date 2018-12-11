<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WithdrawOrder extends Model
{
    protected $table = 'withdraw_order';
    protected $primaryKey = 'withdraw_id';
    //public $timestamps = '';

    protected $fillable = ['withdraw_id','member_id','withdraw_info_id','order_no','money','status','remark','apply_withdraw_ip','created_at','updated_at'];
}
