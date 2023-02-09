<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate;

class Post extends Illuminate\Database\Eloquent\Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}