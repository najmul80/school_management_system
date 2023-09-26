@extends('admin.master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Student</h4>
                    <a href="{{route('student.registration.view')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Back to previous</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('student.registration.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row"> <!-- /.1st row -->
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Student Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('name'))
                                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                                        @endif
                                                        <input type="text" name="name" class="form-control" placeholder="Enter student Name" required>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Father's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('fname'))
                                                        <div class="text-danger">{{ $errors->first('fname') }}</div>
                                                        @endif
                                                        <input type="text" name="fname" class="form-control" placeholder="Enter Father's Name" required>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Mother's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('mname'))
                                                        <div class="text-danger">{{ $errors->first('mname') }}</div>
                                                        @endif
                                                        <input type="text" name="mname" class="form-control" placeholder="Enter Mother's Name" required>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->
                                        </div> <!-- /.end row -->

                                    </div>
                                </div> <!-- /. end 1st row -->

                                <div class="row"> <!-- /.2nd row -->
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Mobile No <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('mobile'))
                                                        <div class="text-danger">{{ $errors->first('mobile') }}</div>
                                                        @endif
                                                        <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile No" required>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('address'))
                                                        <div class="text-danger">{{ $errors->first('address') }}</div>
                                                        @endif
                                                        <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('gender'))
                                                        <div class="text-danger">{{ $errors->first('gender') }}</div>
                                                        @endif
                                                        <select name="gender" required id="" class="form-control">
                                                            <option value="" disabled selected>--select gender--</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->
                                        </div> <!-- /.end row -->
                                    </div>
                                </div> <!-- /. end 2nd row -->

                                <div class="row"> <!-- /.3rd row -->
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Religion <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('religion'))
                                                        <div class="text-danger">{{ $errors->first('religion') }}</div>
                                                        @endif
                                                        <select name="religion" required id="" class="form-control">
                                                            <option value="" disabled selected>--select religion--</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Christian">Christian</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Date of Birth <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('dob'))
                                                        <div class="text-danger">{{ $errors->first('dob') }}</div>
                                                        @endif
                                                        <input type="date" name="dob" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Discount </h5>
                                                    <div class="controls">
                                                        @if($errors->has('discount'))
                                                        <div class="text-danger">{{ $errors->first('discount') }}</div>
                                                        @endif
                                                        <input type="text" name="discount" class="form-control" placeholder="Enter Discount">
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->
                                        </div> <!-- /.end row -->
                                    </div>
                                </div> <!-- /. end 3rd row -->

                                <div class="row"> <!-- /.4th row -->
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Year <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('year_id'))
                                                        <div class="text-danger">{{ $errors->first('year_id') }}</div>
                                                        @endif
                                                        <select name="year_id" required id="" class="form-control">
                                                            <option value="" disabled selected>--select year--</option>
                                                            @foreach($student['years'] as $year)
                                                            <option value="{{$year->id}}">{{$year->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Class <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('class_id'))
                                                        <div class="text-danger">{{ $errors->first('class_id') }}</div>
                                                        @endif
                                                        <select name="class_id" required id="" class="form-control">
                                                            <option value="" disabled selected>--select class--</option>
                                                            @foreach($student['classes'] as $class)
                                                            <option value="{{$class->id}}">{{$class->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Group <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('group_id'))
                                                        <div class="text-danger">{{ $errors->first('group_id') }}</div>
                                                        @endif
                                                        <select name="group_id" required id="" class="form-control">
                                                            <option value="" disabled selected>--select group--</option>
                                                            @foreach($student['groups'] as $group)
                                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->
                                        </div> <!-- /.end row -->
                                    </div>
                                </div> <!-- /. end 4th row -->


                                <div class="row"> <!-- /.4th row -->
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Shift <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @if($errors->has('shift_id'))
                                                        <div class="text-danger">{{ $errors->first('shift_id') }}</div>
                                                        @endif
                                                        <select name="shift_id" required id="" class="form-control">
                                                            <option value="" disabled selected>--select year--</option>
                                                            @foreach($student['shifts'] as $shift)
                                                            <option value="{{$shift->id}}">{{$shift->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>User Profile </h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" id="image" class="form-control">
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img class="rounded" id="showImage" src="{{ (!empty($user->image)) ? asset($user->image) : asset('storage/no_image.jpg') }}" style="width: 100px; height:100px; border:1px; color:red;">
                                                    </div>
                                                </div>
                                            </div> <!-- /.end col-4 -->
                                        </div> <!-- /.end row -->
                                    </div>
                                </div> <!-- /. end 4th row -->
 
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