@extends('backend.layout.master')
@section('content')

{{-- <body class="antialiased bg-secondary"> --}}
    <h1 class="text-center mt-4">Create Data</h1>
      <div class="mx-auto" style="width: 500px">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <form action="{{ route('blog.update',$blog-> id)}}" method="post">
            @csrf
            {{-- {{ method_field('PATCH') }} --}}
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $blog->name }}">

              @if($errors->has('name'))
                <div class="error text-waring">
                    {{ $errors->first('name') }}
                </div>
              @endif

            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Description</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="description" value="{{ $blog->description }}">

              @if($errors->has('description'))
                <div class="error text-danger">
                    {{ $errors->first('description') }}
                </div>
              @endif

            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
  </div>
    <script src="{{ asset('js/boostrap.bundle.js') }}"></script>
    
@endsection