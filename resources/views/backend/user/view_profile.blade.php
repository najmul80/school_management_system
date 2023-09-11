@extends('admin.master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-black">
                                    <h3 class="widget-user-username">User Name: {{$user->name}}</h3>
                                    <a href="{{route('profile.edit')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Edit Profile</a>
                                    <h6 class="widget-user-desc">User Type: {{$user->usertype}}</h6>
                                    <h6 class="widget-user-desc">User Email: {{$user->email}}</h6>
                                </div>
                                <div class="widget-user-image">
                                    @if(!empty($user->image))
                                    <img class="rounded-circle" src="{{asset($user->image)}}" alt="User Avatar">
                                    @else
                                    <img class="rounded-circle" src="{{asset('storage/no_image.jpg')}}" alt="No Image">
                                    @endif
                                </div>
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">Mobile No</h5>
                                                <span class="description-text">{{$user->mobile}}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 br-1 bl-1">
                                            <div class="description-block">
                                                <h5 class="description-header">Address</h5>
                                                <span class="description-text">{{$user->address}}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">Gender</h5>
                                                <span class="description-text">{{$user->gender}}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
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