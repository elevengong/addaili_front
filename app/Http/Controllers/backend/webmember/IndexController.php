<?php

namespace App\Http\Controllers\backend\webmember;

use App\Http\Controllers\backend\CommonController;
use App\Model\Ads;
use App\Model\Member;
use App\Model\MemberBalance;
use App\Model\Message;
use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends CommonController
{
    public function index(){
        $commonSetting = $this->commonSetting;
        $webmaster = Member::find(session('webmaster_id'))->toArray();
        $memberBalance = MemberBalance::where('id',session('webmaster_id'))->get()->toArray();
        $lastestMessage = Message::where('member_type',2)->where('status',1)->orderBy('created_at','desc')->take(1)->get()->toArray();
        return view('backend.webmember.index',compact('memberBalance','webmaster','lastestMessage','commonSetting'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
    }






}
