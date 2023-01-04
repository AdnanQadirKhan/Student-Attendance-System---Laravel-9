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
                                <th scope="col">Student Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($attendance->created_at)) }}</td>
                                    <td>{{ $attendance->status }}</td>
                                    <td>
                                        <button type="button" value="{{ $attendance->id }}"
                                            class="btn btn-success btn-sm editBtn" data-bs-toggle="modal" data-bs-target="#attendanceEditModal"
                                            >Edit</button>
                                        <button type="button" value="{{ $attendance->id }}"
                                            class="btn btn-danger btn-sm rejectBtn">Delete</button>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <!-- end container -->

        <!-- Add Attendance Modal Start -->
        <!-- Add Modal -->
        <div class="modal fade" id="attendanceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Attendance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="attendanceForm" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <label for="floatingTextarea">Student</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="">Student</span>
                                <select name="student" class="form-select" aria-label="Default select example">
                                    <option selected>Select the student</option>
                                    @foreach ($students as $student)
                                    <option value={{ $student->user_id}} >{{$student->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="floatingTextarea">Status</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="">Status</span>
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option selected>Choose status</option>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Leave">Leave</option>
                                </select>
                            </div>
                            <label for="floatingTextarea">Date</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="">Date</span>
                                <input name="date" type="date" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="markAttendance" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal fade" id="attendanceEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Attendance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editAttendanceForm" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <label for="floatingTextarea">Student</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="">Student</span>
                                <select name="student" id="studentSelected" class="form-select" aria-label="Default select example">
                                    {{-- <option id="studentSelected" selected>Select the student</option> --}}
                                    {{-- @foreach ($students as $student)
                                    <option value={{ $student->user_id}} >{{$student->name}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <label for="floatingTextarea">Status</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="">Status</span>
                                <select name="status" id="statusSelected" class="form-select" aria-label="Default select example">
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Leave">Leave</option>
                                </select>
                            </div>
                            <label for="floatingTextarea">Date</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Date</span>
                                <input id="date" name="date" value="" type="date" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="editAttendance" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== section end ========== -->
@endsection()
