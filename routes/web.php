<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/qiniu', 'QiniuTokenController@index')->name('QiniuToken.index');
Route::get('/qiniu-token', 'QiniuUrlController@index')->name('QiniuUrlController.index');
Route::get('/qiniu-public', 'QiniuPublicTokenController@index')->name('QiniuPublicToken.index');
Route::get('/qiniu-public-token', 'QiniuPublicUrlController@index')->name('QiniuPublicUrlController.index');