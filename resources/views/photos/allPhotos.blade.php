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
                        <h4 class="mb-sm-0">All Photos</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Photos</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Zoom Gallery</h4>
                            <p class="card-title-desc">Zoom effect works only with images.</p>

                            {{-- <div class="zoom-gallery">
                                @foreach ($data as $rows)
                                    <a class="float-start mx-2 mt-2 mb-2" href="{{ $rows->image_path }}" title="Image"><img src="{{ $rows->image_path }}" loading="lazy"  alt="Image" width="275" height="300"></a>
                                @endforeach
                            </div> --}}
                            <div class="popup-gallery">
                                @foreach ($data as $rows)
                                    <a class="float-start  mx-2 mt-2 mb-2" href="{{ $rows->image_path }}" title="Image">
                                        <div class="img-fluid">
                                            <img src="{{ $rows->image_path }}" alt="Image" width="275" height="300">
                                        </div>
                                    </a>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>


            <!-- end page title -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection