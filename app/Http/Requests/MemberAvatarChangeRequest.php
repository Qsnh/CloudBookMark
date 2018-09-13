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
            'avatar' => 'required|image|size:1024',
        ];
    }

    public function messages()
    {
        return [
            'avatar.required' => '请上传头像',
            'avatar.image' => '请上传图片文件',
            'avatar.size' => '头像文件大小不能超过1m',
        ];
    }
}
