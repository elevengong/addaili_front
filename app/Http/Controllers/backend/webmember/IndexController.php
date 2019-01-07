<?php

namespace App\Http\Controllers\backend\webmember;

use App\Http\Controllers\backend\CommonController;
use Illuminate\Support\Facades\Redis;

use App\Model\Ads;
use App\Model\Member;
use App\Model\MemberBalance;
use App\Model\Message;
use App\Model\Setting;
use App\Model\SumSpace;
use App\Model\WebmasterApplyAds;
use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends CommonController
{
    public function index(Request $request){
        $commonSetting = $this->commonSetting;
        $adsTypeArray = Setting::where('settinggroup','adsType')->where('status',1)->get()->toArray();

        $webmasterTodayEarn = Redis::get('field-webmaster_adspace_earn-total_earn-8');


        $cycle_time = request()->input('cycle_time');
        $cycle_time = isset($cycle_time)?$cycle_time:7;

        $webmaster = Member::find(session('webmaster_id'))->toArray();
        $memberBalance = MemberBalance::where('id',session('webmaster_id'))->get()->toArray();
        $lastestMessage = Message::where('member_type',2)->where('status',1)->orderBy('created_at','desc')->take(1)->get()->toArray();

        //----------获取本月收入 注意：以后要加上推广提成
        //---获取当月日期

        $thisMonthFirstDay = date('Y-m',time())."-01";

        $ads_type = request()->input('ads_type');
        $ads_type = isset($ads_type)?$ads_type:0;
        $ads_space_id = request()->input('ads_space_id');
        $ads_space_id = isset($ads_space_id)?$ads_space_id:'';

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
        $adsSpaceArray = WebmasterApplyAds::select('webmaster_ads_id')
            ->where(function($query) use($request){
                $query->where('webmaster_id',session('webmaster_id'));
                $ads_space_id = request()->input('ads_space_id');
                $ads_space_id = isset($ads_space_id)?$ads_space_id:'';
                if(!empty($ads_space_id))
                {
                    $query->where('webmaster_ads_id',$ads_space_id);
                }

                $ads_type = request()->input('ads_type');
                $ads_type = isset($ads_type)?$ads_type:0;
                if($ads_type != 0)
                {
                    $query->where('ads_type',$ads_type);
                }
            })
            ->get()->toArray();
        $adsSpaceIdArray = array();
        foreach ($adsSpaceArray as $ads)
        {
            $adsSpaceIdArray[] = $ads['webmaster_ads_id'];
        }
        $startDate =  date('Y-m-d',strtotime('-'.$cycle_time.' days'));
        $endDate = date('Y-m-d',strtotime('-1 days'));
        $recentSumSpaceArray = SumSpace::where('date','>=',$startDate)->where('date','<=',$endDate)->whereIn('space_id',$adsSpaceIdArray)->orderBy('date','desc')->get()->toArray();
        //print_r($recentSumSpaceArray);exit;
        $recentDate = array();
        for($i=$cycle_time;$i>=1;$i--)
        {
            $date = date('Y-m-d',strtotime('-'.$i.' days'));
            $recentDate[$date] = 0;
        }
        foreach($recentSumSpaceArray as $recent)
        {
            $recentDate[$recent['date']] = $recentDate[$recent['date']] + $recent['earn'];
        }
        $recentDateData = array();
        $j=0;
        foreach($recentDate as $v => $data)
        {
            $recentDateData[$j]['date'] = $v;
            $recentDateData[$j]['value'] = $data;
            $j++;
        }
        $recentDateJson = json_encode($recentDateData);

        return view('backend.webmember.index',compact('memberBalance','webmaster','lastestMessage','commonSetting','thisMonthSumEarn','recentDateJson','cycle_time','adsTypeArray','ads_type','ads_space_id','webmasterTodayEarn'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
    }






}
