@extends('user.layouts.main')


@section('content')
<div class="container-fluid">
  <!-- ========== title-wrapper start ========== -->
  <div class="title-wrapper pt-30">
      <div class="row align-items-center">
          <div class="col-md-6">
              <div class="title mb-30">
                  <h2> <i class="fa-solid fa-user me-2"></i> Student Attendance Section</h2>
              </div>
          </div>
          <!-- end col -->
         
      </div>
      <!-- end row -->
  </div>
  <div class="card">

      <div class="card-body">


          <table class="table table-striped">
              <thead>
                  <tr>
                      <th class="text-center" scope="col">Date</th>
                      <th class="text-center" scope="col">Attendance</th>
                  </tr>
              </thead>
              <tbody class="report">
                  @foreach ($attendance as $at)
                      <tr>
                          <td class="text-center">{{ date('d-m-Y', strtotime($at->created_at)) }}</td>
                          <td class="text-center">{{ $at->status }}</td>

                      </tr>
                  @endforeach

              </tbody>
          </table>
      </div>
  </div>


</div>
@endsection
