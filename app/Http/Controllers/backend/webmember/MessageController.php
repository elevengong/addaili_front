<?php

namespace App\Http\Controllers\backend\webmember;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class MessageController extends CommonController
{
    public function lists(){
        return view('backend.webmember.list_message')->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
    }
}
