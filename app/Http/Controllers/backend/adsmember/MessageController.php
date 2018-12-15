<?php

namespace App\Http\Controllers\backend\adsmember;

use App\Model\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class MessageController extends CommonController
{
    public function messagelist(){
        $commonSetting = $this->commonSetting;
        $allMessageArray = Message::where('member_type',1)->where('status',1)->orderBy('created_at','desc')->paginate($this->backendPageNum);
        return view('backend.adsmember.list_message',compact('allMessageArray','commonSetting'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }
}
