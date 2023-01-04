@extends('user.layouts.main')

@section('content')
    <!-- ========== section start ========== -->
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Student Portal</h2>
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
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <a href="{{ url('attendance') }}">
                            <button class="btn btn-primary">
                                View Attendance
                            </button>
                        </a>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="fa-solid fa-marker"></i>
                        </div>
                        <button type="button" id="markAttendance" class="btn btn-success">Mark Attendance
                        </button>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="fa-solid fa-marker"></i>
                        </div>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="btn btn-warning">Mark Leave</button>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Student Leave</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="leaveForm" enctype="multipart/form-data">
                            <div class="modal-body">
                                  @csrf
                                    <label for="floatingTextarea">Reason</label>
                                    <div class="input-group mb-3">
                                        <textarea name="reason" class="form-control" placeholder="Due to severe headache..." id="floatingTextarea"></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="">FROM</span>
                                        <input name="fromDte" type="date" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="">TO</span>
                                        <input name="toDte" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" id="leaveBtn" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
        <!-- end container -->
    </section>
    <!-- ========== section end ========== -->
@endsection()
