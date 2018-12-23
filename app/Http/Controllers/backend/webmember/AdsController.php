<?php

namespace App\Http\Controllers\backend\webmember;

use App\Model\Ads;
use App\Model\CommonSetting;
use App\Model\Material;
use App\Model\Setting;
use App\Model\SettingGroup;
use App\Model\WebmasterApplyAds;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class AdsController extends CommonController
{
    public function managementadslist(Request $request){
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
        if($request->isMethod('post')){
            $allAdsArray = WebmasterApplyAds::where('webmaster_id',session('webmaster_id'))->orderBy('created_at','desc')
                ->where(function($query) use($request){

                    $query->where('webmaster_id',session('webmaster_id'));

                    $keywordId = request()->input('keywordId');
                    if(!empty($keywordId))
                    {
                        $query->where('webmater_ads_id',$keywordId);
                    }
                    $keywordName = request()->input('keywordName');
                    if(!empty($keywordName))
                    {
                        $query->where('name','like','%'.$keywordName.'%');
                    }
                    $adstype = request()->input('adstype');
                    if($adstype!=0)
                    {
                        $query->where('ads_type',$adstype);
                    }
                    $counttype = request()->input('counttype');
                    if($counttype!=0)
                    {
                        $query->where('ads_count_type',$counttype);
                    }
                })
                ->paginate($this->backendPageNum);



        }else{
            $allAdsArray = WebmasterApplyAds::where('webmaster_id',session('webmaster_id'))->orderBy('created_at','desc')->paginate($this->backendPageNum);
        }
        return view('backend.webmember.list_managementads',compact('allAdsArray','settingArray','commonSetting','adsTypeArray','countTypeArray'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $input['webmaster_id'] = session('webmaster_id');
            $input['name'] = request()->input('name');
            $input['ads_type'] = request()->input('ads_type');
            $input['ads_count_type'] = request()->input('ads_count_type');
            $input['status'] = 1;
            $res = WebmasterApplyAds::create($input);
            if ($res->webmaster_ads_id) {
                $data['status'] = 1;
                $data['msg'] = "广告位添加成功!";
            } else {
                $data['status'] = 0;
                $data['msg'] = "广告位添加失败!";
            }
            echo json_encode($data);
        }else{
            $commonSetting = $this->commonSetting;
            $adsTypeArray = Setting::where('settinggroup','adsType')->where('status',1)->get()->toArray();
            $countTypeArray = Setting::where('settinggroup','countType')->where('status',1)->get()->toArray();
            return view('backend.webmember.add_ads',compact('adsTypeArray','countTypeArray','commonSetting'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
        }
    }

    public function getadscode(Request $request,$webmaster_ads_id){
        $commonSetting = $this->commonSetting;
        $allSettingArray = Setting::select('set_id','settinggroup','remark')->orWhere('settinggroup','adsType')->orWhere('settinggroup','countType')->where('status',1)->orderBy('set_id','asc')->get()->toArray();
        $adsTypeArray = array();
        $countTypeArray = array();
        foreach($allSettingArray as $setting)
        {
            if($setting['settinggroup'] == 'adsType')
            {
                $adsTypeArray[$setting['set_id']] = $setting['remark'];
            }elseif($setting['settinggroup'] == 'countType')
            {
                $countTypeArray[$setting['set_id']] = $setting['remark'];
            }
        }

        //获取随机域名
        $domainArray = CommonSetting::where('name','ads_domain_url')->where('status',1)->get()->toArray();
        $domain = '';
        $countDomain = count($domainArray);
        if($countDomain == 1)
        {
            $domain = $domainArray[0]['value'];
        }else{
            $rand = rand(0,$countDomain-1);
            $domain = $domainArray[$rand]['value'];
        }
//        echo $domain;exit;
        $adsInfo = WebmasterApplyAds::where('webmaster_id',session('webmaster_id'))->where('webmaster_ads_id',$webmaster_ads_id)->get()->toArray();
        return view('backend.webmember.getadscode',compact('commonSetting','adsInfo','adsTypeArray','countTypeArray','domain'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
    }

}
