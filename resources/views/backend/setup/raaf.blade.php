@extends('admin.master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Assign Subject</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('assign.subject.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Class Name</h5>
                                            <div class="controls">
                                                @if($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                                @endif
                                                <select name="class_id" class="form-control">
                                                    <option value="" disabled selected>--select class--</option>
                                                    @foreach($data['std_class'] as $classes)
                                                    <option value="{{$classes->id}}">{{$classes->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Subject Name</h5>
                                            <div class="controls">
                                                @if($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                                @endif
                                                <select name="subject_id" class="form-control">
                                                    <option value="" disabled selected>--select class--</option>
                                                    @foreach($data['school_subject'] as $subject)
                                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Full Marks </h5>
                                            <div class="controls">
                                                @if($errors->has('full_mark'))
                                                <div class="text-danger">{{ $errors->first('full_mark') }}</div>
                                                @endif
                                                <input type="text" name="full_mark[]" class="form-control" placeholder="Enter full marks" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Pass Marks </h5>
                                            <div class="controls">
                                                @if($errors->has('pass_mark'))
                                                <div class="text-danger">{{ $errors->first('pass_mark') }}</div>
                                                @endif
                                                <input type="text" name="pass_mark[]" class="form-control" placeholder="Enter pass marks" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Subjective Marks </h5>
                                            <div class="controls">
                                                @if($errors->has('subjective_mark'))
                                                <div class="text-danger">{{ $errors->first('subjective_mark') }}</div>
                                                @endif
                                                <input type="text" name="subjective_mark[]" class="form-control" placeholder="Enter subjective marks" required>
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