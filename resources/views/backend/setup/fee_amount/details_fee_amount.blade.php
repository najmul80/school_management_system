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
                            <h3 class="box-title ">Fee Amount Details</h3>
                            <a href="{{route('fee.amount.view')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Back to previous table</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <h4><strong>Fee Category :</strong>&nbsp; {{$data[0]['fee_category']['name']}}</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Class Name</th>
                                            <th width="25%">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $details)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <th>{{ $details->student_class->name }}</th>
                                            <th>{{ $details->amount }}</th>

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