<?php
namespace App\Repository\Blog;

use App\Models\Blog;

class BlogRepository implements BlogInterface  {
    
    public function index() {

        $data=Blog::all();
        return $data;
        
    }

    public function show($id){
        $blog = Blog::findOrFail($id);
        return $blog;
    }
}