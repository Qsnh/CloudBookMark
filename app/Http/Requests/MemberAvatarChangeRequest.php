<?php

namespace App\Http\Requests;


class MemberAvatarChangeRequest extends FrontendRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'avatar.required' => '请上传头像',
            'avatar.image' => '请上传图片文件',
        ];
    }
}
