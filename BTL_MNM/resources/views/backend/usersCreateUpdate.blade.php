@extends("backend.home-admin")
@section("load-noi-dung")
<!-- Primary table start -->
<div class="col-12 mt-5">
	<div class="panel panel-primary">
		<div class="panel-body">
			<form method="post" action="">
				@csrf
				@if($errors->any())
				<!-- @dd($errors) -->
				<div class="alert alert-danger text-center" style="font-size: 15px;" role="alert">
					Vui lòng kiểm tra lại dữ liệu nhập vào
				</div>
				@endif
				<!-- rows -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-2">Name
						@error('name')
						<span style="color: red;">Tên không được để trống</span>
						@enderror
					</div>
					<div class="col-md-10">
						<input type="text" value="{{ isset($record->name)?$record->name:'' }}" name="name" class="form-control" required>
					</div>
				</div>
				<!-- end rows -->
				<!-- rows -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-2">Phone</div>
					<div class="col-md-10">
						<input type="number" value="{{ isset($record->phone)?$record->phone:'' }}" name="phone" class="form-control" required>
					</div>
				</div>
				<!-- end rows -->
				<!-- rows -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-2">Address</div>
					<div class="col-md-10">
						<input type="text" value="{{ isset($record->address)?$record->address:'' }}" name="address" class="form-control" required>
					</div>
				</div>
				<!-- end rows -->
				<!-- rows -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-2">Email</div>
					<div class="col-md-10">
						<input type="email" value="{{ isset($record->email)?$record->email:'' }}" name="email" class="form-control" required>
					</div>
				</div>
				<!-- end rows -->

				<!-- rows -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-2">Password</div>
					<div class="col-md-10">
						<input type="password" value="{{ isset($record->password)?$record->password:'' }}" name="password" class="form-control" required>
					</div>
				</div>
				<!-- end rows -->
				<!-- rows -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-2">Chức danh
						<br><span style="color: red;">
							(1: Admin, 0:Customer)
						</span>
					</div>
					<class="col-md-10">
						<!-- <input type="radio" name="admin">Admin
            <input type="radio" name="user">User -->
			
						<input type="number" value="{{ isset($record->level)?$record->level:'' }}" name="level" class="form-control" required>
				</div>
		</div>
		<!-- end rows -->
		<!-- rows -->
		<div class="row" style="margin-top:5px;">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<input type="submit" value="Process" class="btn btn-primary">
			</div>
		</div>
		<!-- end rows -->
		</form>
	</div>
</div>
</div>
@endsection