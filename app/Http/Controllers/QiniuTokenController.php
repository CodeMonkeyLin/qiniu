<?php

namespace App\Http\Controllers;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Illuminate\Http\Request;

class QiniuTokenController extends Controller
{
    public function index(Request $request)
    {
        // 用于签名的公钥和私钥
        $accessKey = env('QINIU_ACCESS_KEY');
        $secretKey = env('QINIU_SECRET_KEY');
        // 初始化签权对象
        $auth = new Auth($accessKey, $secretKey);
        $bucket = env('QINIU_PRIVATE_BUCKET');
        // 生成上传Token
        $token = $auth->uploadToken($bucket);
        return view('qiniu', ["token" => $token]);
    }
}