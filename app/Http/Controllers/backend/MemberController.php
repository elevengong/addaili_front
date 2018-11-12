<?php

namespace App\Http\Controllers\backend;

use App\Model\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use Crypt;
use App\Http\Requests;

class MemberController extends MyController
{
    public function adsmemberlist(Request $request){
        if($request->isMethod('post'))
        {
            $member = request()->input('member');
            $MemberArray = Member::where('type',1)->where('name', 'like', $member . '%')->orderBy('member_id', 'asc')->paginate($this->backendPageNum);
        }else{
            $MemberArray = Member::where('type',1)->orderBy('member_id', 'asc')->paginate($this->backendPageNum);
        }
        return view('backend.adsmember', compact('MemberArray'))->with('admin', session('admin'));
    }

    public function sitememberlist(Request $request){
        if($request->isMethod('post'))
        {
            $member = request()->input('member');
            $MemberArray = Member::where('type',2)->where('name', 'like', $member . '%')->orderBy('member_id', 'asc')->paginate($this->backendPageNum);
        }else{
            $MemberArray = Member::where('type',2)->orderBy('member_id', 'asc')->paginate($this->backendPageNum);
        }
        return view('backend.sitemember', compact('MemberArray'))->with('admin', session('admin'));
    }

    public function changememberstatus(Request $request){
        if($request->isMethod('post'))
        {
            $member_id = request()->input('member_id');
            $status = (request()->input('status') == 1) ? 0 : 1;
            $result = Member::where('member_id', $member_id)->update(['status' => $status]);
            if ($result) {
                $data['status'] = 1;
                $data['msg'] = "修改成功";
            } else {
                $data['status'] = 0;
                $data['msg'] = "修改失败";
            }
            echo json_encode($data);
        }else{
            $data['status'] = 0;
            $data['msg'] = "Error!!";
            echo json_encode($data);
        }
    }

    public function resetmemberpwd(Request $request,$member_id){
        if($request->isMethod('post'))
        {
            $pwd = Crypt::encrypt( request()->input('repwd') );
            $result = Member::where('member_id', $member_id)->update(['pwd' => $pwd]);
            if ($result) {
                $data['status'] = 1;
                $data['msg'] = "修改成功";
            } else {
                $data['status'] = 0;
                $data['msg'] = "修改失败";
            }
            echo json_encode($data);
        }else{
            return view('backend.resetmemberpwd',compact('member_id'));
        }

    }

    public function setpersonalrate(Request $request){
        if($request->isMethod('post'))
        {
            $member_id = request()->input('member_id');
            $personal_rate = request()->input('personal_rate');
            if($personal_rate == 0)
            {
                $personal_rate == '0.00';
            }
            if($personal_rate > 1 or $personal_rate < 0)
            {
                $data['status'] = 0;
                $data['msg'] = "扣量比例不能超过范围值";
                echo json_encode($data);
                exit;
            }
            if(!$this->isNumeric($personal_rate))
            {
                $data['status'] = 0;
                $data['msg'] = "扣量比例一定要为数字";
                echo json_encode($data);
                exit;
            }

            $result = Member::where('member_id', $member_id)->update(['personal_rate' => $personal_rate]);
            if ($result) {
                $data['status'] = 1;
                $data['msg'] = "修改成功";
            } else {
                $data['status'] = 0;
                $data['msg'] = "修改失败";
            }

        }else{
            $data['status'] = 0;
            $data['msg'] = "Error!!";
        }
        echo json_encode($data);

    }



}
