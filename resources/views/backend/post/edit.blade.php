@extends('backend.layout.master')
@section('content')

<div class="mx-auto mt-4" style="width: 500px">
    <h1 class="text-center mb-4">Edit Posts</h1>
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
<form action="{{ route('post.update',$posts->id) }}" method="POST">
  @csrf
{{ method_field('PATCH') }}
  <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="title" id="inputEmail3" value="{{ $posts->title }}">
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="description" id="inputPassword3" value="{{ $posts->description }}">
      </div>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_active" id="flexRadioDefault1" value="1" {{ $posts->is_active || old('is_active',0) === 1 ? 'checked' : ''}} >
    </div>

    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary mr-4">Update</button>
    <a href="{{ route('post.index') }}" class="btn btn-primary" >Cancel</a>
    </div>
    

  </form>
</div>
</div>
@endsection