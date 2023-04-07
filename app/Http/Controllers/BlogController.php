<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $data=Blog::all();
        return view('blog.index',compact('data'));
    }

    public function create(){
        return view('blog.create');
    }

    public function store(BlogRequest $request){
        $data=$request->validated();
        Blog::create($data);
        return redirect()->route('blog.index');
        
        //Blog::create($request->all());
        //return redirect()->route('blog.index');
    }

    public function edit(Blog $blog){
       return view('blog.edit',compact('blog'));
    }

    public function update(BlogRequest $request,Blog $blog){

       // $blog->update($request->all());
       $data=$request->validated();
       $blog->update($data);
        return redirect()->route('blog.index');
    }

    public function show(Blog $blog){
      return view('blog.show',compact('blog'));
    }

    public function destroy(Blog $blog){
        $blog->delete();
        return redirect()->route('blog.index');
    }
}

