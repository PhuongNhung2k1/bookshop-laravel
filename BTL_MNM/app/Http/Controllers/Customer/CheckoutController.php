<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth; // doi tuong
use App\Models\Cart;
use App\Models\Products;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    
    public function __construct()
    {
    }
    public function form()
    {
        return view('frontend.homepage.checkout');
    }
    public function submit_form(Request $request)
    {
        // lay thong tin trong session, neu nhap vao thi lay request
        $customer_id = Auth::chech()->user()->id;
        if ($order = Order::create([
            'customer_id' => $id,
            'order_note' => $request->order_note,
        ])) {
            $order_id = $order->id;
            foreach ($cart->items as $product_id => $item) {
                $quantity = $item['quantity'];
                OrderDetail::create([
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'price' => $price,
                    'quantity' => $quantity,
                ]);
            }
        }
        // dd($customer_id);
    }
}
