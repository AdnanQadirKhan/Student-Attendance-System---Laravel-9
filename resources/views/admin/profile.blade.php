@extends('admin.layouts.main')

@section('content')
    <!-- ========== section start ========== -->
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="titlemb-30">
                            <h2>Profile</h2>
                        </div>
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="row">
                <div class="col-xxl-9 col-lg-12">
                    <div class="profile-wrapper mb-30">
                        <div class="profile-cover">
                            <img src="{{ asset('uploads/profile/' . $user->photo) }}" alt="cover-image" />
                        </div>
                        <div class="d-md-flex">
                            <form id="profileForm" enctype="multipart/form-data">
                                @csrf
                                <div class="profile-photo">
                                    <div class="image">
                                        <img src="{{ asset('uploads/profile/' . $user->photo) }}" alt="Profile" />
                                        <div class="update-image">
                                            <input type="file" name="image" placeholder="Choose image" id="image">

                                            <label for=""><i class="lni lni-camera"></i></label>
                                        </div>
                                    </div>
                                    <div class="profile-meta pt-25">
                                        <button class="btn btn-primary" type="button" id="profilebtn">Upload</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                    <!-- end card -->

                </div>

            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- ========== section end ========== -->
@endsection()
