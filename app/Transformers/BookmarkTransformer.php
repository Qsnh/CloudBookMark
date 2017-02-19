<?php namespace App\Transformers;

use App\Bookmark;
use League\Fractal\TransformerAbstract;

class BookmarkTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'category',
    ];

    public function transform(Bookmark $bookmark)
    {
        return [
            'id' => $bookmark->id,
            'bookmark_name' => $bookmark->bookmark_name,
            'bookmark_url' => $bookmark->bookmark_url,
        ];
    }

    public function includeCategory(Bookmark $bookmark)
    {
        $category = $bookmark->category;

        return $this->item($category, new CategoryTransformer());
    }

}