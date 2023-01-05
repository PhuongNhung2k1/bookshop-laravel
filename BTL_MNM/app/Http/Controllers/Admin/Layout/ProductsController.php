<?php

namespace App\Http\Controllers\Admin\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;
class ProductsController extends Controller
{
    //  //
    private $model;

    //ham tao
    public function __construct(Products $products)
    {
        //gan bien $model tro thanh bien object cua class products
        // $this->model = new Products();//khi do tu bien model co the truy cap duoc vao cac ham, bien cua class products tu day
        $this->model = $products;
    }
    //lay danh sach cac ban ghi
    public function read()
    {
        //lay du lieu tu ham modelRead0 cua class products
        $data = $this->model->paginate(12);
        //goi view, truyen du lieu ra view
        return view("backend.productsRead", ["data" => $data]);
    }
    //update
    public function update($id)
    {
        //lay du lieu tu model
        $record = Products::find($id);
        return view("backend.productsCreateUpdate", ["record" => $record]);
    }
    //update POST
    public function updatePost(Request $request, $id)
    {
        
        $productData = $request->except('_token');
        // dd($productData);
        $productData = $request->only(['name','category_id','description','content','quantity','hot','photo','price','discount']);
        // except: loai bo 'name' trong form
        // only: chi lay 'name' trong 
        // dd($productData);
        if($request->hot == null){
            $productData['hot'] = 0;
        }else{
            $productData['hot'] = 1;
        }
        $this->model->where('id', '=', $id)->update($productData);
        if($request->hasFile('photo')){
            $photo = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move("upload/products", $photo);
            // dd($photo);
        $this->model->where('id', '=', $id)->update(['photo'=>$photo]);
        }

        // $data = Products::create($productData);
        // // dd($data);
        // // $this->model->modelCreate();
        // // dd($request);
        // $this->model->modelUpdate($id);
        return redirect('backend/products');
    }
    //create
    public function create()
    {
        // $data = Products::find($id);
        return view("backend.productsCreateUpdate");
    }
    //create post
    // public function createPost(ProductsRequest $request){
    public function createPost(Request $request)
    {
        $request->except('_token');
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'discount' => 'required|numeric|min:1|max:90',
            'description'=>'required|max:255',
        ],[
            'name.required'=>'Tên sản phẩm bắt buộc phải nhập',
            'content.required'=>'Tiêu đề bắt buộc phải nhập',
            'price.required'=>'Gía sản phẩm bắt buộc phải nhập',
            'discount.required'=>'Giảm giá phải nhập số',
            'discount.min'=>'Giam gia phai duoi 90%',
            'description.required'=>'Mô tả sản phẩm bắt buộc phải nhập',
        ]
    
    );
        dd($request);
        //   dd($data);
        $this->model->modelCreate();
        return redirect(url('backend/products'));
    }
    //delete
    public function delete($id)
    {
       
        $oldPhoto = DB::table("products")->where('id', $id)->select('photo')->first();
        if (isset($oldPhoto->photo) && file_exists("upload/products" . $oldPhoto->photo))
             {
            unlink("upload/products/" . $oldPhoto->photo);
        }
        Products::find($id)->delete();
        return redirect(url('backend/products'));
    }
}
