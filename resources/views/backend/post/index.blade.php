@extends('backend.layout.master')
@section('content')
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-center mt-4">Post Info</h1>
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
              @can('postCreate')
              <a href="{{ route('post.create') }}" class="btn btn-primary  ml-4 mt-4 mb-4" ><span class="fa-lg">+</span> Add New Posts</a>
              @endcan
               
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">is-active</th>
                        <th scope="col" class="align-middle">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @dd($posts); --}}
                        @foreach($posts as $post)
                       
                        <tr>
                             <td class="align-middle">{{ $post->id}}</td>
                             <td class="align-middle">{{ $post->title}}</td>
                             <td class="align-middle">{{ $post->description}}</td>
                             <td class="align-middle">{{ $post->author->name}}</td>
                             <td class="align-middle"><img src="{{ asset('post_image/' . $post->image) }}" alt="post-image" style="width: 100px"></td>
                             <td class="align-middle">{{ ((bool) $post->is_active ) ? "active" : "not active" }}</td>
                             <td class="align-middle">
                                <div class="d-flex flex-row bd-highlight">
                                    @can('postEdit')
                                    <a href="{{ route('post.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                                    @endcan
                                    
                                    @can('postShow')
                                    <a href="{{ route('post.show',$post->id)}}" class="btn btn-success ml-3 mr-3 ">View</a>
                                    @endcan
                                    
                                    <form action="{{ route('post.destroy',$post->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                        
                                </div>
                             </td>
                          </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
@endsection