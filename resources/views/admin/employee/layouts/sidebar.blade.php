<div class="wrapper nav-options-slava">
    <nav style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);" class="main-header navbar navbar-expand navbar-white navbar-light upper-navbar-a-b">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><img src="{{ asset('assets/images/noun-menu-3523555 1.svg') }}" alt=""></a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto " onclick="toggleDisplay()">
            <div class="menu-wrap" >
                <ul class="navbar-nav ml-auto ">
                    <div class="menu-wrap">
                        <ul class="menu">
                            <li class="menu-item">
                                <div style="display: flex;align-items: end;" class="inner-profaile-div">
                                    <div class="inner-sub-col-img">
                                        <a href="#">
                                            <a href="#"><img class="user-profile-img-nav"  src="{{ asset('assets/images/user.png') }}" alt=""></a>
                                        </a>
                                    </div>
                                    <div class="inner-sub-col-details">
                                        <h6 class="user-name-nav text-center" style="margin-bottom: 0px;">{{ auth()->guard('employee')->name }}</h6>
                                        <p class="user-desg-nav text-center mb-0">employee</p>
                                        <img style="width: 10px;position: absolute;  top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);right: 10px;" src="./images/arrow-down.png" alt="">
                                    </div>
                                </div>
                                <ul class="drop-menu" id="myElement">
                                    <li class="drop-menu-item">
                                        <a  href=""><i class="fa-solid fa-user"></i> My Profile</a>
                                        <hr>
                                    </li>
                                    <li class="drop-menu-item">
                                        <a data-toggle="modal" data-target="#loginModal"  href="#"><i class="fa-solid fa-user-lock"></i> Change Password</a>
                                        <hr>
                                    </li>
                                    <li class="drop-menu-item">
                                        <a href="{{ route('emp.logout') }}"><i class="fa-regular fa-circle-right"></i> Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </ul>
    </nav>
</div>
    <div style="z-index: 1200;"  class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: #ffff;width: 85%;border-radius: 20px;;margin: auto;" class="modal-content login-modal p-4">
                <div class="modal-body modal-loginform pt-0">
                    <h3 class="dunes-secondary-color text-center login-haeding pb-3">Change password</h3>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input style="border-radius: 10px;" type="text" class="form-control" placeholder="Enter new password" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Password</label>
                            <input style="border-radius: 10px;" type="number" class="form-control" placeholder="Confirm Password" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="btns-modals-modal-profile-edit">
                            <button type="button" class="btn slava-secendory-bg" data-dismiss="modal">Close</button>
                            <button type="button" class="btn slava-secendory-bg" data-dismiss="modal">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.navbar -->
<aside class="main-sidebar slava-secendory-bg elevation-4 bg-primar-ab">
    <!-- Brand Logo -->
    <div class="logo-section">
        <a href="#" class="logo-main" style="border: none !important;">
            {{-- <img src="{{ asset('assets/images/steering-wheel.png') }}" alt="a-b-sidebar-logo" class="brand-image sidebar-logo-main" style="opacity: .8"> --}}
            <img style="width: 150px;margin:auto;display:table;padding-top:10px;." src="{{ asset('assets/images/edittttttt.png') }}" alt="sidebar-text-logo" class="sidebar-text-logo">
        </a>
    </div>
    <!-- Sidebar -->
    <div class="sidebar" style="background-image: url({{ asset('assets/images/steering-wheel.png') }});
    background-position: inherit;
    background-repeat: no-repeat;
    background-size: 500px;
    overflow-y: auto;">
        <!-- Sidebar Menu -->
        @php
            use Illuminate\Support\Str;
        @endphp
        <nav class="mt-2 sidebar-menu">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard Side Menus -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('emp.index') }}" class="nav-link {{ 'employee/dashboard' == request()->path() ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/Vector.svg') }}" alt="">
                        <p>Dash Board</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{
                        in_array(request()->path(), ['employee/students-active', 'employee/students-add', 'employee/students-blocked']) ||
                        Str::startsWith(request()->path(), 'employee/students-edit/') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/Group.png') }}" alt="">
                        <p>Students</p>
                        <i class="right fas fa-angle-left"></i> <!-- Icon for the dropdown -->
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ route('active.student') }}" class="nav-link {{ request()->routeIs('active.student') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blocked.student') }}" class="nav-link {{ request()->routeIs('blocked.student') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blocked</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{
                        in_array(request()->path(), ['', '', '']) ||
                        Str::startsWith(request()->path(), '') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/Group.png') }}" alt="">
                        <p>Services</p>
                        <i class="right fas fa-angle-left"></i> <!-- Icon for the dropdown -->
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ route('active.student') }}" class="nav-link {{ request()->routeIs('active.student') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vehicle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blocked.student') }}" class="nav-link {{ request()->routeIs('blocked.student') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Liscense</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
    </div>
</aside>



