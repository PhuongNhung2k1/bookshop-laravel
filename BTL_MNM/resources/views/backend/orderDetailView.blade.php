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
            <h4 class="header-title">Danh sách users </h4>
            <div style="margin-bottom:5px;">
        <a href="{{ url('backend/news/create') }}" class="btn btn-primary">Add</a>
          </div>
			<div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr class="table-info">
                                <th scope="col">ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Stock</th>
                                <th scope="col">status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                <!--         <tbody>
                  @foreach($data as $rows)
				<tr>
					<td>{{$rows->name}}</td>
					<td>{{$rows->product_title}}</td>
				</tr>
				@endforeach -->
                    </tbody>
                </table>
                <style type="text/css">
				.pagination{padding:0px; margin:0px;}			
			</style>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection