<?php namespace App\Http\Controllers\ApiTwo;

use Auth;
use Fractal;
use App\Http\Controllers\Controller;
use App\Transformers\BookmarkTransformer;
use App\Http\Requests\CreateBookmarkRequest;

class BookmarkController extends Controller
{

    public function all()
    {
        $bookmarks = Auth::user()->bookmarks;

        $array = Fractal::collection($bookmarks, new BookmarkTransformer())->getArray();

        return response()->json($array);
    }

    public function store(CreateBookmarkRequest $request)
    {
        Auth::user()->bookmarks()->create($request->only([
            'category_id', 'bookmark_name', 'bookmark_url'
        ]));

        return response('', 201);
    }

    public function delete($bookmark_id)
    {
        $bookmark = Auth::user()->bookmarks()->where('id', $bookmark_id)->firstOrFail();

        $bookmark->delete();

        return response('', 204);
    }

    public function edit($bookmark_id)
    {
        //
    }

}