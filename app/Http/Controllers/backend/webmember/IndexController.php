<?php

namespace App\Http\Controllers\backend\webmember;

use App\Http\Controllers\backend\CommonController;
use App\Model\Ads;
use App\Model\Member;
use App\Model\MemberBalance;
use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends CommonController
{
    public function index(){
        $webmaster = Member::find(session('webmaster_id'))->toArray();
        $memberBalance = MemberBalance::where('id',session('webmaster_id'))->get()->toArray();
        return view('backend.webmember.index',compact('memberBalance','webmaster'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
    }






}
