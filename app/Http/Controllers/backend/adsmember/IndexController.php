<?php

namespace App\Http\Controllers\backend\adsmember;

use App\Http\Controllers\backend\CommonController;
use App\Model\Ads;
use App\Model\Member;
use App\Model\MemberBalance;
use App\Model\Setting;
use App\Model\SumAds;
use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends CommonController
{
    public function index(Request $request){
        $commonSetting = $this->commonSetting;
        $adsCountTypeArray = Setting::where('settinggroup','countType')->where('status',1)->get()->toArray();

        $memberBalance = @MemberBalance::where('id',session('ads_id'))->get()->toArray();
        $member = Member::find(session('ads_id'))->toArray();
        $countAds = Ads::where('member_id',session('ads_id'))->where('status',1)->count();

        $yesterdayDate = date("Y-m-d",strtotime("-1 day"));
        $adsArray = Ads::select('ads_id')->where('member_id',session('ads_id'))->get()->toArray();

        $adsIdArray = array();
        foreach ($adsArray as $ads)
        {
            $adsIdArray[] = $ads['ads_id'];
        }
        //计算昨天花费
        $yesterdaySpent = SumAds::where('date',$yesterdayDate)->whereIn('ads_id',$adsIdArray)->sum('spant');
        //print_r($yesterdaySpent);

        //计算本月总花费
        $thisMonthFirstDay = date('Y-m',time())."-01";
        $thisMonthTotalSpentArray = SumAds::where('date','>=',$thisMonthFirstDay)->whereIn('ads_id',$adsIdArray)->get()->toArray();
        $thisMonthTotalSpent = 0;
        foreach($thisMonthTotalSpentArray as $sum)
        {
            $thisMonthTotalSpent = $thisMonthTotalSpent + $sum['spant'];
        }

        //最近7或15天收入 strtotime('-7 days')  获得的是时间戳
        $cycle_time = request()->input('cycle_time');
        $cycle_time = isset($cycle_time)?$cycle_time:7;
        $startDate =  date('Y-m-d',strtotime('-'.$cycle_time.' days'));
        $endDate = date('Y-m-d',strtotime('-1 days'));

        $ads_count_type = request()->input('ads_count_type');
        $ads_count_type = isset($ads_count_type)?$ads_count_type:0;
        if($ads_count_type!=0)
        {
            $adsArray = Ads::select('ads_id')->where('member_id',session('ads_id'))->where('ads_count_type',$ads_count_type)->get()->toArray();

            $adsIdArray = array();
            foreach ($adsArray as $ads)
            {
                $adsIdArray[] = $ads['ads_id'];
            }
        }
        //print_r($adsIdArray);

        $recentSumAdsArray = SumAds::where('date','>=',$startDate)->where('date','<=',$endDate)->whereIn('ads_id',$adsIdArray)->orderBy('date','desc')->get()->toArray();

        $recentDate = array();
        for($i=$cycle_time;$i>=1;$i--)
        {
            $date = date('Y-m-d',strtotime('-'.$i.' days'));
            $recentDate[$date] = 0;
        }
        foreach($recentSumAdsArray as $recent)
        {
            $recentDate[$recent['date']] = $recentDate[$recent['date']] + $recent['spant'];
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



        //----------获取本月收入
        $thisMonthFirstDay = date('Y-m',time())."-01";
        //$thisMonthSumSpent = SumAds::

        return view('backend.adsmember.index',compact('memberBalance','member','countAds','commonSetting','yesterdaySpent','thisMonthTotalSpent','recentDateJson','adsCountTypeArray','ads_count_type','cycle_time'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }






}
