<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {   $this->middleware('auth');
       
    }
    public function List()
    {
        $cate = Category::all();
        $product = Product::all();
        return view('admin.product.list', compact('product', 'cate'));
    }
    public function Delete(Product $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Đã xóa sản phẩm');
    }
    public function Create()
    {
        $cate = Category::all();
        return view('admin.product.create', compact(['cate']));
    }
    public function CreatePost(Request $request)
    {
        $product = new Product();
        // imageGet
        $arrayImgae = '';
        if ($request->has('image')) {
            if (!empty($request->image)) {
                foreach ($request->image as $key => $image) {
                    $arrayImgae =  $this->imageGet($key, $image) . '|' . $arrayImgae;
                }
            }
        }
        $product->name = $request->name;
        $product->id_category = $request->id_category;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->price = $request->price;
        if (!empty($arrayImgae)) {
            $product->image = substr_replace($arrayImgae, "", -1);
        }
        $product->save();
        return redirect()->route('Product.list')->with('success', 'thêm thành công');
    }
    public function Edit($id)
    {
        $cate = Category::all();
        $product = Product::findOrFail($id);

        return view('admin.product.edit', compact(['cate', 'product']));
    }
    public function EditPost($id, Request $request)
    {
        // dd($request->all());
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->id_category = $request->id_category;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->price = $request->price;
        if ($request->has('image')) {
            if (!empty($request->image)) {
                $countImageOld = count(explode('|', $product->image));
                $countImageNew = count($request->image);
                // dd($countImageOld, $countImageNew);
                $imageRequest = '';
                if ($countImageNew > $countImageOld) {
                    foreach ($request->image as $key => $ima) {
                        $imageRequest =  $this->imageGet($key, $ima) . '|' . $imageRequest;
                    }
                    $product->image = substr_replace($imageRequest, "", -1);
                } else {
                    foreach ($request->image as $key => $ima) {
                        $imageRequest =  $this->imageGet($key, $ima) . '|' . $imageRequest;
                    }
                    foreach (explode('|', $product->image) as $key => $ima) {
                        if (($key + 1) > $countImageNew) {
                            $imageRequest =   $ima . '|' . $imageRequest;
                        }
                    }
                    $product->image = substr_replace($imageRequest, "", -1);
                }
            }
        }

        $product->save();
        return redirect()->route('Product.list')->with('success', 'Sửa thành công');
    }
    public function imageGet($index, $file)
    {
        $image = $file;
        $extension = $image->getClientOriginalExtension(); //Extension 'jpg'
        $uploadname = $index . '-product-' . time() . '.' . $extension;
        $image->move(public_path() . '/uploads/', $uploadname);

        return 'uploads/' . $uploadname;
    }
}
