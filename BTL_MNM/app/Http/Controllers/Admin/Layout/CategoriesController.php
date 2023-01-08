<?php

namespace App\Http\Controllers\Admin\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use View;
// model

use App\Models\Categories;
class CategoriesController extends Controller
{
    //
   public $model;
    public function __construct(){
        //gan bien $model tro thanh bien object cua class products
        $this->model = new Categories();//khi do tu bien model co the truy cap duoc vao cac ham, bien cua class products tu day
    }

    public function read(){
        $data = Categories::all();
        return view("backend.CategoriesRead",["data"=>$data]);
    }

    public function update($id){
        $record = $this->model->modelGetRecord($id);
        return view("backend.CategoriesCreateUpdate",["record"=>$record]);
    }

    public function updatePost(Request $request, $id){
    //    $this->model->modelUpdate($id);
        $categoryData = $request->except('_token');
        // dd($categoryData);
        DB::table("categories")->where("id", $id)->update($categoryData);
        return redirect(url('admin/categories'))->with('success', 'Thêm danh mục thành công');;

    }

    public function create(){
        return view("backend.CategoriesCreateUpdate");
    }
    //create - POST
    public function createPost(Request $request){
        $request->except('_token');
        $name = $request->name;
        $parent_id = $request->parent_id;
        DB::table("categories")->insert(["name" => $name, "parent_id" => $parent_id]);
        return redirect('admin/categories');
    }
  
    //delete
    public function delete($id){
        //lay mot ban ghi
        Categories::find($id)->delete();
        //di chuyen den mo url khac
        return redirect(url("admin/categories"));
    }



}
