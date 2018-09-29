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
//后台 首页
Route::get('/admin', 'AdminController@index');

//后台 注册
Route::get('/enroll','AdminController@enroll');

//后台 操作注册
Route::post('/enroll','AdminController@doenroll');

//后台 登陆
Route::get('/login','AdminController@login');

//后台 操作登陆
Route::post('/login','AdminController@dologin');

// 后台 退出登陆
Route::get('/logout','AdminController@logout');

// 后台修改密码
Route::get('/changepw','AdminController@changepw');

// 后台修改密码操作
Route::post('/pass','AdminController@pass');

