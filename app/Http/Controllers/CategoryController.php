<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {   $this->middleware('auth');
       
    }
    public function List()
    {
        $category = Category::all();
        return view('admin.category.list', compact('category'));
    }
    public function Create()
    {
        return view('admin.category.create');
    }
    public function CreatePost(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('Category.list')->with('success', 'thêm thành công');
    }
    public function Edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function EditPost($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->id = $request->id;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('Category.list')->with('success', 'Sửa thành công');
    }
    public function Delete(Category $id)
    {
        $id->delete();
        return redirect()->route('Category.list')->with('success', 'Đã xóa thành công');
    }
    
   
}
