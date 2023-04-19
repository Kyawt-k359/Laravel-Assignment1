<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;

use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts=Post::all();
    
       return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');
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

    Post::create([

        'title' => $data['title'],
        'description' => $data['description'],
        'is_active' => $request->has('is_active') ? 1 : 0
    ]);

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
        $posts=Post::where('id',$id)->first();

        return view('backend.post.edit',compact('posts'));

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
        $posts=Post::where('id',$id)->first();

        $posts->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->has(key:'is_active') ? 1 : 0
        ]);
        // $data=$request->validated();



        // Post::update([
        //     'title' => $data['title'],
        //     'description' => $data['description'],
        //     'is_active' => $request->has('is_active') ? 1 : 0
        // ]);

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
