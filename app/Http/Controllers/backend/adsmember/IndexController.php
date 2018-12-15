<?php

namespace App\Http\Controllers\backend\adsmember;

use App\Http\Controllers\backend\CommonController;
use App\Model\Ads;
use App\Model\Member;
use App\Model\MemberBalance;
use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends CommonController
{
    public function index(){
        $commonSetting = $this->commonSetting;
        $memberBalance = MemberBalance::where('id',session('ads_id'))->get()->toArray();
        $member = Member::find(session('ads_id'))->toArray();
        $countAds = Ads::where('member_id',session('ads_id'))->where('status',1)->count();
        return view('backend.adsmember.index',compact('memberBalance','member','countAds','commonSetting'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }






}
