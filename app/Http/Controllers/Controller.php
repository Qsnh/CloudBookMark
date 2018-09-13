<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function apiResponse($code = 0, $message = '', $data = [])
    {
        return response()->json(array_merge([
            'code'    => $code,
            'status'  => $code == 0 ? 'success' : 'error',
            'message' => $message,
        ], $data));
    }

}