<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\NhapXuatKho;
use Carbon\Carbon;

class NhapXuatKhoController extends Controller
{
    public function List()
    {
        $category = Category::all();
        $product = Product::all();
        $NhapXuatKho = NhapXuatKho::all();
        return view('admin.NhapXuatKho.list', compact('product', 'category', 'NhapXuatKho'));
    }
    public function Delete(NhapXuatKho $id)
    {
        $id->delete();
        return redirect()->route('NhapXuatKho.list')->with('success', 'Đã xóa sản phẩm');
    }
    public function Create()
    {
        $cate = Category::all();
        $product = Product::all();

        return view('admin.NhapXuatKho.create', compact(['cate','product']));
    }
    public function CreatePost(Request $request)
    {
        $nhapxuat = new NhapXuatKho();
        if (!empty($request->id_product)) {
            $product = Product::find($request->id_product);
            if ($request->type == 1) {
                $product->amount = $product->amount + $request->amount;
            } else {
                $product->amount = $product->amount - $request->amount;
            }
            $product->save();
        }
        // code ngày-type
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $date = $dt->toDateString();
        $secon = $dt->toTimeString();
        $code =$date.'-'.$secon.'-'.$request->type;
        $nhapxuat->code = $code;
        $nhapxuat->id_product = $request->id_product;
        $nhapxuat->type = $request->type;
        $nhapxuat->amount = $request->amount;
        $nhapxuat->price = $request->price;
        $nhapxuat->content = $request->content;

        $nhapxuat->save();

        return redirect()->route('NhapXuatKho.list')->with('success', 'thêm thành công');
    }

    public function Edit($id)
    {
        $NhapXuatKho = NhapXuatKho::find($id);
        $product = Product::all();

        // dd($NhapXuatKho);
        return view('admin.NhapXuatKho.edit', compact(['product', 'NhapXuatKho']));
    }
    public function EditPost($id, Request $request)
    {
        $nhapxuat = NhapXuatKho::find($id);
        if (!empty($request->id_product)) {
            $product = Product::find($request->id_product);
            if ($request->type == 1) {
                $product->amount = $product->amount + $request->amount;
            } else {
                $product->amount = $product->amount - $request->amount;
            }
            $product->save();
        }
        // code ngày-type
        // $dt = Carbon::now('Asia/Ho_Chi_Minh');
        // $date = $dt->toDateString();
        // $secon = $dt->toTimeString();
        // $code =$date.'-'.$secon.'-'.$request->type;
        // $nhapxuat->code = $code;
        $nhapxuat->id_product = $request->id_product;
        $nhapxuat->type = $request->type;
        $nhapxuat->amount = $request->amount;
        $nhapxuat->price = $request->price;
        $nhapxuat->content = $request->content;

        $nhapxuat->save();
        return redirect()->route('NhapXuatKho.list')->with('success', 'Sửa thành công');
    }
}
