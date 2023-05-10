<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Category;

class OrderController extends Controller
{
    //
    public function List()
    {
        $Orders = Order::all();
        return view('admin.Order.list', compact('Orders'));
    }
    public function Delete(Order $id)
    {
        $id->delete();
        return redirect()->route('Order.list')->with('success', 'Đã xóa sản phẩm');
    }

    public function Change($id, $type)
    {
        // dd($id, $type);
        $Order = Order::find($id);
        $Order->status = $type;
        $Order->save();
        return redirect()->back()->with('success', 'Thành công');
    }
    public function Show($id)
    {
        $Order = Order::find($id);
        // dd($Order->id_cart);
        $cartArray =  explode(',',$Order->id_cart);
        // dd($cartArray);
        $Carts = Cart::whereIn('id',$cartArray)->get();
        return view('admin.Order.Show', compact('Order','Carts'));
    }
}
