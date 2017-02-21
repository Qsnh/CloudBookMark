<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** 用户注册 */
Route::post('v1/user/add', 'Api\UserController@create');

Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function () {

    /** 获取用户信息 */
    Route::get('/user', 'Api\UserController@me');
    /** 更换密码 */
    Route::post('/user/change_password', 'Api\UserController@postChangePassword');

    /** 获取所有分类 */
    Route::get('/category', 'Api\CategoryController@all');
    /** 添加分类 */
    Route::post('/category/add', 'Api\CategoryController@create');
    /** 查找分类 */
    Route::get('/category/{id}/find', 'Api\CategoryController@find');
    /** 编辑分类 */
    Route::post('/category/{id}/edit', 'Api\CategoryController@edit');
    /** 删除分类 */
    Route::delete('/category/{id}/delete', 'Api\CategoryController@delete');

    /** 获取所有书签 */
    Route::get('/bookmark', 'Api\BookmarkController@all');
    /** 添加书签 */
    Route::post('/bookmark/add', 'Api\BookmarkController@create');
    /** 编辑书签 */
    Route::post('/bookmark/{id}/edit', 'Api\BookmarkController@edit');
    /** 删除书签 */
    Route::delete('/bookmark/{id}/delete', 'Api\BookmarkController@delete');
});
