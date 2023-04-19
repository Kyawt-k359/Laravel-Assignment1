@extends('backend.layout.master')
@section('content')
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-center mt-4">Post Info</h1>
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <a href="{{ route('post.create') }}" class="btn btn-primary  ml-4 mt-4 mb-4" >Add New Posts</a>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">is-active</th>
                        <th scope="col" class="align-middle">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($posts as $post)
                        <tr>
                             <td class="align-middle">{{ $post->id}}</td>
                             <td class="align-middle">{{ $post->title}}</td>
                             <td class="align-middle">{{ $post->description}}</td>
                             <td class="align-middle">{{ ((bool) $post->is_active ) ? "active" : "not active" }}</td>
                             <td class="align-middle">
                                <div class="d-flex flex-row bd-highlight">

                                    <a href="{{ route('post.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('post.show',$post->id)}}" class="btn btn-success ml-3 mr-3 ">View</a>
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