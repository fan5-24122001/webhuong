<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NhapXuatKhoController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');
Route::group(['prefix' => 'admin'], function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/search', 'search')->name('admin.search');

        Route::get('/list-product', 'List')->name('Product.list');
        Route::get('/create-product', 'Create')->name('Product.create');
        Route::post('/create-product', 'CreatePost')->name('Product.createPost');

        Route::get('/edit-product/{id}', 'Edit')->name('Product.edit');
        Route::post('/edit-product/{id}', 'EditPost')->name('Product.EditPost');

        Route::get('/delete-product/{id}', 'Delete')->name('Product.Delete');

    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/list-category', 'List')->name('Category.list');
        Route::get('/create-category', 'Create')->name('Category.create');
        Route::post('/create-category', 'CreatePost')->name('Category.createPost');

        Route::get('/edit-category/{id}', 'Edit')->name('Category.edit');
        Route::post('/edit-category/{id}', 'EditPost')->name('Category.EditPost');

        Route::get('/delete-category/{id}', 'Delete')->name('Category.Delete');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/list-user', 'list')->name('User.list');
        Route::get('/list-user-bill/{id_user}', 'listBill')->name('User.listBill');
        Route::get('/list-user-bill-sp/{id}/{idUser}', 'sanpham')->name('User.sanphambill');

        Route::get('/list-nv', 'listNV')->name('User.listNV');
        Route::get('/add', 'create')->name('User.add');
        Route::post('/createuser', 'createuser')->name('User.createuser');
        Route::get('/edit/{id}', 'edit')->name('User.edit');
        Route::post('/update/{id}', 'update')->name('User.update');

        Route::get('/delete-user/{id}', 'Delete')->name('User.Delete');
    });
    Route::controller(AdminController::class)->group(function () {
        Route::get('/home', 'Home')->name('Admin.home');

    });
    Route::controller(NhapXuatKhoController::class)->group(function () {
        Route::get('/list-NhapXuatKho', 'List')->name('NhapXuatKho.list');

        Route::get('/create-NhapXuatKho', 'Create')->name('NhapXuatKho.create');
        Route::post('/create-NhapXuatKho', 'CreatePost')->name('NhapXuatKho.createPost');

        Route::get('/edit-NhapXuatKho/{id}', 'Edit')->name('NhapXuatKho.edit');
        Route::post('/edit-NhapXuatKho/{id}', 'EditPost')->name('NhapXuatKho.EditPost');

        Route::get('/delete-NhapXuatKho/{id}', 'Delete')->name('NhapXuatKho.Delete');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/list-Order', 'List')->name('Order.list');

        Route::get('/change-status-Order/{id}/{type}', 'Change')->name('Order.change');
        Route::get('/show-Order/{id}', 'Show')->name('Order.show');

        Route::get('/delete-Order/{id}', 'Delete')->name('Order.Delete');
    });
    Route::controller(BillsController::class)->group(function () {
        Route::get('/danh-sach-don-hang/{genaral}','list')->name('admin.listBill');
        Route::get('/hoadon/sanpham/{id}/{idUser}','sanpham')->name('admin.sanpham');
        Route::get('/editbill/{id}','edit')->name('admin.editBill');
        Route::PUT('/updatebill/{id}','update')->name('admin.updateBill');
        Route::get('/addbill','add')->name('admin.addBill');
        Route::POST('/postaddbill','create')->name('admin.postaddBill');
        Route::DELETE('/deletebill/{id}','delete')->name('admin.deleteBill');
        Route::get('/historyBill','history')->name('admin.historyBill');
        Route::get('/changebill/{id}/{status}','change')->name('admin.changeBill');
    });

});

Auth::routes();
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('trangchu');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sanpham/{idProduct}',[App\Http\Controllers\HomeController::class,'viewProduct'])->name('home.product');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('/{idUser}/cart',  [App\Http\Controllers\HomeController::class, 'cartUser'])->name('home.cartUser');
Route::get('/trucart/{idUser}/{idProduct}', [App\Http\Controllers\HomeController::class, 'trucart'])->name('home.trucart');
Route::get('/themcart/{idUser}/{idProduct}', [App\Http\Controllers\HomeController::class, 'themcart'])->name('home.themcart');
Route::DELETE('/deleteproductuser/{id}',[App\Http\Controllers\HomeController::class,'delete'])->name('home.deleteProduct');
Route::DELETE('/deleteProduct/{id}',[App\Http\Controllers\HomeController::class,'deleteProduct'])->name('deleteProduct');
Route::get('/thanhtoan',[App\Http\Controllers\HomeController::class, 'pay'])->name('home.pay');
Route::POST('/postthanhtoan',[App\Http\Controllers\HomeController::class, 'postthanhtoan'])->name('home.postthanhtoan');
Route::controller(HomeController::class)->group(function () {
Route::get('/category/{id_category}','category')->name('category');
Route::get('/addlove/{id_product}', 'addlove')->name('love');
Route::DELETE('/deletelove/{id}','deletelove')->name('home.deletelove');
Route::get('/show', 'listlove')->name('listlove');
Route::get('/shop', 'shop')->name('shop');
Route::post('/search', 'search')->name('search');
Route::get('/kiemtradonhang', 'mycart')->name('home.mycart');
Route::get('/contact', 'contact')->name('home.contact');
Route::get('/blog', 'blog')->name('home.blog');
Route::get('/useredit/{id}', 'edituser')->name('home.useredit');
Route::put('/userupdate/{id}', 'update')->name('users.update');
});
