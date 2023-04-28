@extends('backend.layout.master')
@section('content')
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <a href="{{ route('post.index') }}" class="btn btn-primary ml-4 mt-4 mb-4" >Back Home</a>
                <table class="table">
                    <thead>
                      <tr>

                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">is-active</th>
                        {{-- <th scope="col">Action</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      
                        
                        <tr>
                             <td class="align-middle">{{ $result->id}}</td>
                             <td class="align-middle">{{ $result->title}}</td>
                             <td class="align-middle">{{ $result->description}}</td>
                             <td class="align-middle"><img src="{{ asset('post_image/' . $result->image) }}" alt="{{ $result->title }}" style="width:100px"></td>
                             <td class="align-middle"> {{ ((bool) $result->is_active ) ? "active" : "not active" }}</td>
                             {{-- <td>
                                <div class="d-flex flex-row bd-highlight">

                                    <a href="{{ route('post.edit',$result->id)}}" class="btn btn-primary">Edit</a>
                                    
                                    <form action="{{ route('post.destroy',$result->id) }}" method="POST" class="ms-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                        
                                    </div>
                             </td> --}}
                          </tr>
                        </tbody>
                  </table>
            </div>
             @endsection