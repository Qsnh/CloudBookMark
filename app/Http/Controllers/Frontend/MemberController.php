<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\MemberAvatarChangeRequest;
use App\Http\Requests\MemberChangePassword;
use Illuminate\Support\Facades\Auth;

class MemberController extends BaseController
{

    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function index()
    {
        return view('frontend.member.index');
    }

    public function showPasswordChangePage()
    {
        return view('frontend.member.password_change');
    }

    public function passwordChangeHandler(MemberChangePassword $request)
    {
        $oldPassword = $request->post('old_password');
        $newPassword = $request->post('new_password');
        $user = Auth::user();

        if (!$user->checkPasswordIsOk($oldPassword)) {
            flash()->error('原密码错误');
        } else {
            $user->changePassword($newPassword);
            flash()->success('密码修改成功');
        }
        return back();
    }

    public function showAvatarChangePage()
    {
        return view('frontend.member.avatar_change');
    }

    public function avatarChangeHandler(MemberAvatarChangeRequest $request)
    {
        Auth::user()->saveAvatar($request->file('file'));
        flash()->success('头像修改成功');
        return back();
    }

}
