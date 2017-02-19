<?php

namespace App\Http\Controllers\Api;

use Auth;
use Fractal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;

class UserController extends Controller
{

    public function me()
    {
        return Fractal::item(Auth::user(), new UserTransformer());
    }

}
