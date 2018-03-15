<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'price', 'count', 'photo_path'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
