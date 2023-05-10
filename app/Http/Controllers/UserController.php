<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list(){
        $user = User::all();
        return view('admin.user.list', compact('user'));
    }
    public function Delete(User $id){
        $id->delete();
        return redirect()->route('User.list')->with('success','Đã xóa User');   
    }
}
