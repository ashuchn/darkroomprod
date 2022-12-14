@extends('layout.layout')
@section('title','Profile | DarkroomProd')

@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">


        

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Profle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 col-xl-4">

                    <!-- Simple card -->
                    <div class="card">
                        @if($data->profile_pic == NULL || $data->profile_pic == '')
                        <img class="card-img-top img-thumbnail"
                            src="{{ url('assets/dashboard-nazox/assets/images/small/img-1.jpg') }}"
                            alt="Profile Picture">
                        @else
                        <img class="card-img-top img-thumbnail"
                            src="{{ $data->profile_pic }}"
                            alt="Profile Picture">
                        @endif
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <form action="{{ route('admin.changePfp') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group">
                                            <input type="file" class="mt-2 form-control" name="pfp" id="customFile" required>
                                        </div>
                                        <input type="submit" class=" mt-2 form-control btn btn-primary" id="" value="Change Profile Picture">
                                    </form>


                                </div>
                            </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="example-text-input" autocomplete="off" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="{{ $data->name }}"
                                        id="example-text-input" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="email" value="{{ $data->email }}"
                                        id="example-text-input" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Last Login at</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="{{ $data->last_login_at }}"
                                        id="example-text-input" disabled>
                                </div>
                            </div>

                            <!-- <a href="#" class="btn btn-primary waves-effect waves-light">Button</a> -->
                        </div>
                    </div>

                </div><!-- end col -->
                <div class="col-md-6 col-xl-4">

                    <!-- Simple card -->
                    <div class="card">

                        <div class="card-title mt-2 mx-1">
                            
                            <h4>Change Password</h4>

                        </div>

                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible">
                                    session()->get('error');
                                </div>
                            @endif
                            <form action="{{ route('admin.changePassword') }}" method="post" autocomplete="off">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-5 col-form-label">Current Password</label>
                                    <div class="col-sm-7">
                                        <input class="form-control @error('current_password') is-invalid @enderror" name="current_password" required type="password" placeholder="********" id="example-text-input">
                                        @error('current_password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-5 col-form-label">New Password</label>
                                    <div class="col-sm-7">
                                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="********" id="example-text-input" required>
                                        @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-5 col-form-label">Re-enter new Password</label>
                                    <div class="col-sm-7">
                                        <input class="form-control @error('password_confirmation') is-invalid @enderror"  name="password_confirmation" type="password" placeholder="********" id="example-text-input" required>
                                        @error('password_confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                        <input type="submit" value="Change" class=" col-sm-12 btn btn-primary">
                                </div>
                            </form>

                            <!-- <a href="#" class="btn btn-primary waves-effect waves-light">Button</a> -->
                        </div>
                    </div>

                </div><!-- end col -->
            </div>


            <!-- end page title -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @endsection('content')