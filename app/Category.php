<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';

    protected $fillable = [
        'user_id', 'category_name', 'created_at', 'updated_at',
    ];

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark', 'category_id');
    }

}
