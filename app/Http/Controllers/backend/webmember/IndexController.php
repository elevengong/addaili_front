<?php

namespace App\Http\Controllers\backend\webmember;

use App\Http\Controllers\backend\CommonController;
use App\Model\Ads;
use App\Model\Member;
use App\Model\MemberBalance;
use App\Model\Message;
use App\Model\SumSpace;
use App\Model\WebmasterApplyAds;
use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends CommonController
{
    public function index(Request $request){
        if($request->isMethod('post')){

        }else{
            $commonSetting = $this->commonSetting;
            $webmaster = Member::find(session('webmaster_id'))->toArray();
            $memberBalance = MemberBalance::where('id',session('webmaster_id'))->get()->toArray();
            $lastestMessage = Message::where('member_type',2)->where('status',1)->orderBy('created_at','desc')->take(1)->get()->toArray();

            //----------获取本月收入 注意：以后要加上推广提成
            //---获取当月日期
            $thisMonthFirstDay = date('Y-m',time())."-01";

            $adsSpaceArray = WebmasterApplyAds::select('webmaster_ads_id')->where('webmaster_id',session('webmaster_id'))->get()->toArray();
            $adsSpaceIdArray = array();
            foreach ($adsSpaceArray as $ads)
            {
                $adsSpaceIdArray[] = $ads['webmaster_ads_id'];
            }
            $sumSpaceArray = SumSpace::where('date','>=',$thisMonthFirstDay)->whereIn('space_id',$adsSpaceIdArray)->orderBy('date','desc')->get()->toArray();
            $thisMonthSumEarn = 0;
            foreach($sumSpaceArray as $sum)
            {
                $thisMonthSumEarn = $thisMonthSumEarn + $sum['earn'];
            }
            //echo $thisMonthSumEarn;exit;
            //最近7天收入 strtotime('-7 days')  获得的是时间戳

        }

        return view('backend.webmember.index',compact('memberBalance','webmaster','lastestMessage','commonSetting','thisMonthSumEarn'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
    }






}
