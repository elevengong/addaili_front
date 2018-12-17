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

    Route::any('/adsmember/ads/lists','backend\adsmember\AdsController@lists');
    Route::get('/adsmember/ads/add','backend\adsmember\AdsController@add');
    Route::post('/adsmember/ads/addprocess','backend\adsmember\AdsController@addprocess');
    Route::get('/adsmember/ads/edit/{ads_id}','backend\adsmember\AdsController@edit');
    Route::post('/adsmember/ads/getallmaterial','backend\adsmember\AdsController@getallmaterial');
    Route::post('/adsmember/ads/choosematerial/{id}','backend\adsmember\AdsController@choosematerial')->where(['id' => '[0-9]+']);
    Route::post('/adsmember/ads/getmaterialbyid/{id}','backend\adsmember\AdsController@getmaterialbyid')->where(['id' => '[0-9]+']);

    Route::any('/adsmember/service/report','backend\adsmember\ReportController@report');

    Route::any('/adsmember/account/info','backend\adsmember\AccountController@info');
    Route::post('/adsmember/account/updateqq','backend\adsmember\AccountController@updateqq');
    Route::post('/adsmember/account/updatepwd','backend\adsmember\AccountController@updatepwd');

    Route::any('/adsmember/account/deposit','backend\adsmember\AccountController@deposit');
    Route::any('/adsmember/account/deposit/lists','backend\adsmember\AccountController@depositlist');

    Route::any('/adsmember/message/lists','backend\adsmember\MessageController@messagelist');

    Route::any('/adsmember/material/lists','backend\adsmember\MaterialController@materiallist');
    Route::any('/adsmember/material/upload','backend\adsmember\MaterialController@upload');
    Route::post('/adsmember/material/upload/process','backend\adsmember\MaterialController@uploadprocess');
    Route::delete('/adsmember/material/del/{id}','backend\adsmember\MaterialController@delete')->where(['id' => '[0-9]+']);

    //图片上传
    Route::any('/backend/uploadphoto/{id}','backend\CommonController@uploadphoto');
});


//---------------------站长后台------------------------


Route::group(['middleware' => ['web','webmember.login']],function () {

    Route::any('/webmember/service/index','backend\webmember\IndexController@index');

    Route::any('/webmember/message/lists','backend\webmember\MessageController@lists');

    Route::any('/webmember/member/setting','backend\webmember\SettingController@index');
    Route::post('/webmember/setting/updatepwd','backend\webmember\SettingController@updatepwd');
    Route::post('/webmember/setting/updateqq','backend\webmember\SettingController@updateqq');
    Route::post('/webmember/setting/updatemobile','backend\webmember\SettingController@updatemobile');
    Route::post('/webmember/setting/addbankinfo','backend\webmember\SettingController@addbankinfo');
    Route::delete('/webmember/setting/addbankinfo/del/{withdraw_info_id}','backend\webmember\SettingController@delbankinfo')->where(['withdraw_info_id' => '[0-9]+']);

    Route::any('/webmember/website/index','backend\webmember\WebsiteController@websitelist');
    Route::any('/webmember/website/add','backend\webmember\WebsiteController@add');
    Route::delete('/webmember/website/delete','backend\webmember\WebsiteController@delete');

    Route::any('/webmember/ads/management','backend\webmember\AdsController@managementadslist');
    Route::any('/webmember/ads/add','backend\webmember\AdsController@add');
    Route::get('/webmember/ads/getadscode/{webmaster_ads_id}','backend\webmember\AdsController@getadscode')->where(['webmaster_ads_id' => '[0-9]+']);

    Route::any('/webmember/money/report','backend\webmember\MoneyController@commissionlist');
    Route::any('/webmember/money/withdraw','backend\webmember\MoneyController@withdraw');
    Route::any('/webmember/money/withdraw/record','backend\webmember\MoneyController@withdrawrecord');


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
Route::get('/contact.html','frontend\IndexController@contact');


Route::group(['middleware' => ['web']],function () {
    Route::any('/login.html','frontend\IndexController@login');
    Route::any('/register.html','frontend\IndexController@register');
    Route::any('/logout.html','frontend\IndexController@logout');

    //网站代理入口
    Route::get('/webdaili/{webdaili_id}','frontend\IndexController@dailientrance')->where(['webdaili_id' => '[0-9]+']);

    Route::get('/backend/code','frontend\IndexController@code');
});








