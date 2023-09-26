@extends('admin.master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Assign Subject</h4>
                    <a href="{{route('assign.subject.view')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Back to Previous</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('assign.subject.update',$data['assignEdit']['0']->class_id)}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="add_item">
                                            <div class="form-group">
                                                <h5>Class Name</h5>
                                                <div class="controls">
                                                    @if($errors->has('name'))
                                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                                    @endif
                                                    <select name="class_id" class="form-control">
                                                        <option value="" disabled selected>--select class--</option>
                                                        @foreach($data['classes'] as $class)
                                                        <option value="{{$class->id}}" {{ ($data['assignEdit']['0']->class_id == $class->id) ? "selected" : '' }}>{{$class->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @foreach($data['assignEdit'] as $edit)
                                            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5>Student Subject</h5>
                                                            <div class="controls">
                                                                <select name="subject_id[]" class="form-control">
                                                                    <option value="" disabled selected>--select subject--</option>
                                                                    @foreach($data['subjects'] as $subject)
                                                                    <option value="{{$subject->id}}" {{ ($edit->subject_id == $subject->id) ? "selected" : '' }}>{{$subject->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Full Mark</h5>
                                                            <div class="controls">
                                                                <input type="text" name="full_mark[]" class="form-control" value="{{$edit->full_mark}}" placeholder="Full Mark" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Pass Mark</h5>
                                                            <div class="controls">
                                                                <input type="text" name="pass_mark[]" class="form-control" value="{{$edit->pass_mark}}" placeholder="Pass Mark" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Subjective Mark</h5>
                                                            <div class="controls">
                                                                <input type="text" name="subjective_mark[]" value="{{$edit->subjective_mark}}" class="form-control" placeholder="Subjective Mark" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="padding-top: 25px;">
                                                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
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

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Student Subject</h5>
                        <div class="controls">
                            <select name="subject_id[]" class="form-control">
                                <option value="" disabled selected>--select class--</option>
                                @foreach($data['subjects'] as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Full Mark</h5>
                        <div class="controls">
                            <input type="text" name="full_mark[]" class="form-control" placeholder="Full Mark" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Pass Mark</h5>
                        <div class="controls">
                            <input type="text" name="pass_mark[]" class="form-control" placeholder="Pass Mark" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Subjective Mark</h5>
                        <div class="controls">
                            <input type="text" name="subjective_mark[]" class="form-control" placeholder="Subjective Mark" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-2" style="padding-top: 25px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    $(document).ready(function() {
        var counter = 0;
        $(document).on('click', '.addeventmore', function() {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on('click', ".removeeventmore", function(event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
        })
    })
</script>
@endsection