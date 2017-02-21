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

    Route::get('/user', 'Api\UserController@me');
    Route::post('/user/change_password', 'Api\UserController@postChangePassword');

    Route::get('/category', 'Api\CategoryController@all');
    Route::post('/category/add', 'Api\CategoryController@create');
    Route::get('/category/{id}/find', 'Api\CategoryController@find');
    Route::post('/category/{id}/edit', 'Api\CategoryController@edit');
    Route::delete('/category/{id}/delete', 'Api\CategoryController@delete');

    Route::get('/bookmark', 'Api\BookmarkController@all');
    Route::post('/bookmark/add', 'Api\BookmarkController@create');
    Route::post('/bookmark/{id}/edit', 'Api\BookmarkController@edit');
    Route::delete('/bookmark/{id}/delete', 'Api\BookmarkController@delete');
});
