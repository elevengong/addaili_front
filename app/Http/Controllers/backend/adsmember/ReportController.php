<?php

namespace App\Http\Controllers\backend\adsmember;

use App\Model\Setting;
use App\Model\SumAds;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class ReportController extends CommonController
{
    public function report(Request $request){
        $commonSetting = $this->commonSetting;
        $allSettingArray = Setting::select('set_id','settinggroup','remark')->orWhere('settinggroup','adsType')->orWhere('settinggroup','countType')->where('status',1)->orderBy('set_id','asc')->get()->toArray();
        $settingArray = array();
        $adsTypeArray = array();
        $countTypeArray = array();
        foreach($allSettingArray as $setting)
        {
            $settingArray[$setting['set_id']] = $setting['remark'];
            if($setting['settinggroup'] == 'adsType')
            {
                $adsTypeArray[] = $setting;
            }elseif($setting['settinggroup'] == 'countType')
            {
                $countTypeArray[] = $setting;
            }
        }
        //print_r($settingArray);exit;

        $stime = !empty(request()->input('stime')) ? request()->input('stime'):date('Y-m-d',time());
        $etime = !empty(request()->input('etime')) ? request()->input('etime'):date('Y-m-d',time());
        $adstype = request()->input('adstype');
        $counttype = request()->input('counttype');
        $keyword = request()->input('keyword');

        $commissionArray = SumAds::select('sum_ads.*','ads.ads_name','ads.ads_type','ads.ads_count_type')->where('sum_ads.adsmember_id',session('ads_id'))->where('sum_ads.spant','!=',0)
            ->leftJoin('ads',function ($join){
                $join->on('ads.ads_id','=','sum_ads.ads_id');
            })
            ->where(function($query) use($request){
                $stime = !empty(request()->input('stime')) ? request()->input('stime'):date('Y-m-d',time());
                $etime = !empty(request()->input('etime')) ? request()->input('etime'):date('Y-m-d',time());
                $adstype = request()->input('adstype');
                $counttype = request()->input('counttype');
                $keyword = request()->input('keyword');
                if(!empty($stime) and !empty($etime) and $stime == $etime)
                {
                    $query->where('sum_ads.date',$stime);
                }

                if(!empty($stime) and $stime != $etime)
                {
                    $query->where('sum_ads.date','>=',$stime);
                }

                if(!empty($etime) and $stime != $etime)
                {
                    $query->where('sum_ads.date','<=',$etime);
                }

                if(!empty($adstype))
                {
                    $query->where('ads.ads_type',$adstype);
                }

                if(!empty($counttype))
                {
                    $query->where('ads.ads_count_type',$counttype);
                }

                if(!empty($keyword))
                {
                    $query->where('sum_ads.ads_id',$keyword);
                }


            })->orderBy('sum_ads.date','ASC')
            ->paginate($this->backendPageNum);

        $totalSpent = 0;
        foreach ($commissionArray as $com)
        {
            $totalSpent = $totalSpent + $com['spant'];
        }

        return view('backend.adsmember.report',compact('commonSetting','settingArray','adsTypeArray','countTypeArray','stime','etime','adstype','counttype','keyword','commissionArray','totalSpent'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }
}
