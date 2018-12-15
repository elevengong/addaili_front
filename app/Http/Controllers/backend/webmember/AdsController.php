<?php

namespace App\Http\Controllers\backend\webmember;

use App\Model\Ads;
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
        if($request->isMethod('post')){

        }else{
            $allAdsArray = WebmasterApplyAds::where('webmaster_id',session('webmaster_id'))->orderBy('created_at','desc')->paginate($this->backendPageNum);
            $allSettingArray = Setting::select('set_id','remark')->orWhere('settinggroup','adsType')->orWhere('settinggroup','countType')->where('status',1)->orderBy('set_id','asc')->get()->toArray();
            $settingArray = array();
            foreach($allSettingArray as $setting)
            {
                $settingArray[$setting['set_id']] = $setting['remark'];
            }

            return view('backend.webmember.list_managementads',compact('allAdsArray','settingArray','commonSetting'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
        }

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

    public function getadscode(){
        $commonSetting = $this->commonSetting;
        return view('backend.webmember.getadscode',compact('commonSetting'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
    }

}
