<?php

namespace App\Http\Controllers\frontend;

use App\Model\Member;
use App\Model\MemberBalance;
use App\Model\Message;
use Illuminate\Http\Request;
use App\Http\Requests;
use Crypt;

require_once 'resources/org/code/ValidateCode.php';

class IndexController extends FrontendController
{
    public function index(){
        $commonSetting = $this->commonSetting;
        $lastThreeMessageArray = Message::where('status',1)->orderBy('created_at','desc')->take(3)->get()->toArray();
        return view('frontend.pc.index',compact('commonSetting','lastThreeMessageArray'));
    }

    public function advance(){
        $commonSetting = $this->commonSetting;
        return view('frontend.pc.advance',compact('commonSetting'));
    }

    public function listsnotice(Request $request){
        $commonSetting = $this->commonSetting;
        $messageArray = Message::where('status',1)->orderBy('created_at','desc')->paginate($this->pageNum);
        return view('frontend.pc.lists_notice',compact('commonSetting','messageArray'));
    }

    public function notice(Request $request,$notice_id){
        $commonSetting = $this->commonSetting;
        $message = Message::where('msg_id',$notice_id)->where('status',1)->get()->toArray();
        $messagePrv = Message::where('msg_id','<',$notice_id)->where('status',1)->orderBy('msg_id','desc')->get()->take(1)->toArray();
        $messageNext = Message::where('msg_id','>',$notice_id)->where('status',1)->orderBy('msg_id','asc')->get()->take(1)->toArray();
        if(!empty($message))
        {
            return view('frontend.pc.notice',compact('commonSetting','message','messagePrv','messageNext'));
        }else{
            return redirect('/index.html');
        }
    }

    public function help(){
        $commonSetting = $this->commonSetting;
        return view('frontend.pc.help',compact('commonSetting'));
    }

    public function about(){
        $commonSetting = $this->commonSetting;
        return view('frontend.pc.about',compact('commonSetting'));
    }

    public function protocol(){
        $commonSetting = $this->commonSetting;
        return view('frontend.pc.protocol',compact('commonSetting'));
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
            $commonSetting = $this->commonSetting;
            return view('frontend.pc.login',compact('commonSetting'));
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
            $parent_webmaster_id = request()->input('parent_webmaster_id');
            if($user_type==1){
                $parent_webmaster_id = 0;
            }

            if($pwd == $pwd_confirm){
                //先搜索同类型会员是否有相同名字的
                $memberInfo = Member::where('type',$user_type)->where('name',$email)->get()->count();
                if($memberInfo != 0)
                {
                    $data['status'] = 0;
                    $data['msg'] = '该邮箱已被注册';
                    return json_encode($data);
                }
                $input['pwd'] = Crypt::encrypt($pwd);
                $input['type'] = $user_type;
                $input['name'] = $email;
                $input['qq'] = $qq;
                $input['mobile'] = $phone;
                $input['parent_daili_id'] = $parent_webmaster_id;
                $result = Member::create($input);
                if($result->member_id){
                    //注册成功后，member_balance要插入一条数据
                    $newInput['id'] = $result->member_id;
                    $newInput['balance'] = 0;
                    MemberBalance::create($newInput);

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
            return json_encode($data);

        }else{
            $commonSetting = $this->commonSetting;
            $webdaili_id = session('webdaili_id');
            return view('frontend.pc.register',compact('commonSetting','webdaili_id'));
        }
    }

    public function logout(Request $request){
        $this->deleteAllSession($request);
        return redirect('login.html');
    }

    public function dailientrance(Request $request,$webdaili_id){
        session(['webdaili_id'=>$webdaili_id]);
        return redirect('/index.html');
    }

    //验证码缩略图
    public function code(){
        $code = new \ValidateCode();
        $code->doimg();
        session(['code' => $code->getCode()]);
    }

}
