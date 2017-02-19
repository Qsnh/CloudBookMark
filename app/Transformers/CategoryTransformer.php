<?php namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{

    public function transform(Category $category)
    {
        return [
            'id'            => $category->id,
            'category_name' => $category->category_name,
            'created_at'    => $category->created_at,
            'updated_at'    => $category->updated_at,
        ];
    }

}