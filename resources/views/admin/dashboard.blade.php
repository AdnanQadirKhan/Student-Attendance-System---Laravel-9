@extends('admin.layouts.main')

@section('content')
    <!-- ========== section start ========== -->
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Admin Portal</h2>
                        </div>
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon purple">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <a href="">
                            <button class="btn btn-primary">
                                Students <span class="badge badge-pill badge-light p-2 ">
                                    {{ $students }}
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="fa-solid fa-clipboard-user"></i>
                        </div>
                        <button type="button" id="markAttendance" class="btn btn-success">Attendances {{ $attendances }}
                        </button>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="fa-solid fa-house"></i>
                        </div>
                        <button type="button" class="btn btn-warning"> Absents  {{ $absents }}</button>
                    </div>
                </div>


                
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="fa-solid fa-house-user"></i>
                        </div>
                        <button type="button" class="btn btn-secondary"> Leaves  {{ $leaves }}</button>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>
        <!-- end container -->
    </section>
    <!-- ========== section end ========== -->
@endsection()
