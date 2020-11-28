<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserHasRole;
use Illuminate\Support\Facades\Hash;

class MngUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::paginate(12);
      return view('admin.user')->with(["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function addnew(User $id)
    {
      return view('admin.add_user');
    }

    public function create(Request $request)
    {
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);
      $data=array(
          'name'=>$request->name,
          'avatar'=>$request->avatar,
          'email'=>$request->email,
          'password'=> Hash::make($request['password']),
      );
      User::create($data);
      session()->flash('success', 'Thêm tài khoản thành công');
      
      return redirect('/dashboard/user');
    }

    public function edit(User $id)
    {
      $newRoles = [];
      $rolesChecked = $id->roles()->get();
      $roles = Role::all();
      foreach ($roles as $role){
        $role['checked'] = false;
        foreach ($rolesChecked as $roleChecked){
          if ($role['slug'] === $roleChecked->slug){
            $role['checked'] = true;
          }
        }
          array_push($newRoles,$role);
      }
      return view('admin.edit_user')->with(['user'=>$id,'roles'=>$newRoles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $user = User::find($id);
      if(isset($request->name)){
        $user->name = $request->name;
      }
      if(isset($request->phone)){
        $user->phone = $request->phone;
      }
      if(isset($request->address)){
        $user->address = $request->address;
      }
      $updated = $user->save();
      if(isset($request->roles) && $updated == true){
        $user->roles()->sync($request->roles);
      }
      session()->flash('message','success');
      return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
      $id->delete();
      session()->flash('message', 'Xóa sản phẩm thành công');
      return redirect()->back();
    }
}
