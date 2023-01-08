<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
class RegisterCustomController extends Controller
{
    //
    public function register(Request $request){
    
        $request->validate([
           'name'=>'required|string|max:255',
           'email'=>'required|string|email|max:255|unique:users',
           'password'=>'required|string|min:6',
        ],[
            'name.required'=>'Ten khong duoc bo trong',
            'email.required'=>'email khong duoc bo trong',
            'password.required'=>'password khong duoc bo trong',
        ]);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;
        $address = $request->address;
      
        // dd($name);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=> Hash::make($request->password)
        ]);
    
        DB::table("users")->insert(["name" => $name, "email" => $email, "password" => $password,"phone"=>$phone,"address"=>$address]);
        return back()->with('success','User has been create successfully');
    }
}
