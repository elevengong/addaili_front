<?php

namespace App\Http\Controllers\backend;

use App\Model\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use App\Http\Requests;

class AdsController extends MyController
{
    //广告列表
    public function channel(Request $request){
        //这里要写进redis
        $adsTypeArray = array('1'=> '横幅','2'=>'竖幅','3'=>'手机弹出广告');
        $adsCountTypeArray = array('1'=> 'CPC','2'=>'CPM');

        if($request->isMethod('post'))
        {

        }else{
            $adsListArray = Ads::where('member_id',session('member_id'))->orderBy('ads_id', 'desc')->paginate($this->backendPageNum);
            return view('backend.channel', compact('adsListArray','adsTypeArray','adsCountTypeArray'))->with('member', session('member'))->with('type', session('type'));
        }
    }

    public function channeladd(Request $request){
        if($request->isMethod('post')){
            $input=$request->all();
            unset($input['_token']);
            $input['member_id'] = session('member_id');
            $input['member_name'] = session('member');
            //print_r($input);exit;
            $result = Ads::create($input);
            if($result->ads_id)
            {
                $reData['status'] = 1;
                $reData['msg'] = "添加成功";
            }else{
                $reData['status'] = 0;
                $reData['msg'] = "添加失败";
            }
            echo json_encode($reData);

        }else{
            return view('backend.channeladd');
        }
    }

    //审核广告
    public function verifyads(Request $request){
        if($request->isMethod('post'))
        {
            $ads_id = request()->input('ads_id');
            $status = request()->input('status');
            $result = Ads::where('ads_id', $ads_id)->update(['status' => $status]);
            if ($result) {
                $data['status'] = 1;
                $data['msg'] = "修改成功";
            } else {
                $data['status'] = 0;
                $data['msg'] = "修改失败";
            }
            echo json_encode($data);
        }
    }
}
