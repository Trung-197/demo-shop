<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserRequest;
use App\Models\Role;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use http\Client\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user,Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->whereNot('email','superadmin@gmail.com')->paginate('10');
        return view('backend.user.index',compact('users'));
    }
    public function create()
    {
        $roles = $this->role->all();
        return view('backend.user.create',compact('roles'));
    }
    public function store(UserRequest $request)
    {
        $user = $this->user->create([
            'name' =>  $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password)
        ]);
        $roleIds = $request->role_id;
        $user->roles()->attach($roleIds);
        Toastr::success('Message', 'Create Success');
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $rolesofUser = $user->roles;
        return view('backend.user.edit',compact('roles','user', 'rolesofUser'));
    }
    public function update(UserRequest $request,$id)
    {
        $this->user->find($id)->update([
            'name' => $request->name,
            'emai' => $request->email,
            'password' =>Hash::make($request->password)
        ]);
        $user = $this->user->find($id);
        $user->roles()->sync($request->role_id);
        Toastr::success('Message', 'Update Success');
        return redirect()->route('users.index');
    }
    public function delete($id)
    {
        $user = $this->user->find($id);
        $user->delete();
        Toastr::success('Message', 'Delete Success');
        return redirect()->route('users.index');
    }
}
