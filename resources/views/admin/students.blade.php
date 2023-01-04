@extends('admin.layouts.main')

@section('content')
    <!-- ========== section start ========== -->
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30 ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="title mb-30">

                            <h2> <i class="fa-solid fa-user me-2"></i> Students Attendance Section</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6 ">
                        <button class="btn btn-primary rounded-circle float-end" data-bs-toggle="modal"
                            data-bs-target="#attendanceModal"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Student Email</th>
                                <th scope="col">Joining Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->user_id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ date('d-m-Y', strtotime($student->created_at)) }}</td>
                                  

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <!-- end container -->

       
    </section>
    <!-- ========== section end ========== -->
@endsection()
