@extends('backend.layout.master')
@section('content')

  <div class="mx-auto mt-4" style="width: 500px">
    <h1 class="text-center mb-4">New Roles</h1>
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
<form action="{{ route('role.store') }}" method="POST">
  @csrf

  
    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-4 col-form-label">Name <span class="text-danger">*</span></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" placeholder="Eneter Role Name">
        @if ($errors->has('name'))
        <div class="text-danger error">{{ $errors->first('name') }}</div>
        @endif
     </div>
    </div>
    
    <div class="card card-success">
      <div class="card-body">
          <!-- Minimal style -->
          <div class="row">
              <div class="col-sm-6">
                <h2>Permission<span class="text-danger">*</span></h2>
                  <!-- checkbox -->
                  @foreach ($data as $val)
                      <div class="form-group clearfix">
                          <div class="form-check mb-1">
                              {{-- permission[{{ $permission->name }}] --}}
                              <input class="form-check-input" name="permission[]"
                                  type="checkbox" value="{{ $val->id }}"
                                  id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  {{ $val->name }}
                              </label>
                          </div>
                      </div>
                  @endforeach
                  @if ($errors->has('permission'))
                      <div class="text-danger error">{{ $errors->first('permission') }}</div>
                  @endif
              </div>
          </div>
      </div>
  </div>
    

    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ route('role.index') }}" class="btn btn-primary ml-2" >Cancel</a>
    </div>

  </form>
  </div>
@endsection