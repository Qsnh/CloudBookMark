<?php

namespace App\Http\Controllers\Api;

use Auth;
use Hash;
use Fractal;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;

class UserController extends Controller
{

    public function me()
    {
        $array = Fractal::item(Auth::user(), new UserTransformer())->getArray();

        return $this->apiResponse(0, '', $array);
    }

    public function create(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return $this->apiResponse(1, $validator->errors()->first());
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        if ($user) {
            return $this->apiResponse(0, '注册成功！');
        }

        return $this->apiResponse(1, '注册失败！');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:16|unique:users',
            'email'    => 'required|email|max:64|unique:users',
            'password' => 'required|min:6|max:16|confirmed',
        ], [
            'name.required'      => '请输入昵称',
            'name.max'           => '昵称不能超过16个字',
            'name.unique'        => '呢称已经存在',
            'email.required'     => '请输入邮箱',
            'email.email'        => '请输入有效邮箱',
            'email.max'          => '邮箱不能超过64个字符',
            'email.unique'       => '邮箱已经存在',
            'password.required'  => '请输入密码',
            'password.min'       => '密码不小于6个字符',
            'password.max'       => '密码不大于16个字符',
            'password.confirmed' => '两次输入密码不一致',
        ]);
    }

    public function postChangePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:6|max:16|confirmed'
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(1, $validator->errors()->first());
        }

        $user = Auth::user();

        if (! Hash::check($request->input('old_password'), $user->password)) {
            return $this->apiResponse(1, '原密码不正确');
        }

        $user->password = bcrypt($request->input('new_password'));
        $user->save();

        return $this->apiResponse(0, '操作成功！');
    }

}
