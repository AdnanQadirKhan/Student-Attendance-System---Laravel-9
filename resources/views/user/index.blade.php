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
              <button class="btn btn-primary">View Attendance</button>
            </div>
          </div>
          <!-- End Col -->
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon primary">
                <i class="fa-solid fa-marker"></i>
              </div>
              <button class="btn btn-success">Mark Attendance</button>
            </div>
          </div>
          <!-- End Col -->
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon primary">
                <i class="fa-solid fa-marker"></i>
              </div>
              <button class="btn btn-warning">Mark Leave</button>
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

    