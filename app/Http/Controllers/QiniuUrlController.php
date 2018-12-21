<?php

namespace App\Http\Controllers;

use Qiniu\Auth;

class QiniuUrlController extends Controller
{
    public function index()
    {
        // 用于签名的公钥和私钥
        $accessKey = env('QINIU_ACCESS_KEY');
        $secretKey = env('QINIU_SECRET_KEY');
        // 初始化签权对象
        $auth = new Auth($accessKey, $secretKey);
        // 生成上传Token
        $fileName = 'FiqdQ53c_F1_4Fivk0ns9AqC39Ui';
        $baseUrl = 'http://'.env('QINIU_PRIVATE_URL').'/'.$fileName;
        $authUrl = $auth->privateDownloadUrl($baseUrl);
        return $authUrl;
    }
}