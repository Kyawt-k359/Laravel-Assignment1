@extends('backend.layout.master')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>DataTables</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">DataTables</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

    <!-- Main content -->
   
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('blog.create') }}" class="btn btn-primary mt-4 mb-4" >Add Data +++</a>

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $val)
                        <tr>
                             <td>{{ $val->id}}</td>
                             <td>{{ $val->name}}</td>
                             <td>{{ $val->description}}</td>
                             <td>
                                <div class="d-flex flex-row bd-highlight">

                                <a href="{{ route('blog.edit',$val->id)}}" class="btn btn-primary ">Edit</a>
                                <a href="{{ route('blog.show',$val->id)}}" class="btn btn-success ml-3 mr-3">View</a>
                                
                                    <form action="{{ route('blog.destroy',$val->id) }}" method="POST"  >
                                        @csrf
                                        
                                        <button type="submit" class="btn btn-danger">Delete</button>

                                    </form>
                                </div>
                             </td>
                        </tr>
                        @endforeach
                    </tbody>
                 
                </table>
                <br/>
                {{ $data->links()}} 
              </div>
             
            </div>
        </div>
        </div>
      </div>
         
  @endsection
