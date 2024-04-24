<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Post::all();
    }
}
