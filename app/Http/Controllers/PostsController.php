<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Author;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Repository\Post\PostRepositoryInterface;

class PostsController extends Controller
{
    private $postRepo;
    public function __construct(PostRepositoryInterface $postRepo)
    {
        $this->postRepo=$postRepo;
        $this->middleware('permission:postList',['only'=>['index']]);
        $this->middleware('permission:postCreate',['only'=>['create','store']]);
        $this->middleware('permission:postShow',['only'=>['show']]);
        $this->middleware('permission:postEdit',['only'=>['edit','update']]);
        $this->middleware('permission:postDelete',['only'=>['destroy']]);
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts= $this->postRepo->index();
        // $posts=Post::with('author')->get();
       return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Author::all();
        //dd($data);
        return view('backend.post.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
       
    //     Post::create([
    //     'title' => $request->title,
    //     'description' => $request->description,
    //     'is_active' => $request->has("is_active") ? 1 : 0
    // ]);

    //Post::create($request->all());

    $data=$request->validated();
    $imgName=null;
    
    if($request->hasFile('image')){
        $imgName = time() . '.' . $request->image->extension();

        // $request->image->storeAs('public/post_image', $imgName);
       
        $request->image->move(public_path('post_image'),$imgName);
    }
    
    $data=array_merge($data,['image'=>$imgName, 'is_active'=> $request->has('is_active') ? 1 : 0]);
  // $data['image']=$imgName; // src mhr $post->image lo call yone pae
    Post::create($data);
    

    // Post::create([

    //     'title' => $data['title'],
    //     'description' => $data['description'],
    //     'image' =>$data['image'],
    //     'is_active' => $request->has('is_active') ? 1 : 0
    // ]);

       return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result=Post::where('id',$id)->first();
        //dd($result);
        return view('backend.post.show',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $posts=Post::where('id',$id)->first();

        // return view('backend.post.edit',compact('posts'));
        $post = Post::findOrFail($id); // Get the post to edit
        $authors = Author::all();

        return view('backend.post.edit', compact('post', 'authors'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        // $posts=Post::where('id',$id)->first();

        // $posts->update([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'is_active' => $request->has(key:'is_active') ? 1 : 0
        // ]);
        // $data=$request->validated();



        // Post::update([
        //     'title' => $data['title'],
        //     'description' => $data['description'],
        //     'is_active' => $request->has('is_active') ? 1 : 0
        // ]);

        // return redirect()->route('post.index');
        
        $post = Post::findOrFail($id); // Get the post to update

        $data = $request->validated();
        $imgName = $post->image; // Keep the existing image by default

        if ($request->hasFile('image')) {
            $imgName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('post_image'), $imgName);
        }

        $data = array_merge($data, ['image' => $imgName, 'is_active' => $request->has('is_active') ? 1 : 0]);

        $post->update($data); // Update the post in the database

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $result=Post::where('id',$id)->first();

      //dd($result);
      $result->delete();
      
      return redirect()->route('post.index');
    }
}
