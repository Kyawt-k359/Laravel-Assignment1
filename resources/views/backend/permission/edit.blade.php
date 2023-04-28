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
            <h3 class="card-title">Updtae Permissions</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('permission.update',$data-> id)}}" method="post">
            @csrf
            {{ method_field('PATCH') }}
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" placeholder="name"
                  value="{{ $data->name }}">
               </div>
             

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('permission.index') }}" class="btn btn-primary ml-2" >Cancel</a>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection