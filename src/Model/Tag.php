<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate;

class Tag extends Illuminate\Database\Eloquent\Model
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}