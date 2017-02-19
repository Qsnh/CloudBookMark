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

Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function () {
    /** 获取用户基本信息 */
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    /** 获取所有书签分类 */
    Route::get('/category/all', 'Api\CategoryController@all');
    /** 添加书签分类 */
    Route::post('/category/add', 'Api\CategoryController@create');
    /** 编辑书签 */
    Route::post('/category/{id}/edit', 'Api\CategoryController@edit');
    /** 删除书签分类 */
    Route::delete('/category/{id}/delete', 'Api\CategoryController@delete');

});
