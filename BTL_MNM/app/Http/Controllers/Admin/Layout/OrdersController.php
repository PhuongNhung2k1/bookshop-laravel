<?php

namespace App\Http\Controllers\Admin\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
class OrdersController extends Controller
{
    //

    public function read(){
        $users = DB::table("users")->orderBy('id','desc')->get();
        // $data = DB::table("carts")->get();
        $data = DB::table("carts")->orderBy('created_at','desc')->get();
        return view("backend.orderView",["data"=>$data,"users"=>$users]);
    }

    public function getDetail($id){
      
        $order = DB::table("orders")->where("id","=",$id)->get();
        return view("backend.orderDetailView",["order"=>$order]);

    }
   

}
