@extends('layout.layout')
@section('title','Single Photo Upload | DarkroomProd')

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
                        <h4 class="mb-sm-0">Single Photo Upload</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Single Photo Upload</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                
                <div class="col-md-12">
                    <form action="{{ route('admin.photos.singleUploadPost') }}" 
                            method="post" 
                            class="dropzone" 
                            id="my-great-dropzone" 
                            createImageThumbnails="true",
                            acceptedFiles="image/*",
                            addRemoveLinks="true">
                            @csrf

                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted ri-upload-cloud-2-line"></i>
                            </div>
                            
                            <h4>Drop files here or click to upload.</h4>
                        </div>
                    </form>
                </div>
                
            </div>


            <!-- end page title -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection