@extends('backend.layout.master')
@section('content')

    {{-- <body class="antialiased bg-secondary"> --}}
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <a href="{{ route('blog.index') }}" class="btn btn-primary mt-4 mb-4" >Back Home</a>
                <table class="table">
                    <thead>
                      <tr>

                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                             <td>{{ $blog->id}}</td>
                             <td>{{ $blog->name}}</td>
                             <td>{{ $blog->description}}</td>
                             <td> @if ($blog->image)
                                     <img src="{{ asset('storage/blog_image/' . $blog->image) }}" alt="Blog Image" style="width: 100px">
                                   @endif
                              </td>
                             <td>
                                <a href="{{ route('blog.edit',$blog->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('blog.destroy',$blog->id)}}" class="btn btn-danger">Delete</a>

                            </td>
            
                          </tr>
                       
                      
                    </tbody>
                  </table>
            </div>

            <script src="{{ asset('js/boostrap.bundle.js') }}"></script>
    @endsection
