<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\Layout\CategoriesController;
use App\Http\Controllers\Admin\Layout\ProductsController;
use App\Http\Controllers\Admin\Layout\NewsController;
use App\Http\Controllers\Admin\Layout\UsersController;
use App\Http\Controllers\Admin\Layout\LoginController;
use App\Http\Controllers\Admin\Layout\RegisterController;
use App\Http\Controllers\Admin\Layout\OrdersController;
use App\Http\Controllers\Customer\HomeCustomController;
use App\Http\Controllers\Customer\LoginCustomController;
use App\Http\Controllers\Customer\RegisterCustomController;
use App\Http\Controllers\Customer\ProductsCustomController;
use App\Http\Controllers\Customer\CartController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware;
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

//=================================== backend
//login

Route::post('admin/login', [LoginController::class, 'login'])->name('login');
Route::get('admin/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('admin/register', [RegisterController::class, 'register'])->name("register");


//Middleware for the backend routes

Route::post('admin/register', [RegisterController::class, 'register'])->name("register");

Route::get('admin/login', function () {
    if (Auth::check() && Auth::user()->level == 1) {
        return redirect()->back();
    }
    return view("backend.login-admin");
});

Route::get("admin/home", [AdminHomeController::class, "index"]);

Route::get('admin/register', function () {
    return view("frontend.register-admin");
});

Route::group(['prefix' => 'admin'], function () {
    //home 
    
    //categories
    Route::get("/categories", [CategoriesController::class, "read"]);
    Route::get("/categories/update/{id}", [CategoriesController::class, "update"]);
    Route::post("/categories/update/{id}", [CategoriesController::class, "updatePost"]);
    Route::get("/categories/create", [CategoriesController::class, "create"]);
    Route::post("/categories/create", [CategoriesController::class, "createPost"]);
    Route::get("/categories/delete/{id}", [CategoriesController::class, "delete"]);
    //product

    Route::get("/products", [ProductsController::class, "read"]);
    Route::get("/products/update/{id}", [ProductsController::class, "update"]);
    Route::post("/products/update/{id}", [ProductsController::class, "updatePost"]);
    Route::get("/products/create", [ProductsController::class, "create"]);
    Route::post("/products/create", [ProductsController::class, "createPost"]);
    Route::get("/products/delete/{id}", [ProductsController::class, "delete"]);


    //list users

    Route::get("/users", [UsersController::class, "read"]);
    Route::get("/users/create", [UsersController::class, "create"]);
    Route::post("/users/create", [UsersController::class, "createPost"]);
    Route::get("/users/update/{id}", [UsersController::class, "update"]);
    Route::post("/users/update/{id}", [UsersController::class, "updatePost"]);
    Route::get("/users/delete/{id}", [UsersController::class, "delete"]);

    //order 

    Route::get("/orders", [OrdersController::class, "read"]);
    Route::get("/orders/detail/{id}", [OrdersController::class, "getDetail"]);


    //news
    Route::get("/news", [NewsController::class, "read"]);
    Route::get("/news/update/{id}", [NewsController::class, "update"]);
    Route::post("/news/update/{id}", [NewsController::class, "updatePost"]);
    Route::get("/news/create", [NewsController::class, "create"]);
    Route::post("/news/create", [NewsController::class, "createPost"]);
    Route::get("/news/delete/{id}", [NewsController::class, "delete"]);
})->middleware('Checklogin');


//===================================FRONTEND
Route::get('customer/login',function(){

    return view("frontend.account.login");
});

Route::get('customer/register', function () {
    return view("frontend.account.register");
});

//login


Route::post('customer/login', [LoginCustomController::class, 'loginpost'])->name('loginPost');
Route::get('customer/logout', [LoginCustomController::class, 'logout'])->name('logout');

Route::post('customer/register', [RegisterCustomController::class, 'register'])->name("register");

// Route::middleware('auth')->group(function () {
//     Route::get('home', function () {
//         return view("frontend.homepage.layout-trang-chu");
//     })->name("home");
// });
//homepage

Route::get('home', [HomeCustomController::class, 'home'])->name('home');
Route::get('customer/checkout', [HomeCustomController::class, 'customer']);
//product
Route::get('customer/products/detail/{id}', [ProductsCustomController::class, 'detail']);
Route::get('customer/categories/{cateID}', [ProductsCustomController::class, 'getByCate']);

// Cart
Route::get('customer/cart', [CartController::class, 'viewCart']);

Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('update{id}/{quantity}', [CartController::class, 'update'])->name('cart.update');
    Route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
});

//Checkout 
Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', [CheckoutController::class, 'form'])->name('checkout');
    Route::post('/', [CheckoutController::class, 'submit_form'])->name('checkout');
});

Route::get('customer/order', [CartController::class, 'orders']);
Route::post('customer/order', [CartController::class, 'orderPost']);
Route::post('customer/order', [CartController::class, 'ordersPost']);
Route::get('customer/orderDetail/{id}', [CartController::class, 'orderDetail']);
Route::get('customer/orderSuceess', [CartController::class, 'orderSuceess']);
Route::get('customer/delete/{id}', [CartController::class, 'delete']);
