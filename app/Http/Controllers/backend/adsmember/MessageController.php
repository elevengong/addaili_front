<?php

namespace App\Http\Controllers\backend\adsmember;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class MessageController extends CommonController
{
    public function messagelist(){
        return view('backend.adsmember.list_message')->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }
}
