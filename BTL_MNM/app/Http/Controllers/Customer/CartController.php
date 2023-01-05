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
use View;
class CartController extends Controller
{
    //
    // hien thi gio hang
    public function viewCart(Cart $cart){
        return view("frontend.homepage.cart",['cart'=>$cart]);
    }
    public function add(Cart $cart,$id){
        $product = Products::find($id);
        $cart->add($product);
        // dd(session('cart'));
        return redirect()->back();// quay lai trang vua roi
    }

    public function remove(Cart $cart , $id){
        $cart->remove($id);
        return redirect()->back();
    }
    public function update(Cart $cart , $id,$quantity){
        $cart->update($id,$quantity);
        return redirect()->back();
    }
    public function clear(Cart $cart){
        $cart->clear();
        return redirect()->back();
    }
    public function cart(){
        return view("frontend.homepage.cart");
    }
    public function addCart(Request $request, $id)
    {
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
            $cart->save();
           
            return redirect()->back()->with('message','Product added successfully');
        }

        else
        {
            return redirect('customer/login');
        }
        // $product = DB::table("products")->where('id', $id)->first();
        // // $product lay tat ca thong tin cua product
        // if ($product != null) {
        //     $oldCart = Session('cart') ? Session('cart') : null;
        //     // tao 1 dot tuong gio hang moi
        //     $newCart = new Cart($oldCart);
        //     $newCart->AddCart($product, $id);
        //     $request->session()->put('cart', $newCart);// key la Cart va value la object newcart
        //     // dd(Session('cart'));
        // }
        // // dd($newCart->product);
        // return view("frontend.homepage.cart",compact('newCart'));
        
    }
    // public function viewcart(Request $request,$id)
    // {
    //     // $newCart = DB::table("carts")->get();
    //     // return view("frontend.homepage.shopping-cart");
    //     $products = DB::table("products")->where("id", "=", $id)->get();
    //     $info = DB::table("users")->where("id", "=", $id)->get();
    //     // dd($products);
    //     return view("frontend.homepage.cart",["products"=>$products,"info",$info]);
    // }
   

    public function orders()
    {
        return view("frontend.homepage.order");
    }

    // public function delCart(Request $request ,$id)
    // {
    //     $oldCart = Session('cart') ? Session('cart') : null;
    //     $newCart = new Cart($oldCart);//tao dt moi de gan cart
    //     $newCart->DelCart($id);

    //     if(Count($newCart->products)>0){
    //         $request->Session()->put('cart', $newCart);
    //     }else{
    //         $request->Session()->forget('cart');
    //     }
    //     return view("frontend.homepage.cart",["newCart"=>$newCart]);

    // }

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
