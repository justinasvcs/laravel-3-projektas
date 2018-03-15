<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'author', 'draft'];

//    protected $guarded = ['draft'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
