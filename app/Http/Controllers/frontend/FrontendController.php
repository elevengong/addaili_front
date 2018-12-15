<?php

namespace App\Http\Controllers\frontend;

use App\Model\CommonSetting;
use App\Model\Contact;
use App\Model\Lottery;
use App\Model\Navigation;
use App\Model\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class FrontendController extends Controller
{
    protected $commonSetting;
    protected $pageNum = 10;
    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
        $commonSetting = CommonSetting::where('status',1)->orderBy('common_set_id','asc')->get()->toArray();
        foreach($commonSetting as $set)
        {
            $this->commonSetting[$set['name']] = $set['value'];
        }
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
