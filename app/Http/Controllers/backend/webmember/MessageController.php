<?php

namespace App\Http\Controllers\backend\webmember;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;
use App\Model\Message;

class MessageController extends CommonController
{
    public function lists(){
        $allMessageArray = Message::where('member_type',2)->where('status',1)->orderBy('created_at','desc')->paginate($this->backendPageNum);
        return view('backend.webmember.list_message',compact('allMessageArray'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
    }
}
