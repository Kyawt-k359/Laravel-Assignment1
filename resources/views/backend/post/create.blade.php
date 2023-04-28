@extends('backend.layout.master')
@section('content')

  <div class="mx-auto mt-4" style="width: 500px">
    <h1 class="text-center mb-4">New Posts</h1>
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="title" id="inputEmail3">

        @if($errors->has('title'))
                <div class="error text-danger">
                    {{ $errors->first('title') }}
                </div>
            @endif
        
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>

        @if($errors->has('description'))
                <div class="error text-danger">
                    {{ $errors->first('description') }}
                </div>
              @endif
      </div>
    </div>
    
    <div class="row mb-3">
      <label for="auth" class="col-sm-2 col-form-label">Author</label>
      <div class="col-sm-10">
      <select id="auth" name="author_id" class="form-control">
          @foreach ($data as $val)
              <option value={{ $val->id }}>{{ $val->name }}</option>
          @endforeach
      </select>
    </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" name="image" id="inputPassword3">
      </div>
    </div>
    <div class="form-check ">
      <input class="form-check-input" type="checkbox" name="is_active" id="flexRadioDefault1" >is-active
    </div>

    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ route('post.index') }}" class="btn btn-primary ml-2" >Cancel</a>
    </div>

  </form>
  </div>
@endsection