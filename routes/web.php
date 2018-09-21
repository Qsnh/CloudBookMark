<?php

Route::get('/', 'Frontend\IndexController@index');

Auth::routes();

Route::group([
    'prefix' => '/member',
    'middleware' => ['auth'],
    'namespace' => 'Frontend'
], function () {
    Route::get('/', 'MemberController@index')->name('member');

    // 密码重置
    Route::get('/password/change', 'MemberController@showPasswordChangePage')->name('member.password');
    Route::post('/password/change', 'MemberController@passwordChangeHandler');

    // 头像重置
    Route::get('/avatar/change', 'MemberController@showAvatarChangePage')->name('member.avatar');
    Route::post('/avatar/change', 'MemberController@avatarChangeHandler');

});