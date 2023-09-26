@extends('admin.master')
@section('admin')
<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title ">Assign Subject List</h3>
							<a href="{{route('assign.subject.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Assign Subject</a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="5%">SL</th>
											<th>Class Name</th>
											<th width="25%">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($assignSubjects as $assign)
										<tr>
											<th>{{$loop->iteration}}</th>
											<th>{{$assign->student_class->name}}</th>
											<th>
												<a href="{{route('assign.subject.edit',[$assign->class_id])}}" class="btn btn-info">Edit</a>
                                                <a href="{{route('assign.subject.details',[$assign->class_id])}}" class="btn btn-primary">Details</a>
											</th>
										</tr>
										@endforeach
									</tbody>
								</table>
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