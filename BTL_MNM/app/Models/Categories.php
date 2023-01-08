<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Categories extends Model
{
    use HasFactory;

    protected $table ="categories";
    protected $fillable = [
        'id',
        'name',
        'parent_id',
    ];
    public $timestamp = false;
  
    // public function modelRead(){
    //     $data = DB::table("categories")->orderBy("id","desc")->paginate(8);
    //     return $data;
    // }
    //lay mot ban ghi
    public function modelGetRecord($id){
        $record = DB::table("categories")->where("id","=",$id)->first();
        return $record;
    }
  
   //update
    public function modelUpdate($id){
        $name = $_POST['name'] ;//<=> Request::get("name");
        $parent_id = $_POST['parent_id'];
        //update ban ghi
        DB::table("categories")->where("id","=",$id)->update(["name"=>$name,"parent_id"=>$parent_id]);
    }
    //create
    public function modelCreate(){
        $name = request("name"); //<=> Request::get("name");
        $parent_id = request("parent_id");
        DB::table("categories")->insert(["name"=>$name,"parent_id"=>$parent_id]);        
    }
    //delete
    public function modelDelete($id){
         //---
        DB::table("categories")->where("id","=",$id)->delete();
    }
}
