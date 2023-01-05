<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use Session;
class Cart extends Model
{
    use HasFactory;

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

    // public function remove($id){
    //     if(isset($this->items[$id])){
    //        unset($this->items[$product->id]);
    //     }

    //     session(['cart' => $this->items]);
    // }
    // public function update($id,$quantity=1){
    //     if(isset($this->items[$id])){
    //         $this->items[$product->id]['quantity'] = $quantity;
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

    // public function __construct($cart){
    //     if($cart){
    //         $this->products=$cart->product;
    //         $this->totalPrice=$cart->totalPrice;
    //         $this->totalQuantity = $cart->totalQuantity;
    //     }
    // }

    // public function AddCart($product,$id){
    //     // neu da ton tai sp roi thi chi can tang so luong
    //     // chua ton tai thi tu tem moi vao
    //     //product info: chua tat ca thong tin trong mang product
    //     $newProduct = ['quanty' => 0,'price'=>0, 'productInfo' => $product];
    //     if($this->product){
    //         if(array_key_exists($id,$this->product)){
    //             // dat lai sp co id truyen vao
    //             $newProduct = $this->product[$id];
    //         }
    //     }
    //     $newProduct['quanty']++;
    //     $newProduct['price'] = $newProduct['quanty'] * $product->price;
    //     // $newProduct['price'] = $newProduct['quanty'] * ($product->price-($product->price*$product->discount/100));
    //     $this->product[$id] = $newProduct;
    //     // dd($this->products[$id]);
    //     $this->totalPrice += $product->price;
    //     $this->totalQuantity++;
    // }
   
}
