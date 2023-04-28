<?php

namespace App\Repository\Post;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface {

    public function index()
    {
        $posts=Post::with('author')->get();

        return $posts;
        
    }

    public function show(){

    }
}