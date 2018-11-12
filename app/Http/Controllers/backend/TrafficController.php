<?php

namespace App\Http\Controllers\backend;

use App\Model\Ads;
use App\Model\Traffic;
use App\Model\Websites;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\MyController;

class TrafficController extends MyController
{
    public function traffic(){
        //获取当前广告商的全部渠道id
        $channels = Ads::select('ads_id')->where('member_id',session('member_id'))->get()->toArray();
        $ads_id = '';
        foreach ($channels as $channel)
        {
            $ads_id = $ads_id.$channel['ads_id'].',';
        }
        $ads_id = rtrim($ads_id, ',');
        $array = explode(',',$ads_id);

        $traffics = Traffic::whereIn('ads_id',$array)->orderBy('created_at','desc')->paginate(100);
        return view('backend.traffic',compact('traffics'));
    }

    public function webmastertraffic(){
        $websites = Websites::select('web_id')->where('member_id',session('member_id'))->get()->toArray();
        $web_id = '';
        foreach ($websites as $web)
        {
            $web_id = $web_id.$web['web_id'].',';
        }
        $web_id = rtrim($web_id, ',');
        $array = explode(',',$web_id);
        $traffics = Traffic::whereIn('web_id',$array)->orderBy('created_at','desc')->paginate(100);
        return view('backend.traffic',compact('traffics'));
    }


}
