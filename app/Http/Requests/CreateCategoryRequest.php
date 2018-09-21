<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'category_name' => 'required|max:10',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => '请填写分类名',
            'category_name.max'      => '分类长度最大10个字',
        ];
    }

    public function filldata()
    {
        return ['category_name' => $this->input('category_name')];
    }

}
