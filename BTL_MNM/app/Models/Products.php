<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable= [
        'id',
        'name',
        'description',
        'content',
        'hot',
        'photo',
        'price',
        'quantity',
        'discount',
        'category_id',
    ];

   //  public function modelRead(){
   //      $data = DB::table("products")->orderBy("id","desc")->paginate(8);
   //      return $data;
   //  }
   //  //lay mot ban ghi
   //  public function modelGetRecord($id){
   //      $record = DB::table("products")->where("id","=",$id)->first();
   //      return $record;
   //  }
  
   //update
    public function modelUpdate($id){

        // $name = request("name"); //<=> Request::get("name");
        // $category_id = request("category_id");
        // $description = request("description");
        // $content = request("content");
        // $quantity = request("quantity");
        // $hot = request("hot") != "" ? 1 : 0;
        // $price= request("price");
        // $discount= request("discount");
        // //update ban ghi
        // DB::table("products")->where("id","=",$id)->update(["name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"quantity"=>$quantity,"hot"=>$hot,"price"=>$price,"discount"=>$discount]);
        // //neu co anh thi update anh
        // if(Request::hasFile("photo")){
        //     //lay anh cu de xoa
        //     //->select("photo") lay cot photo
        //     $oldPhoto = DB::table("products")->where("id","=",$id)->select("photo")->first();
        //     if(isset($oldPhoto->photo) && file_exists("upload/products/".$oldPhoto->photo))
        //         unlink("upload/products/".$oldPhoto->photo);
        //     $photo = time()."_".Request::file("photo")->getClientOriginalName();
        //     Request::file("photo")->move("upload/products",$photo);
        //     DB::table("products")->where("id","=",$id)->update(["photo"=>$photo]);
        // }
    }
    //create
    public function modelCreate(){
        $name = request("name"); //<=> Request::get("name");
        $category_id = request("category_id");
        $description = request("description");
        $content = request("content");
        $quantity = request("quantity");
        $price = request("price");
        $discount = request("discount");
        $hot = request("hot") != "" ? 1 : 0;
        $photo = "";
        //neu co anh thi update anh
        if(Request::hasFile("photo")){
            //Request::file("photo")->getClientOriginalName() lay ten file
            $photo = time()."_".Request::file("photo")->getClientOriginalName();
            //thuc hien upload anh
            Request::file("photo")->move("upload/products",$photo);
        }
        //update ban ghi
        DB::table("products")->insert(["name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"quantity"=>$quantity,"hot"=>$hot,"photo"=>$photo,"price"=>$price,"discount"=>$discount]); 
        Session()->flash('success', 'Thêm dữ liệu thành công.');

    }
   //  //delete
    // public function modelDelete($id){
    //      //---
    //         //lấy ảnh cũ để xóa
    //         $oldPhoto = DB::table("products")->where("id","=",$id)->select("photo")->first();
    //         if(isset($oldPhoto->photo) && file_exists("upload/products/".$oldPhoto->photo))
    //         unlink("upload/products/".$oldPhoto->photo);
    //         //---
    //     DB::table("products")->where("id","=",$id)->delete();
    // }
}
