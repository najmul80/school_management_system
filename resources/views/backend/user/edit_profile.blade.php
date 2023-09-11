@extends('admin.master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title text-center">Manage Profile</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('profile.store',['id' => $user->id])}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Name</h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Email </h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Mobile <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="number" name="mobile" class="form-control" value="{{$user->mobile}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Address </h5>
                                            <div class="controls">
                                                <input type="text" name="address" class="form-control" value="{{$user->address}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Gender </h5>
                                            <div class="controls">
                                                <select name="usertype" id="select" required class="form-control">
                                                    <option value="">select gender</option>
                                                    <option value="Male" {{$user->usertype == 'Male' ? 'selected' : ''}}>Male</option>
                                                    <option value="Female" {{$user->usertype == 'Female' ? 'selected' : ''}}>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Profile </h5>
                                            <div class="controls">
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Profile </h5>
                                            <div class="controls">
                                                <img class="rounded-circle" id="showImage" src="{{ (!empty($user->image)) ? asset($user->image) : asset('storage/no_image.jpg') }}" style="width: 100px; height:100px; border:1px; color:red;">
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
