@extends("backend.home-admin")
@section("load-noi-dung")
<div class="col-md-8 col-xs-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit news</div>
		<div class="panel-body">
			<form method="post" action="" enctype="multipart/form-data">
				@csrf
				@if($errors->any())
				<div class="alert alert-danger text-center" style="font-size: 15px;" role="alert">
					Vui lòng kiểm tra lại dữ liệu nhập vào
				</div>
				@endif
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-3">Tiêu đề
						@error('name')
						<span style="color: red;font-size:10px">* <br>Tiêu đề hông được bỏ trống</span>
						@enderror
					</div>
					<div class="col-md-9">
						<input type="text" name="name" class="form-control" value="{{ isset($record->name) ? $record->name : '' }}">
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-3">Giới thiệu
						@error('description')
						<span style="color: red;font-size:10px">* <br>Mô tả không được bỏ trống</span>
						@enderror
					</div>
					<div class="col-md-9">
						<textarea name="description" class="form-control" style="height:250px;">
						{{ isset($record->description) ? $record->description : '' }}
						</textarea>
						<script type="text/javascript">
							CKEDITOR.replace("description")
						</script>
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-3">Chi tiết
						@error('content')
						<span style="color: red;font-size:10px">* <br>Nội dung không được bỏ trống</span>
						@enderror
					</div>
					<div class="col-md-9">
						<textarea name="content" class="form-control" style="height:300px;">
						{{ isset($record->content) ? $record->content : '' }}
						</textarea>
						<script type="text/javascript">
							CKEDITOR.replace("content")
						</script>
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