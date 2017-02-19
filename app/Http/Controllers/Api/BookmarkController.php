<?php

namespace App\Http\Controllers\Api;

use Auth;
use Fractal;
use Validator;
use App\Bookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\BookmarkTransformer;

class BookmarkController extends Controller
{

    public function all()
    {
        $bookmarks = Auth::user()->bookmarks;

        $array = Fractal::collection($bookmarks, new BookmarkTransformer())->getArray();

        return $this->apiResponse(0, '', $array);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id'   => 'required',
            'bookmark_name' => 'required|max:255',
            'bookmark_url'  => 'required|max:255',
        ], [
            'category_id.required'   => '请选择书签分类',
            'bookmark_name.required' => '请输入书签名',
            'bookmark_name.max'      => '书签名最大长度不能超过255个字',
            'bookmark_url.required'  => '请输入书签地址',
            'bookmark_url.max'       => '书签地址最大长度不能超过255个字符',
        ]);

        if (is_null(
            Auth::user()->categories()->where('id', $request->input('category_id'))->first()
        )) {
            return $this->apiResponse(1, '分类不存在！');
        }

        if ($validator->fails()) {
            return $this->apiResponse(1, $validator->errors());
        }

        Bookmark::create(array_merge(
            ['user_id' => Auth::id()],
            $request->except(['_token'])
        ));

        return $this->apiResponse(0, '操作成功！');
    }

    public function edit($bookmark_id)
    {
        //
    }

    public function delete($bookmark_id)
    {
        $bookmark = Auth::user()->bookmarks()->where('id', $bookmark_id)->first();

        if (is_null($bookmark)) {
            return $this->apiResponse(1, '书签不存在！');
        }

        Bookmark::where('id', $bookmark_id)->delete();

        return $this->apiResponse(0, '操作成功！');
    }

}
