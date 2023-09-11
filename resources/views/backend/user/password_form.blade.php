@extends('admin.master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title text-center">Change Password</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('password.update',['id' => $user->id])}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Current Password</h5>
                                            <div class="controls">
                                                @if($errors->has('current_password'))
                                                <div class="text-danger">{{ $errors->first('current_password') }}</div>
                                                @endif
                                                <input type="password" name="current_password" class="form-control" placeholder="Enter current password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>New Password</h5>
                                            <div class="controls">
                                                @if($errors->has('password'))
                                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                                @endif
                                                <input type="password" name="password" class="form-control" placeholder="Enter new password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5> Confirm Password </h5>
                                            <div class="controls">
                                                @if($errors->has('password_confirmation'))
                                                <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                                @endif
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Enter confirm password" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" value="Update" class="btn btn-rounded btn-info">
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