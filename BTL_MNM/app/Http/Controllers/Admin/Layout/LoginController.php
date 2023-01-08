<?php

namespace App\Http\Controllers\Admin\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //

    public function login(){
       return view("backend.login-admin");
    }

   public function loginPost(Request $request){
        // $categories = DB::table("categories")->take(6)->get();
        // $products = DB::table("products")->take(8)->get();
        // return view("frontend.account.login",["categories"=>$categories,"products"=>$products]);
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $scredentials = $request->only('email','password');

        if(Auth::attempt($scredentials)){
            return redirect('admin/home')->with('success','Welcome');
        }

        return back()->with('error','Email or password is incorrect!');
       
    }
    
    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }

   
}
