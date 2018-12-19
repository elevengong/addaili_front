<?php

namespace App\Http\Controllers\backend\adsmember;

use App\Model\Ads;
use App\Model\CommonSetting;
use App\Model\Material;
use App\Model\Member;
use App\Model\Setting;
use App\Model\SettingGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class AdsController extends CommonController
{
    public function lists(Request $request){
        $commonSetting = $this->commonSetting;
        $adstypeArray = Setting::where('settinggroup','adsType')->where('status',1)->orderBy('set_id')->get()->toArray();
        $countTypeArray = Setting::where('settinggroup','countType')->where('status',1)->orderBy('set_id')->get()->toArray();

        $settingArray = Setting::orWhere('settinggroup','adsType')->orWhere('settinggroup','countType')->where('status',1)->get()->toArray();
        $setting = array();
        foreach($settingArray as $set)
        {
            $setting[$set['set_id']] = $set['remark'];
        }

        if($request->isMethod('post')){
            $adsArray = Ads::orderBy('created_at','desc')
                ->where(function($query) use($request){

                    $query->where('member_id',session('ads_id'));
                    $ads_id = $request->input('ads_id');
                    if(!empty($ads_id))
                    {
                        $query->where('ads_id',$ads_id);
                    }
                    $ads_name = $request->input('ads_name');
                    if(!empty($ads_name))
                    {
                        $query->where('ads_name',$ads_name);
                    }
                    $adstype = $request->input('adstype');
                    if($adstype!=0)
                    {
                        $query->where('ads_type',$adstype);
                    }
                    $count_type = $request->input('count_type');
                    if($count_type!=0)
                    {
                        $query->where('ads_count_type',$count_type);
                    }
                    $status = $request->input('status');
                    if(!empty($status))
                    {
                        $query->where('status',$status);
                    }

                })
                ->paginate($this->backendPageNum);


        }else{
            $adsArray = Ads::where('member_id',session('ads_id'))->orderBy('created_at','desc')->paginate($this->backendPageNum);
        }
        return view('backend.adsmember.list_ads',compact('adsArray','setting','commonSetting','adstypeArray','countTypeArray'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));


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
            if($set['settinggroup'] == 'brand' and $set['skey'] == 'mobile'){
                $MobileBrandArray[] = $set;
            }
            if($set['settinggroup'] == 'Browser'){
                $BrowserArray[] = $set;
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
        $commonSetting = $this->commonSetting;
        //print_r($commonSetting);exit;
        return view('backend.adsmember.add_ads',compact('countTypeArray','adsTypeArray','WebTypeArray','daysetArray','MobileBrandArray','BrowserArray',
            'NetworkTypeArray','OperatorArray','ProvinceArray','commonSetting'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }

    public function getallmaterial(Request $request){
        if($request->isMethod('post')){
            $ads_id = session('ads_id');
            $allMaterial = Material::where('ads_id',$ads_id)->where('status',1)->orderBy('created_at','desc')->paginate(5);
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

                $paginate .= $allMaterial->ajaxlinks();

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

            $commonSetting = $this->commonSetting;
            if($price < $commonSetting['min_ads_per_price'])
            {
                $reData['status'] = 0;
                $reData['msg'] = '每1000次的单价不能为空或者为'.$commonSetting['min_ads_per_price'].'元!';
                return json_encode($reData);
            }

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

    public function edit(Request $request, $ads_id){
        //判断该广告是否是当用广告主
        //echo session('ads_id');
        $ads = Ads::where('ads_id',$ads_id)->where('member_id',session('ads_id'))->get()->toArray();
        if(!empty($ads))
        {
            $photoArray = json_decode($ads[0]['ads_photo'],true);
            $photoInfoArray = Material::where('ads_id',session('ads_id'))->whereIn('id',$photoArray)->orderBy('created_at','desc')->get()->toArray();
            $photoString = '';
            foreach ($photoInfoArray as $img)
            {
                $photoString .= '<div class="material_item" id="material_item_'.$img['id'].'"><a href="javascript:void(0)" onclick="removeimage('.$img['id'].')" class="del">';
                $photoString .= '<i class="iconfont icon-shanchu1"></i></a>';
                $photoString .= '<img onmouseover="" src="'.$img['image'].'" class="imgs">';
                $photoString .= '<input type="hidden" value="'.$img['id'].'" name="creative_image_id_array[]" jid="'.$img['id'].'" id="material_'.$img['id'].'" class="material_checked"></div>';
            }

            $moreSetting = json_decode($ads[0]['more_setting'],true);
            //print_r($moreSetting);exit;
            $newMoreSetting = array();

            $newMoreSetting['time'] = $moreSetting['time'];
            foreach ($moreSetting['os_array'] as $data)
            {
                $newMoreSetting['os_array'][$data] = 1;
            }
            if(!empty($moreSetting['time_array']))
            {
                foreach ($moreSetting['time_array'] as $data)
                {
                    $newMoreSetting['time_array'][$data] = 1;
                }
            }else{
                $newMoreSetting['time_array'] = '';
            }

            if(!empty($moreSetting['area_array']))
            {
                foreach ($moreSetting['area_array'] as $data)
                {
                    $newMoreSetting['area_array'][$data] = 1;
                }
            }else{
                $newMoreSetting['area_array'] = '';
            }

            if(!empty($moreSetting['terminal_array']))
            {
                foreach ($moreSetting['terminal_array'] as $data)
                {
                    $newMoreSetting['terminal_array'][$data] = 1;
                }
            }else{
                $newMoreSetting['terminal_array'] = '';
            }

            if(!empty($moreSetting['switch_browser_array']))
            {
                foreach ($moreSetting['switch_browser_array'] as $data)
                {
                    $newMoreSetting['switch_browser_array'][$data] = 1;
                }
            }else{
                $newMoreSetting['switch_browser_array'] = '';
            }

            if(!empty($moreSetting['switch_domain_category_array']))
            {
                foreach ($moreSetting['switch_domain_category_array'] as $data)
                {
                    $newMoreSetting['switch_domain_category_array'][$data] = 1;
                }
            }else{
                $newMoreSetting['switch_domain_category_array'] = '';
            }

            if(!empty($moreSetting['switch_nettype_array']))
            {
                foreach ($moreSetting['switch_nettype_array'] as $data)
                {
                    $newMoreSetting['switch_nettype_array'][$data] = 1;
                }
            }else{
                $newMoreSetting['switch_nettype_array'] = '';
            }

            if(!empty($moreSetting['switch_nettype_array']))
            {
                foreach ($moreSetting['switch_network_array'] as $data)
                {
                    $newMoreSetting['switch_network_array'][$data] = 1;
                }
            }else{
                $newMoreSetting['switch_network_array'] = '';
            }


            //print_r($newMoreSetting);exit;



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
                if($set['settinggroup'] == 'brand' and $set['skey'] == 'mobile'){
                    $MobileBrandArray[] = $set;
                }
                if($set['settinggroup'] == 'Browser'){
                    $BrowserArray[] = $set;
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
            $commonSetting = $this->commonSetting;
            //print_r($AndroidMobileArray);
            return view('backend.adsmember.edit_ads',compact('countTypeArray','adsTypeArray','WebTypeArray','daysetArray','MobileBrandArray','BrowserArray',
                'NetworkTypeArray','OperatorArray','ProvinceArray','commonSetting','ads','moreSetting','newMoreSetting','photoString'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));

        }else{
            return 'Error';
        }
    }

    public function editprocess(Request $request){
        if($request->isMethod('post')){
            //判断当天修改次数是否超过总限制
            $limitTimeArray = CommonSetting::select('value')->where('name','per_adsmember_change_perday')->get()->toArray();
            if(empty($limitTimeArray))
            {
                $limit = 50;
            }else{
                $limit = $limitTimeArray[0]['value'];
            }
            $member = Member::select('change_times','changed_at')->find(session('ads_id'))->toArray();
            $change_times = $member['change_times'];
            $changed_at = $member['changed_at'];
            if($changed_at == '')
            {
                $change_times = 1;
                $changed_at = date('Y-m-d H:i:s',time());
            }else{
                $nowDay = date('Ymd',time());
                $recordDay = date('Ymd',strtotime($changed_at));
                if($nowDay != $recordDay)
                {
                    $change_times = 1;
                    $changed_at = date('Y-m-d H:i:s',time());
                }else{
                    $change_times = $change_times + 1;
                    $changed_at = date('Y-m-d H:i:s',time());
                }
            }
            if($change_times > $limit)
            {
                $reData['status'] = 0;
                $reData['msg'] = '当天修改次数已到上限，请明天再修改!';
                return json_encode($reData);
            }
            Member::where('member_id',session('ads_id'))->update(['change_times'=>$change_times, 'changed_at'=>$changed_at]);



            $ads_id = request()->input('ads_id');
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

            $commonSetting = $this->commonSetting;
            if($price < $commonSetting['min_ads_per_price'])
            {
                $reData['status'] = 0;
                $reData['msg'] = '每1000次的单价不能为空或者为'.$commonSetting['min_ads_per_price'].'元!';
                return json_encode($reData);
            }

            $updateData['ads_name'] = $name;
            $updateData['ads_count_type'] = $count_type;
            $updateData['ads_type'] = $adstype;
            $updateData['ads_link'] = $site_url;
            $updateData['per_cost'] = $price/1000;
            $updateData['total_budget'] = $budget;
            $updateData['daily_budget'] = $budget_daily;
            $updateData['ads_photo'] = json_encode($creative_image_id_array);
            $updateData['ismobile'] = 1;
            $updateData['status'] = 0;

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

            $updateData['more_setting'] = json_encode($more_setting);

//            echo $ads_id."---";
//            echo session('ads_id');
//            print_r($updateData);exit;
            $res = Ads::where('ads_id',$ads_id)->where('member_id',session('ads_id'))->update($updateData);
            //$result = CommonSetting::where('common_set_id',$set_id)->update($input);
            if($res){
                $reData['status'] = 1;
                $reData['msg'] = '广告修改成功!';
            }else{
                $reData['status'] = 0;
                $reData['msg'] = '广告修改失败!';
            }
            return json_encode($reData);

        }
    }

}
