<?php

namespace App\Http\Requests;

class CategoryRequest extends FrontendRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_name' => 'required|max:10',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => '请填写分类名',
            'category_name.max' => '分类长度最大10个字',
        ];
    }

    public function filldata()
    {
        return [
            'category_name' => $this->post('category_name'),
        ];
    }

}
