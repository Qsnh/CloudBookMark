<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{

    public function index()
    {
        $categories = collect([]);
        if (Auth::check()) {
            $categories = Auth::user()->categories()->with(['bookmarks'])->orderByDesc('updated_at')->get();
        }
        return view('frontend.index.index', compact('categories'));
    }

}
