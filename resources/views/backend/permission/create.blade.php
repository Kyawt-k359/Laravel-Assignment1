@extends('backend.layout.master')
@section('content')

  <div class="mx-auto mt-4" style="width: 500px">
    <h1 class="text-center mb-4">New Permissions</h1>
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
<form action="{{ route('permission.store') }}" method="POST">
  @csrf

  
    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-4 col-form-label">Permission Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="inputPassword3">
        @if ($errors->has('name'))
      <div class="text-danger error">{{ $errors->first('name') }}</div>
        @endif
     </div>
    </div>
    
</div>


    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ route('permission.index') }}" class="btn btn-primary ml-2" >Cancel</a>
    </div>

  </form>
  </div>
@endsection