<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body class="antialiased bg-secondary">
    <h1 class="text-center mt-4">Create Data</h1>
      <div class="mx-auto" style="width: 500px">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <form action="{{ route('blog.store') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="name">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Description</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="description">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
  </div>
    <script src="{{ asset('js/boostrap.bundle.js') }}"></script>
</body>
</html>