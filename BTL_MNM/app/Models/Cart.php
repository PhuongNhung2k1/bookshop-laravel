<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
   protected $table ="carts";

    public $product = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart){
        if($cart){
            $this->products=$cart->product;
            $this->totalPrice=$cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }

    public function AddCart($product,$id){
        // neu da ton tai sp roi thi chi can tang so luong
        // chua ton tai thi tu tem moi vao
        //product info: chua tat ca thong tin trong mang product
        $newProduct = ['quanty' => 0,'price'=>0, 'productInfo' => $product];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                // dat lai sp co id truyen vao
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * $product->price;
        // $newProduct['price'] = $newProduct['quanty'] * ($product->price-($product->price*$product->discount/100));
        $this->product[$id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalQuantity++;
    }
    public function DelCart($id){
        $this->totalQuantity -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];

        unset($this->products[$id]);
    }
}
