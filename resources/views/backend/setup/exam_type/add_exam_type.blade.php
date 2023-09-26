@extends('admin.master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Exam Type</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form  method="post" action="{{route('exam.type.store')}}">
                                @csrf
                                <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <h5> Exam Name </h5>
                                            <div class="controls">
                                                @if($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                                @endif
                                                <input type="text" name="name" class="form-control" placeholder="Enter student exam name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" value="submit" class="btn btn-rounded btn-info">
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
</div>
@endsection