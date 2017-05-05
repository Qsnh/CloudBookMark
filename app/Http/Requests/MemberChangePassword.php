<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberChangePassword extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'required|min:6|max:16|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'old_password.required'  => '请输入旧密码',
            'new_password.required'  => '请输入新密码',
            'new_password.min'       => '密码长度最低6个字符',
            'new_password.max'       => '密码长度最高16个字符',
            'new_password.confirmed' => '两次输入的密码不一致',
        ];
    }

}
