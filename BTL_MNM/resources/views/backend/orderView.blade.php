@extends("backend.home-admin")
@section("load-noi-dung")
<div class="col-md-12">
 	<div class="panel panel-primary">
 		<div class="panel-heading"><h4>List orders</h4></div>
 		<div class="panel-body">
 			<table class="table table-hover">
 				<tr class="table-info">
 					<th>STT</th>
                    <th>Users name</th>
 					<th>Products name</th>
                    <th>Date buy</th>
 					<th>Price</th>
 					<th></th>
 				</tr>
 				@foreach($data as $rows)
 				
 				<tr>
 					
                    <td>{{$rows->id}}</td>
 					<td><b>{{$rows->name}}</b></td>
 					<td>{{$rows->product_title}}</td>
 					<td>{{$rows->created_at}}</td>
 					<td><b>{{number_format($rows->price)}} </b></td>
 					<!-- <td style="width: 300px;">
 						
 							<div>Đã giao hàng</div>
 					
 							<div>Chưa giao hàng</div>
 					
 					</td> -->
 					<td style="text-align:center;width: 300px;">
 						
 							<b><a href="#" class="label label-info">Giao hàng</a>
                            &nbsp;&nbsp;
                        
                        <a href="{{ url('admin/orders/detail/'.$rows->id) }}" class="label label-success">Chi tiết</a>
 					</td>
 				</tr>
 			
              
 				@endforeach
 			<style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link">Trang</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
            </ul>
 		</div>
 	</div>
 </div>
 @endsection