<?php

namespace App\Http\Controllers\backend\adsmember;

use App\Model\Ads;
use App\Model\Material;
use App\Model\Setting;
use App\Model\SettingGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class AdsController extends CommonController
{
    public function lists(Request $request){
        if($request->isMethod('post')){

        }else{
            $settingArray = Setting::orWhere('settinggroup','adsType')->orWhere('settinggroup','countType')->where('status',1)->get()->toArray();
            $setting = array();
            foreach($settingArray as $set)
            {
                $setting[$set['set_id']] = $set['remark'];
            }
            //print_r($settingArray);exit;
            $adsmember_id = session('ads_id');
            $adsArray = Ads::where('member_id',$adsmember_id)->orderBy('created_at','desc')->paginate($this->backendPageNum);
            return view('backend.adsmember.list_ads',compact('adsArray','setting'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
        }

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

    public function getallmaterial(Request $request){
        if($request->isMethod('post')){
            $ads_id = session('ads_id');
            $allMaterial = Material::where('ads_id',$ads_id)->where('status',1)->orderBy('created_at','desc')->paginate($this->backendPageNum);
            $html = '';
            $paginate = '';
            if(!empty($allMaterial)){
                foreach ($allMaterial as $material)
                {
                    $html .= "<tr class=\"bggray\">";
                    $html .= "<td scope=\"row\" class=\"mb-hide\">".$material['id']."</td>";
                    $html .= "<td><div class=\"tdpic\">";
                    $html .= '<a target="_blank" href="'.$material['image'].'">';
                    $html .= '<img src="'.$material['image'].'" class="img_material">';
                    $html .= '</a></div></td>';
                    $html .= '<td class="mb-hide">横幅</td>';
                    $html .= '<td class="mb-hide">已审核</td>';
                    $html .= '<td class="long-table"><div class="opr">';
                    $html .= '<a id="s_'.$material['id'].'" href="javascript:void(0)" onclick="choose('.$material['id'].');" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a>';
                    $html .= '</div></td></tr>';
                }

                $paginate .= $allMaterial->links();

                $reData['status'] = 1;
                $reData['datas'] = $html;
                $reData['paginate'] = $paginate;

            }

            return json_encode($reData);
        }
    }

    public function choosematerial(Request $request,$id){
        if($request->isMethod('post')){
            $material = Material::where('id',$id)->get()->toArray();
            $html = '';
            if(!empty($material)){
                $html .= '<div class="material_item" id="material_item_'.$material[0]['id'].'"><a href="javascript:void(0)" onclick="removeimage('.$material[0]['id'].')" class="del">';
                $html .= '<i class="iconfont icon-shanchu1"></i></a>';
                $html .= '<img onmouseover="" src="'.$material[0]['image'].'" class="imgs">';
                $html .= '<input type="hidden" value="'.$material[0]['id'].'" name="creative_image_id_array[]" jid="'.$material[0]['id'].'" id="material_'.$material[0]['id'].'" class="material_checked"></div>';

                $reData['status'] = 1;
                $reData['data'] = $html;
            }

            return json_encode($reData);
        }
    }

    public function getmaterialbyid(Request $request,$id){
        if($request->isMethod('post')){
            $materialArray = Material::where('id',$id)->get()->toArray();
            if(!empty($materialArray)){
                $material = $materialArray[0];
                $html = '';

                $html .= "<tr class=\"bggray\">";
                $html .= "<td scope=\"row\" class=\"mb-hide\">".$material['id']."</td>";
                $html .= "<td><div class=\"tdpic\">";
                $html .= '<a target="_blank" href="'.$material['image'].'">';
                $html .= '<img src="'.$material['image'].'" class="img_material">';
                $html .= '</a></div></td>';
                $html .= '<td class="mb-hide">横幅</td>';
                $html .= '<td class="mb-hide">已审核</td>';
                $html .= '<td class="long-table"><div class="opr">';
                $html .= '<a id="s_'.$material['id'].'" href="javascript:void(0)" onclick="choose('.$material['id'].');" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a>';
                $html .= '</div></td></tr>';

                $reData['status'] = 1;
                $reData['datas'] = $html;
            }else{
                $reData['status'] = 0;
                $reData['datas'] = '找不到相关的素材!';
            }
            return json_encode($reData);
        }
    }

    public function addprocess(Request $request){
        if($request->isMethod('post')){
            $name = request()->input('name');
            $count_type = request()->input('count_type');
            $adstype = request()->input('adstype');
            $site_url = request()->input('site_url');
            $creative_image_id_array = request()->input('creative_image_id_array');
            $stime = request()->input('stime');
            $etime = request()->input('etime');
            $price = request()->input('price');
            $budget = request()->input('budget');
            $budget_daily = request()->input('budget_daily');
            $os_array = request()->input('os_array');
            $time_array = request()->input('time_array');
            $area_array = request()->input('area_array');
            $terminal_array = request()->input('terminal_array');
            $switch_browser_array = request()->input('switch_browser_array');
            $switch_domain_category_array = request()->input('switch_domain_category_array');
            $switch_nettype_array = request()->input('switch_nettype_array');
            $switch_network_array = request()->input('switch_network_array');

            $insertData['member_id'] = session('ads_id');
            $insertData['ads_name'] = $name;
            $insertData['ads_count_type'] = $count_type;
            $insertData['ads_type'] = $adstype;
            $insertData['ads_link'] = $site_url;
            $insertData['per_cost'] = $price/1000;
            $insertData['total_budget'] = $budget;
            $insertData['daily_budget'] = $budget_daily;
            $insertData['ads_photo'] = json_encode($creative_image_id_array);
            $insertData['ismobile'] = 1;
            $insertData['status'] = 0;

            $more_setting = array();
            $more_setting['time']['starttime'] = $stime;
            $more_setting['time']['endtime'] = $etime;
            $more_setting['os_array'] = $os_array;
            $more_setting['time_array'] = $time_array;
            $more_setting['area_array'] = $area_array;
            $more_setting['terminal_array'] = $terminal_array;
            $more_setting['switch_browser_array'] = $switch_browser_array;
            $more_setting['switch_domain_category_array'] = $switch_domain_category_array;
            $more_setting['switch_nettype_array'] = $switch_nettype_array;
            $more_setting['switch_network_array'] = $switch_network_array;

            $insertData['more_setting'] = json_encode($more_setting);

            //print_r($insertData);exit;
            $res = Ads::create($insertData);
            if($res->ads_id){
                $reData['status'] = 1;
                $reData['msg'] = '广告添加成功!';
            }else{
                $reData['status'] = 0;
                $reData['msg'] = '广告添加失败!';
            }
            return json_encode($reData);

        }

    }

}
