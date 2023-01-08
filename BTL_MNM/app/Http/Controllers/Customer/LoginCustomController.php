<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use Session;
class LoginCustomController extends Controller
{
    //
    public $emailCus = "";

    public function login(){
        return view("frontend.account.login");
    }
    public function loginPost(Request $request){
       
        if(Auth::attempt($request->only('name','email','password'))){
            // dd(Auth::user()->email);

            return redirect('home')->with('success',Auth::user()->email);
        }
         session(['emailcus'=>Auth::user()->email]);
        return back()->with('error','Email or password is incorrect!');

       
    }
    public function logout(){
        Auth::logout();
        return redirect('customer/login');
    }

  
}
