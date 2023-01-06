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
                   
                </div>
                <!-- end row -->
            </div>
            <div class="card">

                <div class="card-body">

                    <form id="studentGradeForm" class="d-flex mb-5">
                        @csrf
                        <span class="input-group-text">Student ID</span>
                        <input type="text" name="stud_id" id="stud_id" required class="form-control-sm col-3 me-5">
                        <button type="button" id="studentGradeBtn" class="btn btn-primary">Generate</button>
                    </form>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Student Name</th>
                                <th class="text-center" scope="col">Joining Year</th>
                                <th class="text-center" scope="col">Grade</th>
                            </tr>
                        </thead>
                        <tbody class="grade">
                          

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <!-- end container -->
    </section>
    <!-- ========== section end ========== -->
@endsection()
