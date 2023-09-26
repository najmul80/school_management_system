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
							<h3 class="box-title ">Student Class List</h3>
							<a href="{{route('student.class.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Student Class</a>
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
										@foreach($stdClasses as $studentClass)
										<tr>
											<th>{{$loop->iteration}}</th>
											<th>{{$studentClass->name}}</th>
											<th>
												<a href="{{route('student.class.edit',['id'=> $studentClass->id])}}" class="btn btn-info">Edit</a>
                                                <!-- delete method -->
												<a href="javascript:;" data-form-id="stclass-{{$studentClass->id}}" class="btn btn-danger sa-delete">Delete</a>
												<form id="stclass-{{$studentClass->id}}" action="{{route('student.class.delete', $studentClass->id)}}" method="post">
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