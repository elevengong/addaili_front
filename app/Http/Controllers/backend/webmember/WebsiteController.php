<?php

namespace App\Http\Controllers\backend\webmember;

use App\Model\Setting;
use App\Model\Websites;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;


class WebsiteController extends CommonController
{
    public function websitelist(Request $request){
        $commonSetting = $this->commonSetting;
        if($request->isMethod('post')){
            $keywordId = request()->input('keywordId');
            $keywordName = request()->input('keywordName');
            $keywordDomain = request()->input('keywordDomain');

            $allWebsiteArray = Websites::select('websites.*','setting.remark')
                ->leftJoin('setting',function ($join){
                    $join->on('setting.set_id','=','websites.webtype');
                })
                ->where(function($query) use($request){

                    $query->where('websites.member_id',session('webmaster_id'));

                    $keywordId = request()->input('keywordId');
                    if(!empty($keywordId))
                    {
                        $query->where('websites.web_id',$keywordId);
                    }
                    $keywordName = request()->input('keywordName');
                    if(!empty($keywordName))
                    {
                        $query->where('websites.web_name',$keywordName);
                    }
                    $keywordDomain = request()->input('keywordDomain');
                    if(!empty($keywordDomain))
                    {
                        $query->where('websites.domain','like','%'.$keywordDomain.'%');
                    }
                })
                ->orderBy('websites.created_at','asc')->get()->toArray();

        }else{
            $allWebsiteArray = Websites::select('websites.*','setting.remark')
                ->leftJoin('setting',function ($join){
                    $join->on('setting.set_id','=','websites.webtype');
                })
                ->where('websites.member_id',session('webmaster_id'))->where('websites.status','!=',3)->orderBy('websites.created_at','asc')->get()->toArray();
        }
        return view('backend.webmember.list_website',compact('allWebsiteArray','commonSetting'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));

    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $input['web_name'] = request()->input('webname');
            $input['domain'] = request()->input('domain');
            $input['icp'] = request()->input('icp');
            $input['webtype'] = request()->input('webtype');
            $input['status'] = 0;
            $input['member_id'] = session('webmaster_id');

            $res = Websites::create($input);
            if ($res->web_id) {
                $data['status'] = 1;
                $data['msg'] = "网站添加成功，请耐心等待审核!";
            } else {
                $data['status'] = 0;
                $data['msg'] = "网站添加失败!";
            }
            echo json_encode($data);
        }else{
            $commonSetting = $this->commonSetting;
            $webTypeArray = Setting::where('settinggroup','WebType')->where('status',1)->orderBy('set_id','asc')->get()->toArray();
            return view('backend.webmember.add_website',compact('webTypeArray','commonSetting'))->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
        }

    }

    public function delete(Request $request,$web_id){
        if($request->isMethod('delete')){
            $result = Websites::where('member_id',session('webmaster_id'))->where('web_id',$web_id)->update(['status'=>3]);
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
}
