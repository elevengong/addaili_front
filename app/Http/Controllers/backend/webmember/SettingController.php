<?php

namespace App\Http\Controllers\backend\webmember;

use App\Model\Bank;
use App\Model\Member;
use App\Model\SettingGroup;
use App\Model\WithdrawInfo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;
use Crypt;

class SettingController extends CommonController
{
    public function index(){
        $allBank = Bank::where('status',1)->orderBy('bank_id','asc')->get()->toArray();
        $memberInfo = Member::find(session('webmaster_id'))->toArray();
        $allProvince = SettingGroup::where('pid',13)->orderBy('id','asc')->get()->toArray();
        $withdrawInfo = WithdrawInfo::select('withdraw_info.*','bank.bank_name','setting_group.remark')
            ->leftJoin('bank',function ($join){
                $join->on('bank.bank_id','=','withdraw_info.bank_id');
            })
            ->leftJoin('setting_group',function ($join){
                $join->on('setting_group.id','=','withdraw_info.province_id');
            })
            ->where('withdraw_info.webmember_id',session('webmaster_id'))->where('withdraw_info.status',1)->orderBy('withdraw_info.withdraw_info_id','desc')->get()->toArray();
        return view('backend.webmember.setting',compact('memberInfo','allBank','allProvince','withdrawInfo'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
    }

    public function updatepwd(Request $request){
        if($request->isMethod('post')){
            $old_password = request()->input('old_password');
            $password = request()->input('password');
            $confirm_password = request()->input('confirm_password');
            //判断旧密码是否正确
            $member = Member::find(session('webmaster_id'))->toArray();
            $nowPassword = Crypt::decrypt($member['pwd']);
            if($nowPassword == $old_password)
            {
                if($password == $confirm_password)
                {
                    $newPassword = Crypt::encrypt($password);
                    $res = Member::where('member_id',session('webmaster_id'))->update(['pwd'=>$newPassword]);
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

    public function updateqq(Request $request){
        if($request->isMethod('post')){
            $qq = request()->input('qq');
            $res = Member::where('member_id', session('webmaster_id'))->update(['qq' => $qq]);
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

    public function updatemobile(Request $request){
        if($request->isMethod('post')){
            $mobile = request()->input('mobile');
            $res = Member::where('member_id', session('webmaster_id'))->update(['mobile' => $mobile]);
            if ($res) {
                $data['status'] = 1;
                $data['msg'] = "手机号码修改成功";
            } else {
                $data['status'] = 0;
                $data['msg'] = "手机号码修改失败";
            }
            echo json_encode($data);
        }
    }

    public function addbankinfo(Request $request){
        if($request->isMethod('post')){
            $input['webmember_id'] = session('webmaster_id');
            $input['bank_id'] = request()->input('bank_id');
            $input['bank_branch'] = request()->input('bank_branch');
            $input['account_name'] = request()->input('account_name');
            $input['bank_number'] = request()->input('bank_number');
            $input['province_id'] = request()->input('province_id');
            $res = WithdrawInfo::create($input);
            if($res->withdraw_info_id)
            {
                $data['status'] = 1;
                $data['msg'] = "添加成功";
            }else{
                $data['status'] = 0;
                $data['msg'] = "添加失败";
            }
            echo json_encode($data);
        }
    }

    public function delbankinfo($id)
    {
        $result = WithdrawInfo::where('withdraw_info_id',$id)->where('webmember_id',session('webmaster_id'))->update(['status'=> 2]);
        if ($result) {
            $reData['status'] = 1;
            $reData['msg'] = "删除成功";
        } else {
            $reData['status'] = 0;
            $reData['msg'] = "删除失败";
        }
        return json_encode($reData);
    }

}
