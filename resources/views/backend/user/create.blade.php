@extends('backend.layout.master')
@section ('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-7  mt-4 mx-auto">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Admin Entry Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('user.store') }}" method="post">
            
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" placeholder="Enter Name" name="name"> 
                  @if($errors->has('name'))
                     <div class="error text-danger">{{$errors->first('name') }}</div>
                   @endif
                </div>
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" class="form-control"  placeholder="Enter Email" name="email">
                  @if($errors->has('email'))
                    <div class="error text-danger">{{$errors->first('email') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password"
                      class="form-control @error('password') is-invalid @enderror"
                      id="exampleInputPassword1" placeholder="Password" name="password">
                      @if ($errors->has('password'))
                      <div class="text-danger">{{ $errors->first('password') }}</div>
                  @endif

              </div>

              <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" name="password_confirmation"
                      class="form-control @error('password_confirmation') is-invalid @enderror"
                      id="exampleInputPassword1" placeholder="Confirm Password"
                      name="password_confirmation">
                      @if ($errors->has('password_confirmation'))
                      <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                      @endif

              </div>
                <div class="form-group row">
                  <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                  <div class="col-sm-10">
                      <select class="custom-select" name="roles" id="roles" class="form-control">
                          @foreach ($roles as $role)
                              <option> {{ $role->name }}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('roles')) <div class="error text-danger">{{ $errors->first('roles') }}</div>
                      @endif
                  </div>
              </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('user.index')}}" class="btn btn-default float-right">Cancel</a> 
            </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection