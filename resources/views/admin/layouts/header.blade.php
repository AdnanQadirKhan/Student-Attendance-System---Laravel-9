<div class="overlay"></div>

<!-- ======== main-wrapper start =========== -->
<main class="main-wrapper">
    <!-- ========== header start ========== -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-7 col-md-7 col-6">
                    <div class="header-right">

                        <!-- profile start -->
                        <div class="profile-box ml-15">
                            <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="profile-info">
                                    <div class="info">
                                        <h6>{{ session('name') }}</h6>
                                        <div class="image">
                                            <img src="{{ asset('/uploads/profile/'. $user->photo)  }}" alt="Profile Pic" />
                                            <span class="status"></span>
                                        </div>
                                    </div>
                                </div>
                                <i class="lni lni-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                <li>
                                    <a href="{{ route('admin-profile')}}">
                                        <i class="lni lni-user"></i> View Profile
                                    </a>
                                </li>
                               
                                <li>
                                    <a href="{{ route('logout')}}"> <i class="lni lni-exit"></i> Sign Out </a>
                                </li>
                            </ul>
                        </div>
                        <!-- profile end -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ========== header end ========== -->