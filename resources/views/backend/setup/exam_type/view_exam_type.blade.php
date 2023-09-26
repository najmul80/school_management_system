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
							<h3 class="box-title ">Exam Type List</h3>
							<a href="{{route('exam.type.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Exam Type</a>
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
										@foreach($examTypes as $exam)
										<tr>
											<th>{{$loop->iteration}}</th>
											<th>{{$exam->name}}</th>
											<th>
												<a href="{{route('exam.type.edit',['id'=> $exam->id])}}" class="btn btn-info">Edit</a>
                                                <!-- delete method -->
												<a href="javascript:;" data-form-id="exam_type-{{$exam->id}}" class="btn btn-danger sa-delete">Delete</a>
												<form id="exam_type-{{$exam->id}}" action="{{route('exam.type.delete', $exam->id)}}" method="post">
													@csrf
												</form>
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