<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
class LoginCustomController extends Controller
{
    //

    public function login(Request $request){
        // $categories = DB::table("categories")->take(6)->get();
        // $products = DB::table("products")->take(8)->get();
        // return view("frontend.account.login",["categories"=>$categories,"products"=>$products]);
        if(Auth::attempt($request->only('name','email','password'))){
            // dd(Auth::user()->email);
            return redirect('home')->with('success',Auth::user()->email);
        }

        return back()->with('error','Email or password is incorrect!');

       
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

  
}
