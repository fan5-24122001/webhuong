<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(){
        $user = User::where('is_admin' ,'=',0)->get();
        return view('admin.user.list', compact('user'));
    }
    public function listNV(){
        $user = User::where('is_admin' ,'=',2)->get();
        return view('admin.user.nv', compact('user'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function edituser($id)
    {
        $user = User::find($id);
        return view('users.pages.user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->address = $request['address'];   
        $user->save();
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }
    public function Delete(User $id){
        $id->delete();
        return redirect()->route('User.list')->with('success','Đã xóa User');   
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function createuser(Request $request)
    {
        $newusser = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_admin' => 2,
            'address' =>$request['address'],
        ]);
        return redirect()->back()->with('massage', 'Thêm  thành công');
    }
}
