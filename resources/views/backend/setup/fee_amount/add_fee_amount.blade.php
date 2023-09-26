@extends('admin.master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Fee Amount </h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('fee.amount.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="add_item">
                                            <div class="form-group">
                                                <h5> Fee Category </h5>
                                                <div class="controls">
                                                    @if($errors->has('name'))
                                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                                    @endif
                                                    <select name="fee_category_id" class="form-control">
                                                        <option value="" disabled selected>--select fee category--</option>
                                                        @foreach($data['fee_category'] as $feeCat)
                                                        <option value="{{$feeCat->id}}">{{$feeCat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <h5> Student Class</h5>
                                                        <div class="controls">
                                                            @if($errors->has('name'))
                                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                                            @endif
                                                            <select name="class_id[]" class="form-control">
                                                                <option value="" disabled selected>--select student class--</option>
                                                                @foreach($data['std_class'] as $class)
                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <h5> Amount </h5>
                                                        <div class="controls">
                                                            @if($errors->has('name'))
                                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                                            @endif
                                                            <input type="number" name="amount[]" class="form-control" placeholder="Enter fee amount name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="padding-top: 25px;">
                                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                                </div>
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

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">
                <div class="col-md-5">
                    <div class="form-group">
                        <h5> Student Class</h5>
                        <div class="controls">
                            @if($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                            <select name="class_id[]" class="form-control">
                                <option value="" disabled selected>--select student class--</option>
                                @foreach($data['std_class'] as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <h5> Amount </h5>
                        <div class="controls">
                            @if($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                            <input type="number" name="amount[]" class="form-control" placeholder="Enter fee amount name" required>
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