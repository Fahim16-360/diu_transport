<nav class="navbar navbar-expand navbar-white bg-gray-400 topbar mb-4 static-top shadow">

    <!-- Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="{{__('Search for...')}}"
                   aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn bg-gray-200" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle"
               id="searchDropdown"
               href="#"
               role="button"
               data-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                 aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="{{__('Search for...')}}"
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Right Nav -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle"
               id="alertsDropdown"
               href="#"
               role="button"
               data-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">2+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">June 01, 2022</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">May 21, 2022</div>
                        Alert: We've noticed unusually high CPU load.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">{{__('Show All Alerts')}}</a>
            </div>
        </li>
        <li class="topbar-divider d-none d-sm-block"></li>

        <!-- My Profile -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span>{{__('My Profile')}}</span></a>
        </li>
        <li class="topbar-divider d-none d-sm-block"></li>

        <!-- Logout -->
        <li class="nav-item">
            <a class="nav-link"
               href="#"
               role="button"
               data-toggle="modal"
               data-target="#logoutModal">
                <span>{{__('Logout')}}</span>
            </a>
        </li>
    </ul>

</nav>
