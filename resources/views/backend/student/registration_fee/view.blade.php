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
							<h4 class="box-title">Student <strong>Registration Fee Details</strong></h4>
						</div>

						<div class="box-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5> Year</h5>
										<div class="controls">
											<select name="year_id" id="year_id" required class="form-control">
												<option disabled selected>--select year--</option>
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
												<option disabled selected>--select class--</option>
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
							<!--////////////////////////////////////// registration fee table ///////////////////////////-->
							<div class="row ">
								<div class="col-md-12">
									<div id="DocumentResults">
										<script id="document-template" type="text/x-handlebars-template">
											<table class="table table-bordered table-striped" style="width: 100%;">
												<thead>
													<tr>
														@{{{thsource}}}
													</tr>
												</thead>
												<tbody>
													@{{#each this}}
													<tr>
														@{{{ tdsource }}}
													</tr>
													@{{/each}}
												</tbody>
											</table>
										</script>
									</div>
								</div>
							</div>
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

<script type="text/javascript">
	$(document).on('click', '#search', function() {
		var year_id = $('#year_id').val();
		var class_id = $('#class_id').val();
		$.ajax({
			url: "{{ route('reg.fee.classwise.get')}}",
			type: "get",
			data: {
				'year_id': year_id,
				'class_id': class_id
			},
			beforeSend: function() {},
			success: function(data) {
				var source = $("#document-template").html();
				var template = Handlebars.compile(source);
				var html = template(data);
				$('#DocumentResults').html(html);
				$('[data-toggle="tooltip"]').tooltip();
			}
		});
	});
</script>
@endsection