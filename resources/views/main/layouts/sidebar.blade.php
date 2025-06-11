    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
            <img
                src="assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
            />
            </a>
            <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
            </button>
            </div>
            <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
            <!-- Start Dashboard-->
                <li class="nav-item active">
                    <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                            <a href="">
                                <span class="sub-item">Admin Dashboard</span>
                            </a>
                            </li>
                            <li>
                                <a href="">
                                <span class="sub-item">Leads Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                <span class="sub-item">Employee Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            <!-- End Dashboard-->

            <!-- Start Attendance-->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Attendance</h4>
                </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#employee_management">
                            <i class="fas fa-layer-group"></i>
                                <p>Employee Management</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="employee_management">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{url('employees')}}">
                                        <span class="sub-item">Employees</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('departments')}}">
                                        <span class="sub-item">Department</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('designation')}}">
                                        <span class="sub-item">Designation</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('roles')}}">
                                        <span class="sub-item">Roles</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('documents')}}">
                                        <span class="sub-item">Upload Documents</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('terminate-process')}}">
                                        <span class="sub-item">Terminate Process</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#employee_attendance">
                            <i class="fas fa-layer-group"></i>
                                <p>Employee Attendance</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="employee_attendance">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{url('manual-punch')}}">
                                        <span class="sub-item">Manual Punch</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('machine-punch')}}">
                                        <span class="sub-item">Machine Punch</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('online-punch')}}">
                                        <span class="sub-item">Online Punch</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#leaves">
                            <i class="fas fa-layer-group"></i>
                            <p>Leaves</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="leaves">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{url('leave-policy')}}">
                                        <span class="sub-item">Leave Policy</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('employee-leaves')}}">
                                        <span class="sub-item">Employee Leaves</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#holidays">
                            <i class="fas fa-layer-group"></i>
                            <p>Holidays</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="holidays">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{url('holidays')}}">
                                        <span class="sub-item">Holiday List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('employee-holiday')}}">
                                        <span class="sub-item">Employee Holiday</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
            <!-- End Attendance-->

            <!-- Start Assets-->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Assets</h4>
                </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#project">
                            <i class="fas fa-layer-group"></i>
                                <p>Projects</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="project">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{url('projects')}}">
                                        <span class="sub-item">Project</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('assign-project')}}">
                                        <span class="sub-item">Assign Project</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('track-project')}}">
                                        <span class="sub-item">Track Project</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#assets">
                            <i class="fas fa-layer-group"></i>
                                <p>Assets</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="assets">
                            <ul class="nav nav-collapse">
                                <li>
                                <a href="{{url('asset')}}">
                                    <span class="sub-item">Asset</span>
                                </a>
                                </li>
                                <li>
                                    <a href="{{url('assign-asset')}}">
                                    <span class="sub-item">Assign Asset</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('track-asset')}}">
                                    <span class="sub-item">Track Asset</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
            <!-- End Assets-->

            <!-- Start Reports-->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Reports</h4>
                </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#reports">
                            <i class="fas fa-layer-group"></i>
                                <p>Reports</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="reports">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{url('attendance-reports')}}">
                                        <span class="sub-item">Attendance Reports</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('payroll-reports')}}">
                                        <span class="sub-item">Payroll Reports</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('leave-reports')}}">
                                        <span class="sub-item">Leave Reports</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('export-reports')}}">
                                        <span class="sub-item">Export Reports</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#uploads">
                            <i class="fas fa-layer-group"></i>
                                <p>Bulk Uploads</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="uploads">
                            <ul class="nav nav-collapse">
                                <li>
                                <a href="{{url('employee-uploads')}}">
                                    <span class="sub-item">Employee Uploads</span>
                                </a>
                                </li>
                                <li>
                                    <a href="{{url('leave-uploads')}}">
                                    <span class="sub-item">Leave Uploads</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('holiday-upload')}}">
                                    <span class="sub-item">Holiday Upload</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
            <!-- End Reports-->



            <!-- Start Payrolls-->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Payroll</h4>
                </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#payroll">
                            <i class="fas fa-layer-group"></i>
                                <p>Payroll</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="payroll">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Salary Structure</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Salary Assign</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Generate Payroll</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Generate Payslip</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Payroll History</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
            <!-- End Payrolls-->


            <!-- Start Settings-->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Setting</h4>
                </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#authentication">
                            <i class="fas fa-layer-group"></i>
                                <p>Authentication</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="authentication">
                            <ul class="nav nav-collapse">
                                <li>
                                <a href="{{url('users')}}">
                                    <span class="sub-item">User</span>
                                </a>
                                </li>
                                <li>
                                <a href="{{url('forgot-password')}}">
                                    <span class="sub-item">Forgot Password</span>
                                </a>
                                </li>
                                <li>
                                <a href="{{url('profile')}}">
                                    <span class="sub-item">My Profile</span>
                                </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#official">
                            <i class="fas fa-layer-group"></i>
                                <p>Official</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="official">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{url('shift')}}">
                                        <span class="sub-item">Shift</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('company')}}">
                                        <span class="sub-item">Company Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('branch')}}">
                                        <span class="sub-item">Branch</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#assign_employees">
                            <i class="fas fa-layer-group"></i>
                                <p>Assign Employee</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="assign_employees">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{url('assign-role')}}">
                                        <span class="sub-item">Role Assign</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('menus')}}">
                                        <span class="sub-item">Menu Assign</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('privileges')}}">
                                        <span class="sub-item">Privilege</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('assign-team')}}">
                                        <span class="sub-item">Team Assign</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('assign-holiday')}}">
                                        <span class="sub-item">Holiday Assign</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
            <!-- End Settings-->
            </ul>
        </div>
        </div>
    </div>
