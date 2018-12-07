<?php

namespace App\Http\Controllers\backend\adsmember;

use App\Model\Setting;
use App\Model\SettingGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class AdsController extends CommonController
{
    public function lists(){
        return view('backend.adsmember.list_ads')->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }

    public function add(){
        $allSettingGroup = SettingGroup::get()->toArray();
        $allSetting = Setting::where('status',1)->get()->toArray();
        $settingGroupData = array();

        $parentSettingGroupData = array();
        foreach ($allSettingGroup as $v => $parentData)
        {
            $parentSettingGroupData[$parentData['id']] = $parentData;
        }

        foreach ($allSettingGroup as $v => $settingGroup)
        {
            if($settingGroup['pid'] != 0)
            {
                //echo $parentSettingGroupData[$settingGroup['pid']]['name'];exit;
                $settingGroupData[$parentSettingGroupData[$settingGroup['pid']]['name']][$settingGroup['name']] = $settingGroup;
            }else{
                $settingGroupData[$settingGroup['name']] = $settingGroup;
            }

        }

        //print_r($settingGroupData['china']);exit;

        $countTypeArray = array();
        $adsTypeArray = array();
        $WebTypeArray = array();
        $daysetArray = array();
        $AndroidMobileArray = array();
        $IOSMobileArray = array();
        $AndroidBrowserArray = array();
        $IOSBrowserArray = array();
        $NetworkTypeArray = array();
        $OperatorArray = array();

        $ProvinceArray = array();

        foreach ($allSetting as $set)
        {
            if($set['settinggroup'] == 'countType'){
                $countTypeArray[] = $set;
            }
            if($set['settinggroup'] == 'adsType'){
                $adsTypeArray[] = $set;
            }
            if($set['settinggroup'] == 'WebType'){
                $WebTypeArray[] = $set;
            }
            if($set['settinggroup'] == 'dayset'){
                $daysetArray[] = $set;
            }
            if($set['settinggroup'] == 'Android' and $set['skey'] == 'mobile'){
                $AndroidMobileArray[] = $set;
            }
            if($set['settinggroup'] == 'IOS' and $set['skey'] == 'mobile'){
                $IOSMobileArray[] = $set;
            }
            if($set['settinggroup'] == 'Android' and $set['skey'] == 'Browser'){
                $AndroidBrowserArray[] = $set;
            }
            if($set['settinggroup'] == 'IOS' and $set['skey'] == 'Browser'){
                $IOSBrowserArray[] = $set;
            }
            if($set['settinggroup'] == 'NetworkType'){
                $NetworkTypeArray[] = $set;
            }
            if($set['settinggroup'] == 'Operator'){
                $OperatorArray[] = $set;
            }

        }

        foreach ($allSettingGroup as $group){
            if($group['pid'] == $settingGroupData['china']['id']){
                $ProvinceArray[] = $group;
            }
        }


        //print_r($ProvinceArray);exit;

//        print_r($settingGroupData);
//        echo "<br>";
//        echo "<br>";
//        echo "<br>";
//        print_r($settingData);exit;
        //print_r($settingData['countType']);exit;
        return view('backend.adsmember.add_ads',compact('countTypeArray','adsTypeArray','WebTypeArray','daysetArray','AndroidMobileArray','IOSMobileArray','AndroidBrowserArray',
            'IOSBrowserArray','NetworkTypeArray','OperatorArray','ProvinceArray'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }

}
