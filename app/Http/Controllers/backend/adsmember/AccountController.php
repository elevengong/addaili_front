<?php

namespace App\Http\Controllers\backend\adsmember;

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

    public function deposit(Request $request){
        if($request->isMethod('post')){

        }else{
            return view('backend.adsmember.deposit')->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
        }
    }

    public function depositlist(Request $request){
        if($request->isMethod('post')){

        }else{
            return view('backend.adsmember.list_deposit')->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
        }
    }



}
