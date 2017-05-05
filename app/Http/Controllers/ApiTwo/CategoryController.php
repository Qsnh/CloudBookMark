<?php namespace App\Http\Controllers\ApiTwo;

use Auth;
use Fractal;
use App\Bookmark;
use App\Http\Controllers\Controller;
use App\Transformers\CategoryTransformer;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{

    /** 获取当前用户所有的分类 */
    public function all()
    {
        $categories = Auth::user()->categories;

        $array = Fractal::collection($categories, new CategoryTransformer())->getArray();

        return response()->json($array);
    }

    /** 获取单个分类 */
    public function single($category_id)
    {
        $category = Auth::user()->categories()->where('id', $category_id)->firstOrFail();

        return response()->json(Fractal::item($category, new CategoryTransformer())->getArray());
    }

    /** 保存分类 */
    public function store(CreateCategoryRequest $request)
    {
        Auth::user()->categories()->create(['category_name' => $request->input('category_name')]);

        return response('', 201);
    }

    /** 编辑分类 */
    public function update(CreateCategoryRequest $request, $category_id)
    {
        $category = Auth::user()->categories()->where('id', $category_id)->firstOrFail();
        $category->category_name = $request->input('category_name');
        $category->save();

        return response('', 201);
    }

    /** 删除分类 */
    public function delete($category_id)
    {
        $category = Auth::user()->categories()->where('id', $category_id)->firstOrFail();

        /** 删除该分类下的所有书签 */
        Bookmark::where('category_id', $category->id)->delete();
        /** 删除self */
        $category->delete();

        return response('', 204);
    }

}
