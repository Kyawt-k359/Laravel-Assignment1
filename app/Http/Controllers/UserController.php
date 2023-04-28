<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:userList',['only'=>['index']]);
        $this->middleware('permission:userCreate',['only'=>['create','store']]);
        $this->middleware('permission:userEdit',['only'=>['edit','update']]);
        $this->middleware('permission:userDelete',['only'=>['destroy']]);
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=User::all();
        return view('backend.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        //$roles = Role::pluck('name','name')->all();
        return view('backend.user.create', compact('roles'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request,$id)
    {
        $data = $request->validated();   
        $user = User::findOrFail($id);
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])     
        ]);
        $user->syncRoles([$data['roles']]);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        $decrypt= bcrypt($data->password); 
        $roles = Role::get();
        $userRole = $data->roles->pluck('name')->toArray();
        return view('backend.user.edit',compact('data','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(UserRequest $request, $id)
    {
        dd($id);
        if (empty($data['password'])) {
           
        }
        $data = $request->validated();   
        $user = User::findOrFail($id);
        $updateData = [
            'name' => $data['name'],
            'email' => $data['email']
        ];
        
        $user->update($updateData);
        $user->syncRoles([$data['roles']]);
        return redirect()->route('user.index');
    }

 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=User::where('id',$id)->first();
        $data->delete();

        return redirect()->route('user.index');
    }
}
