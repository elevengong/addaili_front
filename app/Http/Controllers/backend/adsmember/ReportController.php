<?php

namespace App\Http\Controllers\backend\adsmember;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;

class ReportController extends CommonController
{
    public function report(){
        return view('backend.adsmember.report')->with('ads_id',session('ads_id'))->with('adsmember',session('adsmember'));
    }
}
