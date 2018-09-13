<?php

namespace App\Http\Controllers\Frontend;

use App\Bookmark;
use App\Http\Requests\BookmarkRequest;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends BaseController
{

    public function create()
    {
        $categories = Auth::user()->categories()->orderByDesc('id')->get();
        return view('frontend.bookmark.create', compact('categories'));
    }

    public function store(BookmarkRequest $request)
    {
        Auth::user()->bookmarks()->save(new Bookmark($request->filldata()));
        flash()->success('创建成功');
        return back();
    }

    public function edit($id)
    {
        $bookmark = Auth::user()->findBookmark($id);
        return view('frontend.bookmark.edit', compact('bookmark'));
    }

    public function update(BookmarkRequest $request, $id)
    {
        $bookmark = Auth::user()->findBookmark($id);
        $bookmark->fill($request->filldata())->save();
        flash()->success('保存成功');
        return back();
    }

    public function destroy($id)
    {
        $bookmark = Auth::user()->findBookmark($id);
        $bookmark->delete();
        flash()->success('删除成功');
        return back();
    }

}
