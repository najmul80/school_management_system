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
							<h4 class="box-title">Student <strong>Monthly Fee</strong></h4>
						</div>

						<div class="box-body">
							<div class="row">
								<div class="col-md-3">
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
								<div class="col-md-3">
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
								</div> <!-- /.end col-3 -->
                                <div class="col-md-3">
									<div class="form-group">
										<h5> Month </h5>
										<div class="controls">
											<select name="month" id="month" required class="form-control">
												<option disabled selected>--select month--</option>
												<option value="January">1-January</option>
												<option value="February">2-February</option>
												<option value="March">3-March</option>
												<option value="April">4-April</option>
												<option value="May">5-May</option>
												<option value="June">6-June</option>
												<option value="July">7-July</option>
												<option value="August">8-August</option>
												<option value="September">9-September</option>
												<option value="October">10-October</option>
												<option value="November">11-November</option>
												<option value="December">12-December</option>
											</select>
										</div>
									</div>
								</div> <!-- /.end col-3 -->
								<div class="col-md-3" style="padding-top: 25px;">
									<a id="search" class="btn btn-rounded btn-primary mb-5">Search</a>
								</div> <!-- /.end col-4 -->
							</div> <!-- /.End row -->
							<!--////////////////////////////////////// monthly fee table ///////////////////////////-->
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
		var month = $('#month').val();
		$.ajax({
			url: "{{ route('monthly.fee.classwise.data')}}",
			type: "get",
			data: {
				'year_id': year_id,
				'class_id': class_id,
				'month': month,
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