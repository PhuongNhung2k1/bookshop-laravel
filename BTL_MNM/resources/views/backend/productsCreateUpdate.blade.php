@extends("backend.home-admin")
@section("load-noi-dung")
<!-- Primary table start -->
<div class="col-md-8 col-xs-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit products</div>
		<div class="panel-body">
			<form method="post" action="" enctype="multipart/form-data">
				<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

				@csrf
				@if($errors->any())
				<div class="alert alert-danger text-center" style="font-size: 15px;" role="alert">
					Vui lòng kiểm tra lại dữ liệu nhập vào
				</div>
				@endif
				<div class="row" style="margin-top:5px;">
					<div class="col-md-3">Tiêu đề
						@error('name')
						<span style="color: red;font-size:10px">* <br>Tiêu đề không được bỏ trống</span>
						@enderror
					</div>

					<div class="col-md-9">
						<input type="text" name="name" class="form-control" value="{{ isset($record->name) ? $record->name : '' }}">
						<!-- @if($errors->has('name'))
					<span style="color:red;">{{ $errors->first('name') }}</span>
				  	@endif -->
						@error('name')
						<span style="color: red;">{{$message}}</span>
						@enderror
					</div>

				</div>

				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-3">Thuộc danh mục</div>
					<div class="col-md-9">
						<?php
						//trong laravel co the truyen full cau lenh sql de truy van
						$categories = DB::select("select * from categories order by id desc");
						?>

						<select name="category_id">
							@foreach($categories as $rows)
							<option @if(isset($record->category_id) && $record->category_id == $rows->id) selected @endif value="{{ $rows->id }}">{{ $rows->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-3">Giới thiệu
						@error('description')
						<span style="color: red;font-size:10px">* <br>Giới thiệu không được bỏ trống</span>
						@enderror
					</div>
					<div class="col-md-9">
						<textarea name="description" class="form-control" style="height:250px;">
						{{ isset($record->description) ? $record->description : '' }}
						</textarea>
						<script type="text/javascript">
							CKEDITOR.replace("description")
						</script>
						@error('description')
						<span style="color: red;">{{$message}}</span>
						@enderror
					</div>

				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-3">Chi tiết
						@error('content')
						<span style="color: red;font-size:10px">* <br>Chi tiết không được bỏ trống</span>
						@enderror
					</div>
					<div class="col-md-9">
						<textarea name="content" class="form-control" style="height:300px;">
						{{ isset($record->content) ? $record->content : '' }}
						</textarea>
						<script type="text/javascript">
							CKEDITOR.replace("content")
						</script>
						@error('content')
						<span style="color: red;">{{$message}}</span>
						@enderror
					</div>

				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<input type="checkbox" value="1" {{ isset($record->hot) && $record->hot == 1 ? 'checked' : ""}} name="hot" id="hot"> <label for="hot">Tin nổi bật</label>
					</div>

				</div>

				<div class="row" style="margin-top:5px;">
					<div class="col-md-3">Gía bán
						@error('price')
						
						<span style="color: red;font-size:10px">* <br>Gía bán không được bỏ trống</span>
						@enderror
					</div>
					<div class="col-md-9">
						<input type="number" name="price" class="form-control" value="{{ isset($record->price) ? $record->price : '' }}">
						@if($errors->has('price'))
						@if(!isset($record->price))
						<span style="color: red;">{{ $errors->first('price')}}</span>
						@endif
						@endif
					</div>

				</div>

				<div class="row" style="margin-top:5px;">
					<div class="col-md-3">Giảm giá (%)</div>
					<div class="col-md-9">
						<input type="number" name="discount" class="form-control" value="{{ isset($record->discount) ? $record->discount : '' }}">
					</div>
				</div>
				<div class="row" style="margin-top:5px;">
					<div class="col-md-3">Số lượng</div>
					<div class="col-md-9">
						<input type="number" name="quantity" class="form-control" value="{{ isset($record->quantity) ? $record->quantity : '' }}">
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-3">Ảnh</div>
					<div class="col-md-9">
						<input type="file" name="photo">
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						
						<input type="submit" class="btn btn-primary" value="Process">
					</div>
				</div>
				<!-- end row -->
			</form>
		</div>
	</div>
</div>
@endsection