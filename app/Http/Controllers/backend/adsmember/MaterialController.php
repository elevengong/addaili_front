<?php

namespace App\Http\Controllers\backend\adsmember;

use App\Model\SettingGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class MaterialController extends CommonController
{
    public function materiallist(){
        return view('backend.adsmember.list_material')->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }

    public function upload(){
        $imageTypeArray = SettingGroup::where('pid','52')->get()->toArray();
        return view('backend.adsmember.upload_material',compact('imageTypeArray'))->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }
}
