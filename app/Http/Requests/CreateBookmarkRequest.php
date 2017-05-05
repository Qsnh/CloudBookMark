<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookmarkRequest extends FormRequest
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
            'category_id'   => 'required',
            'bookmark_name' => 'required|max:255',
            'bookmark_url'  => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required'   => '请选择书签分类',
            'bookmark_name.required' => '请输入书签名',
            'bookmark_name.max'      => '书签名最大长度不能超过255个字',
            'bookmark_url.required'  => '请输入书签地址',
            'bookmark_url.max'       => '书签地址最大长度不能超过255个字符',
        ];
    }

}
