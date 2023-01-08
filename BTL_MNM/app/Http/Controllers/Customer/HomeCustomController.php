<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



use App\Models\Products;
use Illuminate\Support\Facades\DB;
// in ra so luong trong gio hang
use App\Models\Cart;
use Illuminate\Support\Facades\View;
class HomeCustomController extends Controller
{
    //
    public function home(){
        //lay csdl
        $categories = DB::table("categories")->get();
        $products = DB::table("products")->take(8)->get();
        $cart = new Cart();// lay so luong trong cart
        return view("frontend.homepage.layout-trang-chu",["categories"=>$categories,"products"=>$products,"cart"=>$cart]);
    }
    
    public function addCart(Request $request , $id){
        if(Auth::id()){
            $user = auth()->user();
            $product = Products::find($id);
            $cart = new Cart();

            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->name;
            $cart->price=$product->price;
            $cart->quantity=$request->quantity;
            dd($request);
            $cart->save();
            return redirect()->back()->with('message','Product added successfully');
        }

        else
        {
            return redirect('customer/login');
        }
    }

    public function removeProduct($id){
        $data = DB::table("carts")->where("id","=",$id)->get();
        $data->delete();

        return redirect()->back();
    }



}
