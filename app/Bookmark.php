<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{

    protected $table= 'bookmarks';

    protected $fillable = [
        'user_id', 'category_id', 'bookmark_name', 'bookmark_url', 'created_at', 'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
