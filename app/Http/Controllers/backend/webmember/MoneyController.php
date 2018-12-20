<?php

namespace App\Http\Controllers\backend\webmember;

use App\Model\Setting;
use App\Model\Websites;
use App\Model\WithdrawInfo;
use App\Model\WithdrawOrder;
use Illuminate\Http\Request;
use App\Model\Member;
use App\Model\MemberBalance;
use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;
use Illuminate\Support\Facades\DB;

class MoneyController extends CommonController
{
    public function commissionlist(Request $request){
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
        $domainArray = Websites::where('member_id',session('webmaster_id'))->where('status',1)->get()->toArray();

        if($request->isMethod('post')){

        }else{
            return view('backend.webmember.list_commission_report',compact('commonSetting','settingArray','adsTypeArray','countTypeArray','domainArray'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
        }
    }

    public function withdraw(Request $request){
        if($request->isMethod('post')){
            $bankinfoId = request()->input('bankinfo');
            $amount = request()->input('amount');
            if($bankinfoId == '' or $bankinfoId == 0)
            {
                $data['status'] = 0;
                $data['msg'] = "请选择收款帐号,如没有,请到基本设置里添加提款信息!";
                return json_encode($data);
            }
            if($amount == '' or $amount<100)
            {
                $data['status'] = 0;
                $data['msg'] = "提款金额不得少于100元!";
                return json_encode($data);
            }
            DB::beginTransaction();
            try{
                $webmasterInfo = Member::where('member_id', session('webmaster_id'))->lockForUpdate()->get()->toArray();
                $webmasterBalance = MemberBalance::where('id', session('webmaster_id'))->lockForUpdate()->get()->toArray();

                if($webmasterBalance[0]['balance'] < $amount){
                    DB::rollBack();
                    $data['status'] = 0;
                    $data['msg'] = "提款金额比可提款金额多!";
                    return json_encode($data);
                }else{
                    $orderData = array();
                    $orderData['member_id'] = session('webmaster_id');
                    $orderData['withdraw_info_id'] = $bankinfoId;
                    $orderData['order_no'] = time().rand(10,99);
                    $orderData['money'] = $amount;
                    $orderData['status'] = 0;
                    $orderData['apply_withdraw_ip'] = $request->getClientIp();

                    $res1 = WithdrawOrder::create($orderData);

                    $res2 = Member::where('member_id', session('webmaster_id'))->increment('frozen',$amount);
                    $res3 = MemberBalance::where('id', session('webmaster_id'))->decrement('balance',$amount);

                    if($res1->withdraw_id and $res2 and $res3)
                    {
                        DB::commit();
                        $data['status'] = 1;
                        $data['msg'] = "成功生成订单，请耐心等待，谢谢！";
                    }else{
                        DB::rollBack();
                        $data['status'] = 0;
                        $data['msg'] = "生成订单失败，请联系客服，谢谢！";
                    }
                    return json_encode($data);
                }

            }catch (\Exception $e) {
                DB::rollBack();
                $data['status'] = 0;
                $data['msg'] = "Error!";
                return json_encode($data);
            }




        }else{
            $commonSetting = $this->commonSetting;
            $webmaster = Member::find(session('webmaster_id'))->toArray();
            $memberBalance = MemberBalance::where('id',session('webmaster_id'))->get()->toArray();
            $withdrawInfo = WithdrawInfo::select('withdraw_info.*','bank.bank_name','setting_group.remark')
                ->leftJoin('bank',function ($join){
                    $join->on('bank.bank_id','=','withdraw_info.bank_id');
                })
                ->leftJoin('setting_group',function ($join){
                    $join->on('setting_group.id','=','withdraw_info.province_id');
                })
                ->where('withdraw_info.webmember_id',session('webmaster_id'))->orderBy('withdraw_info.withdraw_info_id','desc')->get()->toArray();
            return view('backend.webmember.commission_withdraw',compact('webmaster','memberBalance','withdrawInfo','commonSetting'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
        }
    }

    public function withdrawrecord(Request $request){
        $commonSetting = $this->commonSetting;
        if($request->isMethod('post')){

        }else{
            $orderArray = WithdrawOrder::select('withdraw_order.*','withdraw_info.account_name','withdraw_info.bank_number')
                ->leftJoin('withdraw_info',function ($join){
                    $join->on('withdraw_info.withdraw_info_id','=','withdraw_order.withdraw_info_id');
                })
                ->where('withdraw_order.member_id',session('webmaster_id'))->orderBy('withdraw_order.created_at','desc')->get()->toArray();
            return view('backend.webmember.withdraw_record',compact('orderArray','commonSetting'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
        }
    }
}
