<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
    }

    //删除指定session数据
    public function deleteSession($request, $key){
        return $request->session()->forget($key);
    }

    //删除所有session数据
    public function deleteAllSession($request){
        return $request->session()->flush();
    }

    //判断是否为数字
    public function isNumeric($value){
        return is_numeric($value);
    }

    //判断密码长度是否达到最少6位数
    public function isPassword($pwd){
        if(strlen($pwd)<6)
        {
            return false;
        }else{
            return true;
        }
    }

    //判断邮箱是否正确
    public function isEmail($email){
        $mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
        if(preg_match($mode,$email)){
            return true;
        }
        else{
            return false;
        }
    }

}
