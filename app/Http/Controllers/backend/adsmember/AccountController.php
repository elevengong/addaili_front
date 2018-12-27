<?php

namespace App\Http\Controllers\backend\adsmember;

use App\Model\Deposit;
use App\Model\DepositInfo;
use App\Model\Member;
use Illuminate\Http\Request;
use Crypt;
use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class AccountController extends CommonController
{
    public function info(){
        $member = Member::find(session('ads_id'))->toArray();
        return view('backend.adsmember.account_info',compact('member'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }

    public function updateqq(Request $request){
        if($request->isMethod('post')){
            $qq = request()->input('qq');
            $res = Member::where('member_id', session('ads_id'))->update(['qq' => $qq]);
            if ($res) {
                $data['status'] = 1;
                $data['msg'] = "QQ修改成功";
            } else {
                $data['status'] = 0;
                $data['msg'] = "QQ修改失败";
            }
            echo json_encode($data);
        }
    }

    public function updatepwd(Request $request){
        if($request->isMethod('post')){
            $old_password = request()->input('old_password');
            $password = request()->input('password');
            $confirm_password = request()->input('confirm_password');
            //判断旧密码是否正确
            $member = Member::find(session('ads_id'))->toArray();
            $nowPassword = Crypt::decrypt($member['pwd']);
            if($nowPassword == $old_password)
            {
                if($password == $confirm_password)
                {
                    $newPassword = Crypt::encrypt($password);
                    $res = Member::where('member_id',session('ads_id'))->update(['pwd'=>$newPassword]);
                    if ($res) {
                        $data['status'] = 1;
                        $data['msg'] = "登陆密码修改成功,请重新登陆！";
                    } else {
                        $data['status'] = 0;
                        $data['msg'] = "登陆密码修改失败";
                    }

                }else{
                    $data['status'] = 0;
                    $data['msg'] = "两次密码不相同！";
                }
            }else{
                $data['status'] = 0;
                $data['msg'] = "旧密码不正确！";
            }
            echo json_encode($data);

        }
    }

    public function deposit(){
        $commonSetting = $this->commonSetting;
        $depositInfo = DepositInfo::where('status',1)->orderBy('created_at','desc')->get()->toArray();
        return view('backend.adsmember.deposit',compact('commonSetting','depositInfo'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }

    public function depositprocess(Request $request){
        if($request->isMethod('post')){
            $deposit_info_id = request()->input('deposit_info_id');
            $money = request()->input('money');
            $member_deposit_time = request()->input('rtime');
            $payer_account_name = request()->input('remit_user');

            $deposit_info = DepositInfo::find($deposit_info_id)->toArray();
            if(empty($deposit_info))
            {
                $data['status'] = 0;
                $data['msg'] = "Error!";
                echo json_encode($data);
            }

            $input = array();
            $input['member_id'] = session('ads_id');
            $input['order_no'] = time().rand(10,99);
            $input['money'] = $money;
            $input['type'] = $deposit_info['type'];
            $input['bank'] = $deposit_info['bank_name'];
            $input['account_number'] = $deposit_info['account_number'];
            $input['account_name'] = $deposit_info['username'];
            $input['payer_account_name'] = $payer_account_name;
            $input['deposit_time'] = $member_deposit_time;
            $input['pay_ip'] = $request->getClientIp();
            $input['status'] = 0;

            $res = Deposit::create($input);
            if ($res->deposit_id) {
                $data['status'] = 1;
                $data['msg'] = "存款订单生成成功";
            } else {
                $data['status'] = 0;
                $data['msg'] = "存款订单生成失败";
            }
            echo json_encode($data);

        }
    }

    public function depositlist(Request $request){
        $commonSetting = $this->commonSetting;
        if($request->isMethod('post')){

        }else{
            $depositArray = Deposit::where('member_id',session('ads_id'))->orderBy('created_at','desc')->paginate($this->backendPageNum);
            return view('backend.adsmember.list_deposit',compact('commonSetting','depositArray'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
        }
    }



}
