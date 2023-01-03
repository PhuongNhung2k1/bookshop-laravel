<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
class RegisterCustomController extends Controller
{
    //
    public function register(Request $request){
        // $categories = DB::table("categories")->take(6)->get();
        // $products = DB::table("products")->take(8)->get();
        // return view("frontend.account.register",["categories"=>$categories,"products"=>$products]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);

        return back()->with('success','User has been create successfully');
    }
}
