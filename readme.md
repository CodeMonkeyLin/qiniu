## 后台
### 基本配置
- 加七牛云秘钥AccessKey/SecretKey添加到项目配置文件.env
```bash
QINIU_ACCESS_KEY=AccessKey
QINIU_SECRET_KEY=SecretKey
QINIU_BUCKET=公有空间名
QINIU_PRIVATE_BUCKET=私有空间名
QINIU_URL=公有空间对应域名
QINIU_PRIVATE_URL=私有空间对应域名
```
- 安装qiniu/php-sdk
```bash
composer require qiniu/php-sdk
```
### 生成upload_token
```bash
<?php

namespace App\Http\Controllers;

use Qiniu\Auth;

class QiniuPublicTokenController extends Controller
{
    public function index()
    {
        // 用于签名的公钥和私钥
        $accessKey = env('QINIU_ACCESS_KEY');
        $secretKey = env('QINIU_SECRET_KEY');
        // 初始化签权对象
        $auth = new Auth($accessKey, $secretKey);
        //私有空间改为QINIU_PRIVATE_BUCKET
        $bucket = env('QINIU_BUCKET');
        // 生成上传Token
        $token = $auth->uploadToken($bucket);
        return view('qiniu', ["token" => $token]);
    }
}
```
### 私有空间生成download_token获取静态资源
```bash
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
        // 生成上传downloadTokenUrl
        //文件名
        $fileName = 'FiqdQ53c_F1_4Fivk0ns9AqC39Ui';
        $baseUrl = 'http://'.env('QINIU_PRIVATE_URL').'/'.$fileName;
        $authUrl = $auth->privateDownloadUrl($baseUrl);
        return $authUrl;
    }
}
```
### 公有空间静态资源获取
```bash
<?php

namespace App\Http\Controllers;

class QiniuPublicUrlController extends Controller
{
    public function index()
    {
        //文件名
        $fileName = 'Ftz_hhmEEUsBqqb_oszpxodvr_8C';
        $baseUrl = 'http://'.env('QINIU_URL').'/'.$fileName;
        return $baseUrl;
    }
}
```