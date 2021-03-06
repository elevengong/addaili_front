<?php

namespace App\Http\Controllers\backend;

use App\Model\CommonSetting;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    private $domain;
    protected $backendPageNum;
    protected $commonSetting;
    private $apiUrl;
    protected $pwd;

    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
        $this->domain = 'http://www.feiyueun.com';
        $this->apiUrl = 'http://www.ck.com/getcurl.php';
        $this->pwd = 'abc';
        $this->backendPageNum = '10';
        $commonSetting = CommonSetting::where('status',1)->orderBy('common_set_id','asc')->get()->toArray();
        foreach($commonSetting as $set)
        {
            $this->commonSetting[$set['name']] = $set['value'];
        }
    }

    public function curl($dataArray){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->apiUrl);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $dataArray);
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }

    //删除指定session数据
    public function deleteSession($request, $key)
    {
        return $request->session()->forget($key);
    }

    //删除所有session数据
    public function deleteAllSession($request)
    {
        return $request->session()->flush();
    }

    //判断是否为数字
    public function isNumeric($value)
    {
        return is_numeric($value);
    }

    //判断密码长度是否达到最少6位数
    public function isPassword($pwd)
    {
        if (strlen($pwd) < 6) {
            return false;
        } else {
            return true;
        }
    }

    //判断邮箱是否正确
    public function isEmail($email)
    {
        $mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
        if (preg_match($mode, $email)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 是否是手机号码
     * @param string $phone 手机号码
     * @return boolean
     */
    function is_phone($phone)
    {
        if (strlen($phone) != 11 || !preg_match('/^1[3|4|5|8][0-9]\d{4,8}$/', $phone)) {
            return false;
        } else {
            return true;
        }

    }

    //上传广告图片
    public function uploadphoto(Request $request,$id){
        $file = $request->file($id);//获取图片
        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array(strtolower($file->getClientOriginalExtension()), $allowed_extensions)) {
            return Response()->json([
                'status' => 0,
                'msg' => '只能上传 png | jpg | gif格式的图片'
            ]);
        }
        $today = date('Ymd',time());
        $dir =  dirname(dirname(dirname(dirname(__DIR__))))."/public/uploads/".$today."/";
        if(!is_dir($dir)){
            mkdir($dir, 0777);
        }
        $destinationPath = 'public/uploads/'.$today.'/';
        $extension = $file->getClientOriginalExtension();
        $fileName = time().str_random(5).'.'.$extension;
        $file->move($destinationPath, $fileName);

        $sizeArray = getimagesize($this->domain."/".$destinationPath.$fileName);

        return Response()->json(
            [
                'status' => 1,
                //'pic' => asset($destinationPath.$fileName),
                'pic' => "/".$destinationPath.$fileName,
                'size' => $sizeArray[0].'x'.$sizeArray[1],
                'msg' => '上传成功！'
            ]
        );
    }

}