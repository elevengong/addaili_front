<?php

namespace App\Http\Controllers\backend\adsmember;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class AdsController extends CommonController
{
    public function lists(){
        return view('backend.adsmember.list_ads')->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }

    public function add(){
        return view('backend.adsmember.add_ads')->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }

}
