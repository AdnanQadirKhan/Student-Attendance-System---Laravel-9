<body>
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <span>Admin Portal</span>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="nav-item ">
                    <a href="{{ route('admin_dashboard') }}" class="collapsed">
                        <i class="fa-solid fa-table-columns me-2"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item nav-item-has-children">
                    <a href="" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_77" aria-controls="ddmenu_77" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-calendar me-2"></i>
                        <span class="text">Reports</span>
                    </a>
                    <ul id="ddmenu_77" class="collapse dropdown-nav">
                        <li>
                          <a href="{{ route('student-report') }}">
                            <span class="text">
                              Student Report
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('system-report')}}">
                            <span class="text">
                              System Report
                            </span>
                          </a>
                        </li>
                      </ul>
                </li>
                <span class="divider"><hr /></span>
                <li class="nav-item ">
                    <a href="{{ route('admin_students')}}" class="collapsed">
                        <i class="fa-solid fa-user me-2"></i>
                        <span class="text">Students</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('attendances')}}" class="collapsed">
                        <i class="fa-solid fa-clipboard-user me-2"></i>
                        
                        <span class="text">Attendances</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('leaves')}}" class="collapsed">
                        <i class="fa-solid fa-note-sticky me-2"></i>
                        <span class="text">Leaves</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('grades')}}" class="collapsed">
                        <i class="fa-solid fa-user-graduate me-2"></i>
                        <span class="text">Grades</span>
                    </a>
                </li>
            </ul>
        </nav>

    </aside>
    <!-- ======== sidebar-nav end =========== -->
