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
							<h3 class="box-title ">Student Shift List</h3>
							<a href="{{route('student.shift.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Student Shift</a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="5%">SL</th>
											<th>Name</th>
											<th width="25%">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($stdShifts as $shift)
										<tr>
											<th>{{$loop->iteration}}</th>
											<th>{{$shift->name}}</th>
											<th>
												<a href="{{route('student.shift.edit',['id'=> $shift->id])}}" class="btn btn-info">Edit</a>
                                                <!-- delete method -->
												<a href="javascript:;" data-form-id="stdShift-{{$shift->id}}" class="btn btn-danger sa-delete">Delete</a>
												<form id="stdShift-{{$shift->id}}" action="{{route('student.shift.delete', $shift->id)}}" method="post">
													@csrf
												</form>
											</th>
										</tr>
										@endforeach
									</tbody>
									<tfoot>
										<tr>
                                            <th>SL</th>
											<th>Name</th>
											<th>Action</th>
										</tr>
									</tfoot>
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