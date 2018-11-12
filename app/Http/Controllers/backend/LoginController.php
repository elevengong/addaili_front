<?php

namespace App\Http\Controllers\backend;

use App\Model\Admin;
use App\Model\Member;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\MyController;
//use Illuminate\Support\Facades\Crypt;
use Crypt;

require_once 'resources/org/code/ValidateCode.php';
class LoginController extends MyController
{
    public function login(Request $request){
        if($request->isMethod('post'))
        {
            if($this->Ipbaimingdan == 1)
            {
                $loginIp = $request->getClientIp();
                $ipInfo = $this->getIpInfoByCurl($loginIp);
//                if($ipInfo['data']['country_id'] != 'PH')
//                {
//                    $data['status'] = 0;
//                    $data['msg'] = '你的ip没有通过白名单';
//                    echo json_encode($data);
//                    exit;
//                }

            }

            $name = request()->input('name');
            $pwd = request()->input('pwd');
            $code = request()->input('code');

            //验证验证码
            if(strtolower($code) == session('code'))
            {
                $result = Member::where('name',$name)->get()->toArray();
                if($result)
                {
                    if($result[0]['status']==1)
                    {
                        $stored_pwd= Crypt::decrypt($result[0]['pwd']);
                        if($stored_pwd == $pwd)
                        {
                            session(['member' => $name, 'member_id' => $result['0']['member_id'], 'type' => $result['0']['type']]);

                            //更新当前会员的login ip和最近login时间
                            //$updata_at = date('Y');

                            $ip = $request->getClientIp();
                            $lastlogined = date('Y-m-d h:i:s',time());
                            $result = Member::where('member_id',session('member_id'))->update(['login_ip'=>$ip, 'lastlogined_at'=>$lastlogined]);

                            $data['status'] = 1;
                            $data['msg'] = '登陆成功，请等待跳转';
                        }else{
                            $data['status'] = 0;
                            $data['msg'] = '帐号或密码错误';
                        }
                    }else{
                        $data['status'] = 0;
                        $data['msg'] = '此用户已冻结';
                    }

                }else{
                    $data['status'] = 0;
                    $data['msg'] = '此用户不存在';
                }
            }else{
                $data['status'] = 0;
                $data['msg'] = '验证码输入不正确';
            }
            echo json_encode($data);

        }else{
            return view('backend.login');
        }

    }

    //缩略图
    public function code(){
        $code = new \ValidateCode();
        $code->doimg();
        session(['code' => $code->getCode()]);
    }




}
