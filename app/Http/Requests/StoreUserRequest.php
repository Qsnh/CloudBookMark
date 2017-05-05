<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|max:16|unique:users',
            'email'    => 'required|email|max:64|unique:users',
            'password' => 'required|min:6|max:16|confirmed',
        ];
    }

    public function messages()
    {
        return [
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
        ];
    }

}
