<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DepositInfo extends Model
{
    protected $table = 'deposit_info';
    protected $primaryKey = 'deposit_info_id';
    //public $timestamps = '';

    protected $fillable = ['deposit_info_id','type','username','bank_name','account_number','status','created_at','update_at'];


}
