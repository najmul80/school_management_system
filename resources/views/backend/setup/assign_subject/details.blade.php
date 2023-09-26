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
                            <h3 class="box-title ">Assign Subject Details</h3>
                            <a href="{{route('assign.subject.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Assign Subject</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <h4><strong>Assign Subject :</strong>&nbsp; {{$data['0']['student_class']->name}}</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Subject Name</th>
                                            <th width="25%">Full Mark</th>
                                            <th width="25%">Pass Mark</th>
                                            <th width="25%">Subjective Mark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $details)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <th>{{ $details->school_subject->name }}</th>
                                            <th>{{ $details->full_mark }}</th>
                                            <th>{{ $details->pass_mark }}</th>
                                            <th>{{ $details->subjective_mark }}</th>

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