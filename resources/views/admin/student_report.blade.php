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
                            <h2> <i class="fa-solid fa-user me-2"></i> Student Report Section</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6 ">
                        <label href="#" class="btn btn-outline-success pull-right p-2">
                            Presents
                            <span id="presents"class="badge badge-pill badge-light p-2 "></span>
                            </label>
                            <label href="#" class="btn btn-outline-danger pull-right p2">
                            Absents
                            <span id="absents" class="badge badge-pill badge-light p-2 "></span>
                            </label>
                            <label href="#" class="btn btn-outline-secondary pull-right p2">
                            Leaves
                            <span id="leaves" class="badge badge-pill badge-light p-2 "></span>
                            </label>
                             <label id="percentage" href="#" class="btn btn-outline-secondary pull-right p2">
                             %
                            </label>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="card">

                <div class="card-body">

                    <form id="studentReportForm" class="d-flex mb-5">
                        @csrf
                        <span class="input-group-text">From</span>
                        <input type="date" name="from" id="from" class="form-control-sm col-2 me-3">
                        <span class="input-group-text">To</span>
                        <input type="date" name="to" id="to" class="form-control-sm col-2 me-4">
                        <span class="input-group-text">Student ID</span>
                        <input type="text" name="stud_id" id="stud_id" required class="form-control-sm col-3 me-5">
                        <button type="button" id="studentReportBtn" class="btn btn-primary">Generate</button>
                    </form>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Student Name</th>
                                <th class="text-center" scope="col">Date</th>
                                <th class="text-center" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody class="report">
                            @foreach ($students as $student)
                                <tr>
                                    <td class="text-center">{{ $student->name }}</td>
                                    <td class="text-center">{{ date('d-m-Y', strtotime($student->date)) }}</td>
                                    <td class="text-center">{{ $student->status }}</td>

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
