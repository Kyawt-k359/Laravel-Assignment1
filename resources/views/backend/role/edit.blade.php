@extends('backend.layout.master')
@section ('content')


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-7 mt-4 mx-auto">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Role Edit Form</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('role.update',$data-> id)}}" method="post">
            @csrf
            {{ method_field('PATCH') }}
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" placeholder="Edit Role Name"
                  value="{{ $data->name }}">
                  @if ($errors->has('name'))
                      <div class="text-danger error">{{ $errors->first('name') }}</div>
                   @endif
               </div>
               <div class="card card-success">
                                
                <div class="card-body">
                <!-- Minimal style -->
                    <div class="row">
                      <h2>Permissions<span class="text-danger">*</span></h2>
                        @foreach ($permission as $val)
                        <div class="col-sm-9">
                        <!-- checkbox -->                      
                            <div class="form-group clearfix">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permission_arr[]" value="{{$val->id}}" id="flexCheckDefault" {{in_array($val->id, $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $val->name }}
                                    </label>
                                </div>                        
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('role.index') }}" class="btn btn-primary ml-2" >Cancel</a>
              </div>
              
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection