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
							<h3 class="box-title ">User List</h3>
							<a href="{{route('user.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add User</a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>SL</th>
											<th>Roll</th>
											<th>Name</th>
											<th>Email</th>
											<th>Code</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($users as $user)
										<tr>
											<th>{{$loop->iteration}}</th>
											<th>{{$user->role}}</th>
											<th>{{$user->name}}</th>
											<th>{{$user->email}}</th>
											<th>{{$user->code}}</th>
											<th>
												<a href="{{route('user.edit',['id'=> $user->id])}}" class="btn btn-info">Edit</a>
												<a href="javascript:;" data-form-id="user-delete-{{$user->id}}" class="btn btn-danger sa-delete">Delete</a>

												<form id="user-delete-{{$user->id}}" action="{{route('user.delete', $user->id)}}" method="post">
													@csrf
												</form>
											</th>
										</tr>
										@endforeach
									</tbody>
									<tfoot>
										<tr>
											<th>SL</th>
											<th>Roll</th>
											<th>Name</th>
											<th>Email</th>
											<th>Code</th>
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