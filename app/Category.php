<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';

    protected $fillable = [
        'user_id', 'category_name',
    ];

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
