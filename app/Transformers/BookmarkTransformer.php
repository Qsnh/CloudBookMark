<?php namespace App\Transformers;

use App\Bookmark;
use League\Fractal\TransformerAbstract;

class BookmarkTransformer extends TransformerAbstract
{

    public function transform(Bookmark $bookmark)
    {
        return [
            'id' => $bookmark->id,
            'category' => $bookmark->category,
            'bookmark_name' => $bookmark->bookmark_name,
            'bookmark_url' => $bookmark->bookmark_url,
        ];
    }

}