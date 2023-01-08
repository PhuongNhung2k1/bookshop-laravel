@extends("backend.home-admin")
@section("load-noi-dung")
<!-- Primary table start -->

<div class="col-12 mt-5">
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit Category</div>
		<div class="panel-body">
			<form method="post" action="">
				@csrf
				<!-- rows -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-2">Name</div>
					<div class="col-md-10">
						<input type="text" value="{{ isset($record->name)?$record->name:'' }}" name="name" class="form-control" required>
					</div>
				</div>
				<!-- end rows -->
				<!-- rows -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-2">Parent</div>
					<div class="col-md-10">
						<?php
						$categories = DB::select("select * from categories order by id desc");
						?>
						<select name="parent_id">
							<option value="0"></option>
							<?php foreach ($categories as $rows) : ?>
								<option <?php if (isset($record->parent_id) && $record->parent_id == $rows->id) : ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
							<?php endforeach; ?>
						</select>
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