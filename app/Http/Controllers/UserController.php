<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Product;
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
    public function listBill($id_user)
    {
        //trạng thái 1 là chưa chuyển
        // 2 là đã chuyển
        $data = Bill::where('idUser', $id_user)->orderBy('id','DESC')->search()->paginate(10);
        $data1 = Bill::where('idUser', $id_user)->get();
        return view('admin.user.listBill', compact('data','data1'));
    }
    public function sanpham($id, $idUser){
        $bill = Bill::find($id);
        $dataCart = explode(',', $bill->idCart);
        $data = Cart::whereIn('id', $dataCart)->where('idUser','=',$idUser)->get();
        $products = Product::all();
        $total =0;
        foreach($data as $car){
                $product =Product::find($car->idProduct);
                if(!empty($product))
                {
                    $total = $total + ($product->price * $car->amount);
                }
                else
                {
                    $total = 0;
                }
        }
        return view('admin.user.cartsp', compact(['id', 'data', 'total','products']));
    }
}
