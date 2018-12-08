<?php

namespace App\Http\Controllers\backend\adsmember;

use App\Model\Material;
use App\Model\SettingGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class MaterialController extends CommonController
{
    public function materiallist(Request $request){
        if($request->isMethod('post')){


        }else{
            $materialArray  = Material::where('ads_id',session('ads_id'))->orderBy('created_at','desc')->paginate($this->backendPageNum);
            return view('backend.adsmember.list_material',compact('materialArray'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
        }
    }

    public function upload(){
        $imageTypeArray = SettingGroup::where('pid','52')->get()->toArray();
        return view('backend.adsmember.upload_material',compact('imageTypeArray'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }

    public function uploadprocess(Request $request){
        if($request->isMethod('post')){
            $input=$request->all();
            unset($input['_token']);
            $input['ads_id'] = session('ads_id');
            $result = Material::create($input);
            if($result->id)
            {
                $reData['status'] = 1;
                $reData['msg'] = "添加成功";
            }else{
                $reData['status'] = 0;
                $reData['msg'] = "添加失败";
            }
            echo json_encode($reData);
        }
    }

    public function delete($id)
    {
        $result = Material::destroy($id);
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
