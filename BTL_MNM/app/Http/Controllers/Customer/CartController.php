<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function addCart(Request $request, $id)
    {
        // if(Auth::id()){
        //     $user = auth()->user();
        //     $product = Products::find($id);
        //     $cart = new Cart();

        //     $cart->name=$user->name;
        //     $cart->phone=$user->phone;
        //     $cart->address=$user->address;
        //     $cart->product_title=$product->name;
        //     $cart->price=$product->price;
        //     $cart->quantity=$request->quantity;
        //     // dd($request);
        //     $cart->save();
        //     return redirect()->back()->with('message','Product added successfully');
        // }

        // else
        // {
        //     return redirect('customer/login');
        // }
        $product = DB::table("products")->where('id', $id)->first();
        // $product lay tat ca thong tin cua product
        if ($product != null) {
            $oldCart = Session('cart') ? Session('cart') : null;
            // tao 1 dot tuong gio hang moi
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            $request->session()->put('cart', $newCart);// key la Cart va value la object newcart
            // dd(Session('cart'));
        }
        // dd($newCart->product);
        return view("frontend.homepage.cart",["newCart"=>$newCart]);
        
    }
    public function viewcart()
    {
        // return view("frontend.homepage.shopping-cart");
        // $products = DB::table("products")->where("id", "=", $id)->get();
        // $info = DB::table("customers")->where("id", "=", $id)->get();
       
        return view("frontend.homepage.cart");
    }
   

    public function orders()
    {
        return view("frontend.homepage.order");
    }

    public function delCart(Request $request ,$id)
    {
        $oldCart = Session('cart') ? Session('cart') : null;
        $newCart = new Cart($oldCart);//tao dt moi de gan cart
        $newCart->DelCart($id);

        if(Count($newCart->products)>0){
            $request->Session()->put('cart', $newCart);
        }else{
            $request->Session()->forget('cart');
        }
        return view("frontend.homepage.cart",["newCart"=>$newCart]);

    }

    public function orderSuceess()
    {
        return view("frontend.homepage.orderSuccessfull");
    }
    public function orderDetail($id)
    {
        $order = DB::table("carts")->where("id", "=", $id)->get();
        return view("backend.homepage.orderDetailView", ["order" => $order]);
    }
}
