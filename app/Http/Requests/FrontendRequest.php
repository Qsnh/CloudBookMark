<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrontendRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

}
