<body>
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <span>Student Portal</span>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="nav-item ">
                    <a href="{{ route('user_dashboard') }}" class="collapsed">
                        <i class="fa-solid fa-table-columns me-2"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('/attendance') }}" class="collapsed">
                        <i class="fa-solid fa-clipboard-user me-2"></i>

                        <span class="text">Attendances</span>
                    </a>
                </li>




            </ul>
        </nav>

    </aside>
    <!-- ======== sidebar-nav end =========== -->
