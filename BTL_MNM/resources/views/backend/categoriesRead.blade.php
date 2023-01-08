@extends("backend.home-admin")
@section("load-noi-dung")
  <!-- Primary table start -->


<style type="text/css">
	.text-center td,
	.text-center th {
		width: 400px;
		height: 50px;
		font-size: 15px;
	}
</style>
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Danh mục sản phẩm </h4>
            <div style="margin-bottom:5px;">
        <a href="{{ url('admin/categories/create') }}" class="btn btn-primary">Add</a>
          </div>
            <div class="data-tables datatable-primary">
                <table id="dataTable2" class="text-center">
                    <thead class="text-capitalize">
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Edit | Delete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    	<!-- lay ra danh sach tat ca cac thu muc va phai foreach thi no moi hien thi nha -->
                    @foreach($data as $rows)
                        <tr>
                        	<td>{{$rows->id}}</td>
                            <td align="left">{{$rows->name}}</td>
                            <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{url('admin/categories/update/'.$rows->id)}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="" class="text-danger" data-toggle="modal" data-target="#confim"><i class="ti-trash"></i></a></li>
                                        <!-- <li><a href="{{url('admin/categories/delete/'.$rows->id)}}" class="text-danger" onclick="return window.confirm('Are you sure?');"><i class="ti-trash"></i></a></li> -->
                                    </ul>
                                </td>
                        </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>
               
        </div>
    </div>
</div>
<!-- Progress Table end -->
<div class="modal fade" style="top:35%" id="confim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Bạn có chắc muốn xoá không?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <a href="{{url('admin/categories/delete/'.$rows->id)}}"><button  type="button"  class="btn btn-primary">Xoá</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection