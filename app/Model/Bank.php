<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';
    protected $primaryKey = 'bank_id';
    public $timestamps = false;

    protected $fillable = ['bank_id','bank_name','status'];
}
