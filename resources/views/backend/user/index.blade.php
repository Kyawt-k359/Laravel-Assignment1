@extends('backend.layout.master')
@section('content')



    <!-- Main content -->
   
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Listing</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @can('userCreate')
                <a href="{{ route('user.create') }}" class="btn btn-primary mt-4 mb-4" ><span class="fa-lg">+</span> Add New Users</a>
                @endcan
                
               
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr >
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    
                  @foreach($data as $val)
                        <tr>
                             <td>{{ $val->id}}</td>
                             <td>{{ $val->name}}</td>
                             <td>{{ $val->email }}</td>
                             <td>
                              @foreach($val->roles as $role)
                                  <span class="badge bg-secondary">{{ $role->name }}</span>
                              @endforeach
                            </td>
                             <td>
                                <div class="d-flex flex-row bd-highlight">
                                
                                  @can('userEdit')
                                  <a href="{{ route('user.edit',$val->id)}}" class="btn btn-primary mr-3 ">Edit</a>
                                  @endcan

                                  @can('userDelete')
                                  <form action="{{ route('user.destroy',$val->id) }}" method="POST"  >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
  
                                   </form>
                                  @endcan
                                  
                                 
                               
                                
                                    
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
