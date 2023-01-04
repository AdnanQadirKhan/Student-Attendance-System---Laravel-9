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
                           

                            <h2> <i class="fa-solid fa-user me-2"></i> Students Leave Section</h2>
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
                                <th scope="col">Student Name</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Requested On</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $leave)
                                <tr>
                                    <td>{{ $leave->name }}</td>
                                    <td>{{ $leave->reason }}</td>
                                    <td>{{ date('d-m-Y', strtotime($leave->created_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($leave->from_dte)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($leave->to_dte)) }}</td>
                                    <td>
                                        <button type="button" value="{{ $leave->id }}"
                                            class="btn btn-success btn-sm acceptBtn">Accept</button>
                                        <button type="button" value="{{ $leave->id }}"
                                            class="btn btn-danger btn-sm rejectLeaveBtn">Reject</button>
                                    </td>
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
