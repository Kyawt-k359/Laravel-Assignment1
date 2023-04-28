<?php
namespace App\Services\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogServices implements BlogServicesInterface {

    public function store($data)
    {
        if ($data['image']) {
            $imgName = time() . '.' . $data['image']->extension();
            Storage::putFileAs('public/blog_image', $data['image'], $imgName);
            $data['image'] = $imgName;
        }

        return Blog::create($data);
    }

    public function update($data,$blog){
        
          if ($data['image']) {
            $imgName = time() . '.' . $data['image']->extension();
            Storage::putFileAs('public/blog_image', $data['image'], $imgName);
            $data['image'] = $imgName;
            if ($blog->image) {
                Storage::delete('public/blog_image/' . $blog->image);
            }
         }
       return  $blog->update($data);
    }
}