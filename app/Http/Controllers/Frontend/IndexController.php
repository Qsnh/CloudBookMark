<?php

namespace App\Http\Controllers\Frontend;

class IndexController extends BaseController
{

    public function index()
    {
        return view('frontend.index');
    }

}
