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
            <h3 class="card-title">Updtae Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('blog.update',$blog-> id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" placeholder="name"
                  value="{{ $blog->name }}">

                @if($errors->has('name'))
                <div class="error text-danger">
                  {{ $errors->first('name') }}
                </div>
                @endif

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="description" placeholder="description"
                  value="{{ $blog->description }}">
                @if($errors->has('description'))
                <div class="error text-danger">
                  {{ $errors->first('description') }}
                </div>
                
                @endif
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image-input" class="form-control-file">
                @if ($blog->image)
                    <img src="{{ asset('storage/blog_image/' . $blog->image) }}" alt="{{ $blog->title }}" class="mt-2" style="width: 100px;" id="my-image">
                @endif

                <script>
                  const input = document.getElementById("image-input");
                  const reader = new FileReader();
                  const img = document.getElementById("my-image");

                  input.addEventListener("change", function(event) {
                      const file = event.target.files[0];
                      reader.readAsDataURL(file);
                  });

                  reader.onload = function() {
                      img.src = reader.result;
                  };
              </script>
            </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection