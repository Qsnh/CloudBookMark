<?php

Route::get('/', 'Frontend\IndexController@index');

Auth::routes();

Route::group([
    'prefix' => '/member',
    'middleware' => ['auth'],
    'namespace' => 'Frontend'
], function () {
    Route::get('/', 'MemberController@index');

    // 密码重置
    Route::get('/password/change', 'MemberController@showPasswordChangePage');
    Route::post('/password/change', 'MemberController@passwordChangeHandler');

    // 头像重置
    Route::get('/avatar/change', 'MemberController@showAvatarChangePage');
    Route::post('/avatar/change', 'MemberController@avatarChangeHandler');

    // 分类
    Route::resource('/category', 'CategoryController');
    // 书签
    Route::resource('/bookmark', 'BookmarkController');

});