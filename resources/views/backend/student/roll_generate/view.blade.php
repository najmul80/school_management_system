@extends('admin.master')
@section('admin')
<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box bb-3 border-warning">
						<div class="box-header">
							<h4 class="box-title">Student <strong>Roll Generate</strong></h4>
						</div>

						<div class="box-body">
							<form action="{{route('roll.generate.store')}}" method="POST">
								@csrf
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<h5> Year</h5>
											<div class="controls">
												<select name="year_id" id="year_id" required class="form-control">
													<option value="" disabled selected>--select year--</option>
													@foreach($data['years'] as $year)
													<option value="{{$year->id}}">{{$year->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div> <!-- /.end col-4 -->
									<div class="col-md-4">
										<div class="form-group">
											<h5> Class </h5>
											<div class="controls">
												<select name="class_id" id="class_id" required class="form-control">
													<option value="" disabled selected>--select class--</option>
													@foreach($data['classes'] as $class)
													<option value="{{$class->id}}">{{$class->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div> <!-- /.end col-4 -->
									<div class="col-md-4" style="padding-top: 25px;">
										<a id="search" class="btn btn-rounded btn-primary mb-5">Search</a>
									</div> <!-- /.end col-4 -->
								</div> <!-- /.End row -->
								<!-- roll generate table -->
								<div class="row d-none" id="roll-generate">
									<div class="col-md-12">
										<table class="table table-bordered table-striped" style="width: 100%;">
											<thead>
												<tr>
													<th>Id No</th>
													<th>Student Name</th>
													<th>Father Name</th>
													<th>Gender</th>
													<th>Roll</th>
												</tr>
											</thead>
											<tbody id="roll-generate-tr"></tbody>
										</table>
									</div>
								</div>
								<input type="submit" value="Roll Generator" class="btn btn-info" id="">
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->

	</div>
</div>
@endsection
@section('script')

<script >
	$(document).on('click', '#search', function() {
		var year_id = $('#year_id').val();
		var class_id = $('#class_id').val();
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "{{ route('roll.generate.getstudents')}}",
			type: "GET",
			data: {
				'year_id': year_id,
				'class_id': class_id
			},
			success: function(data) {
				$('#roll-generate').removeClass('d-none');
				var html = '';
				$.each(data, function(key, v) {
					html +=
						'<tr>' +
						'<td>' + v.student.id_no + '<input type="hidden" name="student_id[]" value="' + v.student_id + '"></td>' +
						'<td>' + v.student.name + '</td>' +
						'<td>' + v.student.fname + '</td>' +
						'<td>' + v.student.gender + '</td>' +
						'<td><input type="text" class="form-control form-control-sm" name="roll[]" value="' + v.roll + '"></td>' +
						'</tr>';
				});
				html = $('#roll-generate-tr').html(html);
				
			},
			error:function(e){
				console.log(e)
			},
		});
	});
</script>
@endsection