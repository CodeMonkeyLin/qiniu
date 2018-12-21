<?php

namespace App\Http\Controllers;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Illuminate\Http\Request;

class QiniuPublicUrlController extends Controller
{
    public function index()
    {
        $fileName = 'Ftz_hhmEEUsBqqb_oszpxodvr_8C';
        $baseUrl = 'http://'.env('QINIU_URL').'/'.$fileName;
        return $baseUrl;
    }
}