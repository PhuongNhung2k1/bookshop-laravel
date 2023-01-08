@extends("backend.home-admin")
@section("load-noi-dung")


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
            <h4 class="header-title">Danh sách Tin tức </h4>
            <div style="margin-bottom:5px;">
        <a href="{{ url('backend/news/create') }}" class="btn btn-primary">Add</a>
          </div>
            <div class="data-tables datatable-primary">
                <table id="dataTable2" class="text-center">
                    <thead class="text-capitalize">
                       <tr>
					<th style="width:50px;">STT</th>
					<th style="width:100px;">Ảnh</th>
					<th style="width:100px; text-align: center;">Tiêu đề</th>
					<th style="width:100px; text-align: center;">Hot news</th>
					<th style="width:100px;">Action</th>
				</tr>
                    </thead>
                    <tbody>
                   	<?php 					
					//dinh nghia so ban ghi tren mot trang
					$record_per_page = 4;
					$page = Request::get("page") != "" && is_numeric(Request::get("page")) ? Request::get("page") - 1 : 0;
					$stt = $page * $record_per_page;
				 ?>
				@foreach($data as $rows)
				<?php 
					$stt++;
				 ?>
				<tr>
					<td style="text-align:center;">{{ $stt }}</td>
					<td style="text-align:center;">
						@if(file_exists('upload/news/'.$rows->photo))
						<img style="width:100px;" src="{{ asset('upload/news/'.$rows->photo) }}">
						@endif
					</td>
					<td>{{ $rows->name }}</td>
					
					<td style="text-align: center;">
						@if($rows->hot == 1)
							Hot
						@endif
					</td>
					<td style="text-align:center;">
						<a href="{{ url('backend/news/update/'.$rows->id) }}">Edit</a>&nbsp; |
						<!-- <a href="{{ url('backend/news/delete/'.$rows->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a> -->
						<a href="" class="text-danger" data-toggle="modal" data-target="#confim"><i class="ti-trash"></i></a>

					</td>
				</tr>
				@endforeach
                    </tbody>
                </table>
                <style type="text/css">
				.pagination{padding:0px; margin:0px;}			
			</style>
			<!-- {{ $data->render() }} -->
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
          <a href="{{ url('backend/news/delete/'.$rows->id) }}"><button  type="button"  class="btn btn-primary">Xoá</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection