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
							<h4 class="box-title">Student <strong>Search</strong></h4>
						</div>

						<div class="box-body">
							<form action="{{route('student.data.search')}}" method="get">
								<div class="row">
									<div class="col-md-4">
									<div class="form-group">
											<h5> Year</h5>
											<div class="controls">
												<select name="year_id" id="year_id" required class="form-control">
													<option disabled selected>--select year--</option>
													@foreach($years as $year)
													<option value="{{$year->id}}" {{ (@$year_id == $year->id) ? 'selected' : ''}}>{{$year->name}}</option>
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
													@foreach($classes as $class)
													<option value="{{$class->id}}" {{ (@$class_id == $class->id) ? 'selected' : ''}}>{{$class->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div> <!-- /.end col-4 -->
									<div class="col-md-4" style="padding-top: 25px;">
										<input type="submit" name="search" id="" class="btn btn-rounded btn-dark mb-5" value="Search">
									</div> <!-- /.end col-4 -->
								</div> <!-- /.End row -->
							</form>
						</div>
					</div>
				</div>

				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title ">Student Registration View</h3>
							<a href="{{route('student.registration.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Student</a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								@if(!@$search)
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="5%">SL</th>
											<th>Image</th>
											<th>Name</th>
											<th>Id No</th>
											<th>Roll</th>
											<th>Year</th>
											<th>Class</th>
											@if(Auth::user()->role == 'Admin')
											<th>Code</th>
											@endif
											<th width="25%">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($students as $student)
										<tr>
											<th>{{$loop->iteration}}</th>
											<th><img class="rounded" id="showImage" src="{{ (!empty($student->student->image)) ? asset($student->student->image) : asset('storage/no_image.jpg') }}" style="width: 60px; height:60px; "></th>
											<th>{{$student->student->name}}</th>
											<th>{{$student->student->id_no}}</th>
											<th>{{$student->role}}</th>
											<th>{{$student->year->name}}</th>
											<th>{{$student->class->name}}</th>
											@if(Auth::user()->role == 'Admin')
											<th>{{$student->student->code}}</th>
											@endif
											<th>
												<!-- student edit -->
												<a href="{{route('student.registration.edit',['id'=>$student->student->id])}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
												<!-- student promotion -->
												<a href="{{route('student.registration.promotion',['id'=>$student->student->id])}}" class="btn btn-primary btn-sm" title="Promotion"><i class="fa fa-check"></i></a>
												<!-- student details -->
												<a target="_blank" href="{{route('student.details',['id'=>$student->student->id])}}" class="btn btn-danger btn-sm" title="Detail"><i class="fa fa-eye"></i></a>
											</th>
										</tr>
										@endforeach
									</tbody>
								</table>
								@else
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="5%">SL</th>
											<th>Image</th>
											<th>Name</th>
											<th>Id No</th>
											<th>Roll</th>
											<th>Year</th>
											<th>Class</th>
											@if(Auth::user()->role == 'Admin')
											<th>Code</th>
											@endif
											<th width="25%">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($students as $student)
										<tr>
											<th>{{$loop->iteration}}</th>
											<th><img class="rounded" id="showImage" src="{{ (!empty($student->student->image)) ? asset($student->student->image) : asset('storage/no_image.jpg') }}" style="width: 60px; height:60px; "></th>
											<th>{{$student->student->name}}</th>
											<th>{{$student->student->id_no}}</th>
											<th>{{$student->role}}</th>
											<th>{{$student->year->name}}</th>
											<th>{{$student->class->name}}</th>
											@if(Auth::user()->role == 'Admin')
											<th>{{$student->student->code}}</th>
											@endif
											<th>
												<!-- student edit -->
												<a href="{{route('student.registration.edit',['id'=>$student->student->id])}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
												<!-- student promotion -->
												<a href="{{route('student.registration.promotion',['id'=>$student->student->id])}}" class="btn btn-primary btn-sm" title="Promotion"><i class="fa fa-check"></i></a>
												<!-- student details -->
												<a target="_blank" href="{{route('student.details',['id'=>$student->student->id])}}" class="btn btn-danger btn-sm" title="Detail"><i class="fa fa-eye"></i></a>
											</th>
										</tr>
										@endforeach
									</tbody>
								</table>
								@endif
							</div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->

	</div>
</div>
@endsection