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
							<h3 class="box-title ">Student Year List</h3>
							<a href="{{route('student.year.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Student Year</a>
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
										@foreach($stdYears as $year)
										<tr>
											<th>{{$loop->iteration}}</th>
											<th>{{$year->name}}</th>
											<th>
												<a href="{{route('student.year.edit',['id'=> $year->id])}}" class="btn btn-info">Edit</a>
                                                <!-- delete method -->
												<a href="javascript:;" data-form-id="stYear-{{$year->id}}" class="btn btn-danger sa-delete">Delete</a>
												<form id="stYear-{{$year->id}}" action="{{route('student.year.delete', $year->id)}}" method="post">
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