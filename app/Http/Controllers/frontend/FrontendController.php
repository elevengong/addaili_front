<?php

namespace App\Http\Controllers\frontend;

use App\Model\Contact;
use App\Model\Lottery;
use App\Model\Navigation;
use App\Model\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class FrontendController extends Controller
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


}
