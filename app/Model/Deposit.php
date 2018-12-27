<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'deposit';
    protected $primaryKey = 'deposit_id';
    //public $timestamps = '';

    protected $fillable = ['deposit_id','member_id','order_no','money','type','bank','account_number','account_name','payer_account_name','deposit_time','pay_ip','status','remark','created_at','updated_at'];


}
