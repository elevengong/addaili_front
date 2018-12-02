<?php

namespace App\Http\Controllers\backend\adsmember;

use App\Http\Controllers\backend\CommonController;
use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends CommonController
{
    public function index(){
        return view('backend.adsmember.index');
    }
}
