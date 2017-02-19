<?php namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'bookmarks',
    ];

    public function transform(Category $category)
    {
        return [
            'id'            => $category->id,
            'category_name' => $category->category_name,
        ];
    }

    public function includeBookmarks(Category $category)
    {
        $bookmarks = $category->bookmarks;

        return $this->collection($bookmarks, new BookmarkTransformer());
    }

}