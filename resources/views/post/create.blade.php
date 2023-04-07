<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Posts</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    
</head>
<body class="antialiased bg-secondary">
  <div class="mx-auto mt-4" style="width: 500px">
    <h1 class="text-center mb-4">New Posts</h1>
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
<form action="{{ route('post.store') }}" method="POST">
  @csrf

  <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="title" id="inputEmail3">
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="description" id="inputPassword3">
      </div>
    </div>
    <div class="form-check ">
      <input class="form-check-input" type="checkbox" name="is_active" id="flexRadioDefault1" >is-active
    </div>

    </div>
    <div class="d-flex justify-content-center">

      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ route('post.index') }}" class="btn btn-primary ms-2" >Cancel</a>
    </div>

  </form>
  </div>
</body>
</html>