<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends BaseController
{

    public function create()
    {
        return view('frontend.category.create');
    }

    public function store(CategoryRequest $request)
    {
        Auth::user()->categories()->save(new Category($request->filldata()));
        flash()->success('创建成功');
        return back();
    }

    public function edit($id)
    {
        $category = Auth::user()->findCategory($id);
        return view('frontend.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Auth::user()->findCategory($id);
        $category->fill($request->filldata())->save();
        flash()->success('保存成功');
        return back();
    }

    public function destroy($id)
    {
        $category = Auth::user()->findCategory($id);
        if ($category->bookmarks()->exists()) {
            flash()->error('该分类下存在标签');
        } else {
            $category->delete();
            flash()->success('删除成功');
        }
        return back();
    }

}
