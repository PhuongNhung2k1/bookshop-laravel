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

    public function remove(Cart $cart, $id){
        $cart->remove($id);
        
        return redirect()->back();
    }
    public function update(Cart $cart , $id,$quantity){
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id,$quantity);
        return redirect()->back();
    }
    public function clear(Cart $cart){
        $cart->clear();
        return redirect()->back()->with('success','Giỏ hàng trống');
    }
    public function cart(){
        return view("frontend.homepage.cart");
    }

    public function orders(){
        echo "This is order get";
    }
    public function orderpost(Request $request, $id)
    {
        // dd($this->checkout());
        // $phonecurrent = $request->phoneship;
        // $addresscurrent = $request->addressship;
        // dd($phonecurrent);
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
            // dd($cart);
           
            return redirect()->back()->with('message','Product added successfully');
        }
        else
        {
            return redirect('customer/login');
        }

        // return view("frontend.homepage.order");
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
