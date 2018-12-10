<?php

namespace App\Http\Controllers\backend\webmember;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\CommonController;


class WebsiteController extends CommonController
{
    public function websitelist(){
        return view('backend.webmember.list_website')->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
    }

    public function add(Request $request){
        if($request->isMethod('post')){

        }else{
            return view('backend.webmember.add_website')->with('webmaster_id',session('webmaster_id'))->with('webmember',session('webmember'));
        }

    }
}
