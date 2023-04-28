@extends('backend.layout.master')
@section('content')



    <!-- Main content -->
   
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Permission Listing</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <a href="{{ route('permission.create') }}" class="btn btn-primary mt-4 mb-4" ><span class="fa-lg">+</span> New Permission</a>
               
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr >
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    
                  @foreach($data as $val)
                        <tr>
                             <td>{{ $val->id}}</td>
                             <td>{{ $val->name}}</td>
                             
                             <td>
                                <div class="d-flex flex-row bd-highlight">

                                  
                                  <a href="{{ route('permission.edit',$val->id)}}" class="btn btn-primary mr-3 ">Edit</a>
                                  
     
                               

                               
                                
                              
                                 
                                

                                <form action="{{ route('permission.destroy',$val->id) }}" method="POST"  >
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>

                              </form>
                               
                                
                                    
                                </div>
                             </td>
                        </tr>
                        @endforeach
                    </tbody>
                 
                </table>
                <br/>
                {{-- {{ $data->links()}}  --}}
              </div>
             
            </div>
        </div>
        </div>
      </div>
         
  @endsection
