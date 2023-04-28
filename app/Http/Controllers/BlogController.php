<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Repository\Blog\BlogInterface;
use App\Services\Blog\BlogServicesInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    private $blogRepo;
    private $blogService;

    public function __construct(BlogInterface $blogRepo,BlogServicesInterface $blogService)
    {
        $this->blogRepo=$blogRepo;
        $this->blogService=$blogService;
        $this->middleware('permission:blogList',['only'=>['index']]);
        $this->middleware('permission:blogCreate',['only'=>['create','store']]);
        $this->middleware('permission:blogShow',['only'=>['show']]);
        $this->middleware('permission:blogEdit',['only'=>['edit','update']]);
        $this->middleware('permission:blogDestroy',['only'=>['destroy']]);
        $this->middleware('auth');
    }
    
    public function index(){
        // $data=Blog::paginate(3);
        // $data=Blog::all();
         $data= $this->blogRepo->index();
         return view('backend.blog.index',compact('data'));
    }

    public function create(){
        return view('backend.blog.create');
    }

    public function store(BlogRequest $request){

        $data=$request->validated();
        $this->blogService->store($data);

        // if ($request->hasFile('image')) {
        //     $imgName = time() . '.' . $request->image->extension();
        //     Storage::putFileAs('public/blog_image', $request->file('image'), $imgName);
        //     $data['image'] = $imgName;
        // }

        // Blog::create($data);
        return redirect()->route('blog.index');

    }

    public function edit(Blog $blog){
       return view('backend.blog.edit',compact('blog'));
    }

    public function update(BlogRequest $request,Blog $blog){

       // $blog->update($request->all());
    //    $data=$request->validated();
    //    $blog->update($data);
    //    return redirect()->route('blog.index');
     $data = $request->validated();
     $this->blogService->update($data,$blog);
     
    //  if ($request->hasFile('image')) {
    //     $imgName = time() . '.' . $request->image->extension();
    //     Storage::putFileAs('public/blog_image', $request->file('image'), $imgName);
    //     $data['image'] = $imgName;
    //     if ($blog->image) {
    //         Storage::delete('public/blog_image/' . $blog->image);
    //     }
    // }
    // $blog->update($data);
    return redirect()->route('blog.index');

    }

    public function show($id){
        $blog=$this->blogRepo->show($id);
        return view('backend.blog.show', compact('blog'));
    }

    public function destroy(Blog $blog){
        $blog->delete();
        return redirect()->route('blog.index');
    }
}

