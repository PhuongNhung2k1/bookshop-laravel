<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ProductsCustomController extends Controller
{
    //
    public function getByCate($cateID){
        $prodByCate = DB::table("products")->where("category_id","=",$cateID)->get();
        $categories = DB::table("categories")->take(6)->get();
        return view("frontend.homepage.productByCate",["prodByCate"=>$prodByCate,"categories"=>$categories]);
    }

    public function detail($id){
        // return "This is detail product";
        $categories = DB::table("categories")->take(6)->get();
        $detailProd = DB::table("products")->where("id","=",$id)->first();
        return view("frontend.homepage.detail-product",["detailProd"=>$detailProd,"categories"=>$categories]);
    }

    public function addCart($id){
        return redirect('customer/order');
    }
    
}
