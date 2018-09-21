<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function create()
    {
        return view('frontend.category.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        Auth::user()->categories()->save(new Category($request->filldata()));
        flash()->success('分类添加成功');
        return redirect(url('/'));
    }

}
