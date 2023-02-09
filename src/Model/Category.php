<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate;

class Category extends Illuminate\Database\Eloquent\Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}