<?php

namespace App\Http\Controllers\frontend;

use App\Model\Member;
use Illuminate\Http\Request;
use App\Http\Requests;
use Crypt;

require_once 'resources/org/code/ValidateCode.php';

class IndexController extends FrontendController
{
    public function index(){
        return view('frontend.pc.index');
    }

    public function advance(){
        return view('frontend.pc.advance');
    }

    public function listsnotice(Request $request){
        return view('frontend.pc.lists_notice');
    }

    public function notice(Request $request,$notice_id){
        return view('frontend.pc.notice');
    }

    public function help(){
        return view('frontend.pc.help');
    }

    public function about(){
        return view('frontend.pc.about');
    }

    public function protocol(){
        return view('frontend.pc.protocol');
    }

    public function login(Request $request){
        if($request->isMethod('post'))
        {
            $username = request()->input('username');
            $pwd = request()->input('pwd');
            $auth_code = request()->input('auth_code');
            $user_role = request()->input('user_role');
            //验证验证码
            if(strtolower($auth_code) == session('code')){
                $memberInfo = Member::where('name',$username)->where('type',$user_role)->get()->toArray();
                if($memberInfo){
                    if($memberInfo[0]['status']==1){
                        $stored_pwd= Crypt::decrypt($memberInfo[0]['pwd']);
                        if($stored_pwd == $pwd)
                        {
                            if($user_role == 1){
                                session(['adsmember' => $username, 'ads_id' => $memberInfo['0']['member_id']]);
                            }else{
                                session(['webmember' => $username, 'webmaster_id' => $memberInfo['0']['member_id']]);
                            }

                            $ip = $request->getClientIp();
                            $lastlogined = date('Y-m-d h:i:s',time());
                            $result = Member::where('member_id',$memberInfo['0']['member_id'])->update(['login_ip'=>$ip, 'lastlogined_at'=>$lastlogined]);

                            $data['status'] = 1;
                            if($user_role == 1){
                                $data['url'] = '/adsmember/service/index';
                            }else{
                                $data['url'] = '/webmember/service/index';
                            }
                        }else{
                            $data['status'] = 0;
                            $data['msg'] = '帐号或密码错误';
                        }
                    }else{
                        $data['status'] = 0;
                        $data['msg'] = '此用户已禁用';
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
            return view('frontend.pc.login');
        }

    }

    public function register(Request $request){
        if($request->isMethod('post')){
            $email = request()->input('email');
            $pwd = request()->input('pwd');
            $pwd_confirm = request()->input('pwd_confirm');
            $qq = request()->input('qq');
            $phone = request()->input('phone');
            $user_type = request()->input('user_type');

            if($pwd == $pwd_confirm){
                $input['pwd'] = Crypt::encrypt($pwd);
                $input['type'] = $user_type;
                $input['name'] = $email;
                $input['qq'] = $qq;
                $result = Member::create($input);
                if($result->member_id){
                    $data['status'] = 1;
                    $data['msg'] = '注册成功';
                }else{
                    $data['status'] = 0;
                    $data['msg'] = '注册失败';
                }

            }else{
                $data['status'] = 0;
                $data['msg'] = '两次密码不相同';
            }


        }else{
            return view('frontend.pc.register');
        }
    }

    public function logout(Request $request){
        $this->deleteAllSession($request);
        return redirect('login.html');
    }

    //验证码缩略图
    public function code(){
        $code = new \ValidateCode();
        $code->doimg();
        session(['code' => $code->getCode()]);
    }

}
