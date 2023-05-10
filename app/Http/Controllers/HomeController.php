<?php
   
namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Love;
use App\Models\User;
use  App\Models\Cart;
use App\Models\Comment;
use  App\Models\Product;
use  App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Bill\createRequest;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        if(!empty(Auth::user()->id)){
            $amount = 0;
            $total =0;
            $category = Category::all();
            $idUser = Auth::user()->id;
            $cart = Cart::where('idUser','=',$idUser)->get();
            $data = Product::all();
        
            foreach($cart as $car){
                if($car->idUser == $idUser){
                    $product =Product::find($car->idProduct); 
                    if(!empty($product)) 
                    {
                        $total = $total + ($product->price * $car->amount);
                        $amount++;
                    }
                    else
                    {
                        $total = 0;
                        $amount = 0;
                    }
                }
            }
            //return view('page.content.home', compact(['products']));
            return view('users.home', compact(['data', 'total','amount']));
            }
            else{
                $cate = Category::all();
                $data = Product::all();
                return view('users.home', compact(['data']));
            }
        }
        
      
    
    public function viewpro( $id){
        
        $pro1 = Product::find($id);
      
        return view('users.pages.product.detail', compact('pro1'));
        
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()

    {
        $this->middleware('auth');
        return view('admin.home');
    }

    public function addcart($idUser , $idProduct){
        $cardData = Cart::all();
        //dd($cardData);
        foreach($cardData as $key => $card)
        {
            $empryData =($card->idProduct == $idProduct) && ($card->idUser == $idUser) && ($card->amount >= 1);
            //dd($k);
            if($empryData == true)
            {
                $cardRowUpdate = Cart::find($card->id);
                $cardRowUpdate->amount = $card->amount + 1;
                $cardRowUpdate->save();
                return redirect()->route('home')->with('success','Successfully add card ');
            }
        }
        if(Cart::create([
            'idUser'=>$idUser,
            'idProduct'=>$idProduct,
            'genaral'=>1,
            'amount'=>1
        ])){
            return redirect()->route('home')->with('success','Successfully add card ');
        }
        else{
            return redirect()->route('home')->with('error','error add card ');
        }
    }
    public function themcart($idUser , $idProduct){
        $cardData = Cart::all();
        //dd($cardData);
        foreach($cardData as $key => $card)
        {
            $empryData =($card->idProduct == $idProduct) && ($card->idUser == $idUser)  && ($card->amount >= 1);
            //dd($k);
            if($empryData == true)
            {
                $cardRowUpdate = Cart::find($card->id);
                $cardRowUpdate->amount = $card->amount + 1;
                $cardRowUpdate->save();
                return redirect()->route('home.cartUser',Auth::user()->id)->with('success','Đã thêm thành công');
            }
        }
        if(Cart::create([
            'idUser'=>$idUser,
            'idProduct'=>$idProduct,
            'genaral'=>1,
            'amount'=>1
        ])){
            return redirect()->route('home')->with('success','Successfully add card ');
        }
        else{
            return redirect()->route('home')->with('error','error add card ');
        }
    }
    public function trucart($idUser , $idProduct){
        $cardData = Cart::all();
        //dd($cardData);
        foreach($cardData as $key => $card)
        {
            $empryData =($card->idProduct == $idProduct) && ($card->idUser == $idUser);
            //dd($k);
            if($empryData == true && ($card->amount >= 2))
            {
                $cardRowUpdate = Cart::find($card->id);
                $cardRowUpdate->amount = $card->amount - 1;
                $cardRowUpdate->save();
                return redirect()->route('home.cartUser',Auth::user()->id)->with('success','Đã trừ thành công ');
            }
            if($empryData == true && ($card->amount = 1)){
                $card->delete();
                return redirect()->route('home.cartUser',Auth::user()->id)->with('error','Sản phẩm đã được xóa của bạn');
            }
        }
        if(Cart::create([
            'idUser'=>$idUser,
            'idProduct'=>$idProduct,
            'genaral'=>1,
            'amount'=>1
        ])){
            return redirect()->route('home')->with('success','Successfully add card ');
        }
        else{
            return redirect()->route('home')->with('error','error add card ');
        }
    }

    public function viewProduct($idProduct){
        $data =Product::find($idProduct);
      
        $comment = Comment::all();
        $category1 = Category::all(); 
        $cateliequan = Product::where("id_category",'=', $data->id_category)->where('id','!=',$data->id)->get();
       

       
        // $data1 = DB::table('product')
        // ->join('category', 'product.id_category', '=', 'category.id')->where('product.id',$idProduct )
        // ->select('category.name', 'product.id')
        // ->get();
        $category = DB::table('category')
        ->where('id', $data->id_category)
        ->value('name');
      
      
        return view("users.pages.product.detail", compact('category','data','category1','comment','cateliequan'));
    }
    public function delete(Cart $id)
    {   
        $id->delete();
        return redirect()->route('home.cartUser',Auth::user()->id)->with('success','Đã xóa sản phẩm');   
    }
    public function pay(){
        $amount = 0;
        $total =0;
        $idUser = Auth::user()->id;
        $cart = Cart::where('idUser','=',$idUser)->where('genaral','=',1)->get();
        $products = Product::all();
        foreach($cart as $car){
            if($car->idUser == $idUser ){
                $product =Product::find($car->idProduct); 
                if(!empty($product)) 
                {
                    $total = $total + ($product->price * $car->amount);
                    $amount++;
                }
                else
                {
                    $total = 0;
                    $amount = 0;
                }
            }
        }
        $data = Cart::where('idUser','=',$idUser)->get();
        return view("users.pages.order.checkout", compact('data', 'total','amount', 'products'));
    }
    public function cartUser($idUser){
        $amount = 0;
        $total =0;
        $category = Category::all();
        $idUser = Auth::user()->id;
        $cart = Cart::where('idUser','=',$idUser)->get();
        $products = Product::all();
        foreach($cart as $car){
            if($car->idUser == $idUser ){
                $product =Product::find($car->idProduct);
                if(!empty($product)) 
                {
                    $total = $total + ($product->price * $car->amount);
                    $amount++;
                }
                else
                {
                    $total = 0;
                    $amount = 0;
                }
            }
        }
        $data = Cart::where('idUser','=',$idUser)->get();
        return view('users.pages.cart.cart', compact('products','data','total','amount'));
    }
    public function postthanhtoan(createRequest $request){
        // dd($request->all());
        if(Bill::create([
            'idUser'=>Auth::user()->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'genaral'=>1,
            'price'=>$request->price,
            'numberPhone'=>$request->numberPhone,
            'address'=>"Số-Đường :".$request->sonha."/Xã :".$request->xa."/Huyện-Quận :".$request->huyen."/Tỉnh :".$request->tinh
        ]))
        {
            $cartUser = Cart::where('idUser', '=', Auth::user()->id)->where('genaral','=',1)->get();
            //dd($cartUser);
            foreach($cartUser as $car){
                //$pro = Product::where('id', '=', $car->idProduct)->get();
                $pro =Product::find($car->idProduct); 
                //dd($pro);
                $pro->amount = $pro->amount - $car->amount;
                $pro->save();
                $car->genaral = 2;
                $car->save();
            }
            return redirect()->route('home')->with('success','Đặt thành công.');
        }
    
    }
    public function category($id_category){
        if(!empty(Auth::user()->id)){
            $amount = 0;
            $total =0;
            $category = Category::all();
            $pro = Product::where('id_category','=',$id_category)->get();
            $idUser = Auth::user()->id;
            $cart = Cart::where('idUser','=',$idUser)->where('genaral','=',1)->get();
          
        
            foreach($cart as $car){
                if($car->idUser == $idUser && $car->genaral == 1){
                    $product =Product::find($car->idProduct); 
                    if(!empty($product)) 
                    {
                        $total = $total + ($product->price * $car->amount);
                        $amount++;
                    }
                    else
                    {
                        $total = 0;
                        $amount = 0;
                    }
                }
            }
            //return view('page.content.home', compact(['products']));
            return view('users.pages.category.list',compact(['category','pro', 'total','amount']));
            }
            else{
                $category = Category::all();
                $pro = Product::where('id_category','=',$id_category)->get();
                return view('users.pages.category.list',compact(['category','pro',]));
            }
        }
        
    public function shop(){
        $category = Category::all();
           $pro = Product::paginate(1);
          
           return view('users.pages.shop.shop', compact('pro','category')) ;
    }
   
public function search(Request $request)
{
    // Lấy giá trị từ ô tìm kiếm
    $search = $request->input('search');
    $category = Category::all();
    // Tìm kiếm sản phẩm có tên chứa chuỗi ký tự tìm kiếm
    $pro = Product::where('name', 'like', '%' . $search . '%' )->orwhere('price', 'like', '%' . $search . '%' ,)->get();

    // Trả về view với kết quả tìm kiếm
    return view('users.pages.search.pages', compact('pro','category'));
}

       public function addlove(Request $request, $id_product)
    {

        $category = Category::all();
        $love = new Love();

        $love->id_user = $request->id_user;
        $love->id_product = $request->id_product;
        $love -> save();

       
        {
            return redirect()->back()->with('success', 'Thêm thành công.');
        }
    }
      

    public function listlove()
    {
        
        $category = Category::all();
        $id_user = Auth::user()->id;
        $data = Love::where('id_user', '=', $id_user)->get();
        $product = Product::all();
        return view('users.pages.love.list', compact('data','product','category'));
        
    }
      
    public function contact()
    {
        
     
        return view('users.pages.contact');
        
    }
    public function blog()
    {
        
     
        return view('users.pages.blog.home');
        
    }
      
    public function mycart(){
        $amount = 0;
        $total =0;
        $idUser = Auth::user()->id;
        $cart = Cart::where('idUser','=',$idUser)->where('genaral','=',1)->get();
        $products = Product::all();
        foreach($cart as $car){
            if($car->idUser == $idUser && $car->genaral == 1){
                $product =Product::find($car->idProduct);
                if(!empty($product)) 
                {
                    $total = $total + ($product->price * $car->amount);
                    $amount++;
                }
                else
                {
                    $total = 0;
                    $amount = 0;
                }
            }
        }
        $bill = Bill::where('genaral','=',1)->where('idUser','=',$idUser)->get();
        $data = Cart::where('idUser','=',$idUser)->where('genaral','=',1)->get();
        //dd(empty($data[0]->id));
        $datanext = Cart::where('idUser','=',$idUser)->where('genaral','=',2)->get();
        return view('users.pages.order.checkoder', compact('products','data', 'total','amount','datanext', 'bill'));
    }

   
}