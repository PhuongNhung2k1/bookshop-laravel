<?php

namespace App\Http\Controllers\Admin\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
class NewsController extends Controller
{
    //
     private $model;

    //ham tao
    public function __construct(News $news){
        //gan bien $model tro thanh bien object cua class news
        // $this->model = new News();//khi do tu bien model co the truy cap duoc vao cac ham, bien cua class news tu day
        $this->model = $news;
    }
    //lay danh sach cac ban ghi
    public function read(){
        $data = $this->model->paginate(10);
        return view("backend.newsRead",["data"=>$data]);
    }
    //update
    public function update($id){
        $record = $this->model->find($id);
        return view("backend.newsCreateUpdate",["record"=>$record]);
    }
    //update POST
    public function updatePost(Request $request, $id){
        $newData = $request->except('_token','updated_at');
        $newData = $request->only(['name', 'description', 'content', 'photo', 'hot']);
        // dd($newData);
        if($request->hot == null){
            $newData['hot'] = 0;
        }else{
            $newData['hot'] = 1;
        }
        $this->model->find($id)->update($newData);
        // dd($request->hot);
        if ($request->hasFile('photo')) {
            $photo = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move("upload/news", $photo);
            $this->model->where('id', '=', $id)->update(["photo"=>$photo]);
        }
        return redirect('backend/news');
    }
    //create
    public function create(){
        return view("backend.newsCreateUpdate");
    }
    //create post
    public function createPost(Request $request){
        $request->except('_token');
        $request->validate([
            'name'=>'required|string|max:255',
            'content' => 'required|string|max:255',
            'description'=>'required|max:255',
        ],
    [
        'name.required'=>'Tên không được để trống',
        'content.required'=>'Tiêu đề bắt buộc phải nhập',
        'description.required'=>'Mô tả sản phẩm bắt buộc phải nhập',

    ]);
        $name = $request->name;
        $description = $request->description;
        $content = $request->content;
        $hot = $request->hot != "" ? 1 : 0;
        $photo = "";
        if($request->hasFile("photo")){
            $photo = time() . '_' . $request->file("photo")->getClientOriginalName();
            $request->file("photo")->move("upload/news/" . $photo);
        }
        DB::table("news")->insert(["name" => $name,"description"=>$description,"content"=>$content,"hot"=>$hot,"photo"=>$photo]);
        return redirect(url('backend/news'));
    }
    //delete
    public function delete($id){
        News::find($id)->delete();
        return redirect(url('backend/news'));
    }
}
