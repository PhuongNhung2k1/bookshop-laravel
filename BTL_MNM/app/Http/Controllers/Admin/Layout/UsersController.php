<?php

namespace App\Http\Controllers\Admin\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use View;
class UsersController extends Controller
{
    //
    private $model;
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    public function read(){
        $data  = $this->model->paginate(10);
        return view("backend.usersRead",["data"=>$data]);
    }

    public function create(){
        return view("backend.usersCreateUpdate");
    }
    public function createPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'level'=>'required',
        ],[
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'password.required'=>'Password không được để trống',
            'level.required'=>'Chức danh không được để trống',
        ]
    );

        $request->except('_token');
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $level = $request->level;
        DB::table("users")->insert(["name" => $name, "email" => $email, "password" => $password, "level" => $level]);
        return redirect('admin/users');

    }
    public function update($id){
        $record = $this->model->find($id);
        return view("backend.usersCreateUpdate",["record"=>$record]);
    }
    public function updatePost(Request $request, $id){
        $request->except('_token');
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $level = $request->level;
        // $emailAvailable = DB::table("users")->
        
        // dd($request);
        DB::table("users")->where('id','=',$id)->update(["name" => $name, "email" => $email, "password" => $password, "level" => $level]);
        return redirect(url('admin/users'));
    }
     public function delete($id){
        $this->model->find($id)->delete();
        return redirect(url('admin/users'));
    }

}
