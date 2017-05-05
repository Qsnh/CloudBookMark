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

/** API Version 1.0 */
Route::post('/v1/user/add', 'Api\UserController@create');
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
    Route::get('/category/{id}/find', 'Api\CategoryController@find')->where('id', '[0-9]+');
    /** 编辑分类 */
    Route::post('/category/{id}/edit', 'Api\CategoryController@edit')->where('id', '[0-9]+');
    /** 删除分类 */
    Route::delete('/category/{id}/delete', 'Api\CategoryController@delete')->where('id', '[0-9]+');

    /** 获取所有书签 */
    Route::get('/bookmark', 'Api\BookmarkController@all');
    /** 添加书签 */
    Route::post('/bookmark/add', 'Api\BookmarkController@create');
    /** 编辑书签 */
    Route::post('/bookmark/{id}/edit', 'Api\BookmarkController@edit')->where('id', '[0-9]+');
    /** 删除书签 */
    Route::delete('/bookmark/{id}/delete', 'Api\BookmarkController@delete')->where('id', '[0-9]+');
});

/** API Version 2.0 */
Route::post('/v2/user', 'ApiTwo\UserController@store');
Route::group(['prefix' => 'v2', 'middleware' => ['auth:api'], 'namespace' => 'ApiTwo'], function () {

    /** 获取用户信息 */
    Route::get('/user', 'UserController@current');
    /** 更换密码 */
    Route::patch('/user/password', 'UserController@changePassword');

    /** 获取所有分类 */
    Route::get('/categories', 'CategoryController@all');
    /** 添加分类 */
    Route::post('/category', 'CategoryController@store');
    /** 查找分类 */
    Route::get('/category/{id}', 'CategoryController@single')->where('id', '[0-9]+');
    /** 编辑分类 */
    Route::patch('/category/{id}', 'CategoryController@update')->where('id', '[0-9]+');
    /** 删除分类 */
    Route::delete('/category/{id}', 'CategoryController@delete')->where('id', '[0-9]+');

    /** 获取所有书签 */
    Route::get('/bookmarks', 'BookmarkController@all');
    /** 添加书签 */
    Route::post('/bookmark', 'BookmarkController@store');
    /** 编辑书签 */
    Route::patch('/bookmark/{id}', 'BookmarkController@edit')->where('id', '[0-9]+');
    /** 删除书签 */
    Route::delete('/bookmark/{id}', 'BookmarkController@delete')->where('id', '[0-9]+');
});