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
              <h3 class="card-title">Create Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" placeholder="name" name="name">

                  @if($errors->has('name'))
                        <div class="error text-danger">
                            {{ $errors->first('name') }}
                        </div>
                   @endif
                </div>
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <input type="text" class="form-control"  placeholder="description" name="description">

                    @if($errors->has('description'))
                              <div class="error text-danger">
                              {{ $errors->first('description') }}
                              </div>
                      @endif
                </div>
                
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="image" id="inputPassword3">
                  </div>
                </div>
                
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection