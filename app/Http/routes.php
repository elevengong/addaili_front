<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//---------------------广告商后台------------------------


Route::group(['middleware' => ['web','adsmember.login']],function () {
    Route::any('/adsmember/service/index','backend\adsmember\IndexController@index');



    //图片上传
    Route::any('/backend/uploadphoto/{id}','MyController@uploadphoto');
});


//---------------------站长后台------------------------


Route::group(['middleware' => ['web','webmember.login']],function () {




    //图片上传
    Route::any('/backend/uploadphoto/{id}','MyController@uploadphoto');
});


//---------------------pc前端------------------------

Route::get('/','frontend\IndexController@index');
Route::get('/index.html','frontend\IndexController@index');
Route::get('/advance.html','frontend\IndexController@advance');
Route::get('/lists_notice.html','frontend\IndexController@listsnotice');
Route::get('/notice/{notice_id}.html','frontend\IndexController@notice')->where(['notice_id' => '[0-9]+']);
Route::get('/help.html','frontend\IndexController@help');
Route::get('/about.html','frontend\IndexController@about');
Route::get('/protocol.html','frontend\IndexController@protocol');



Route::group(['middleware' => ['web']],function () {
    Route::any('/login.html','frontend\IndexController@login');
    Route::any('/register.html','frontend\IndexController@register');
    Route::any('/logout.html','frontend\IndexController@logout');

    Route::get('/backend/code','frontend\IndexController@code');
});








