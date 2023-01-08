<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use Session;

use Illuminate\Support\Facades\Request;
use App\Models\User;
class Cart extends Model
{
    use HasFactory;

    public $cart;
    public $product = null;
    public $quantity = 1;
    public $items = [];
    public $total_price = 0;
    public $total_quantity = 0;

    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }
    public function add($product,$quantity=1){
        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'content' => $product->content,
            'description' => $product->description,
            'hot' => $product->hot,
            'quantity' => $quantity,
            'discount' => $product->discount,
            'photo' => $product->photo,
            'price' => $product->price-($product->price*$product->discount/100)
        ];
        // new sp co roi thi cn sl
        if(isset( $this->items[$product->id])){
            $this->items[$product->id]['quantity'] += $quantity;
        }else{
            $this->items[$product->id] = $item;// gan gt vao gio hang trong
        }
        // gan thanh mang san pham
        // luu vao session
        session(['cart' => $this->items]);
        // dd(session('cart'));
    }

    public function remove($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }
    // public function update($id,$quantity=1){
    //     if(isset($this->items[$id])){
    //         $this->items['id']['quantity'] = $quantity;
    //     }
    //     session(['cart' => $this->items]);
    // }

    public function clear(){
        session(['cart' => '']);
    }
    private function get_total_price(){
       $t =0;
       foreach($this->items as $item){
            $t += $item['price']*$item['quantity'];
       }
        return $t;
    }

    private function get_total_quantity(){
        $t =0;
       foreach($this->items as $item){
            $t += $item['quantity'];
       }
        return $t;
    }

    public function cartCheckout(Request $request){
        dd($request);
        $this->cart = session('cart');
        $this->total_price = $this->get_total_price();
        $this->total_quantity =$this->get_total_quantity();
        
    }
   
}
