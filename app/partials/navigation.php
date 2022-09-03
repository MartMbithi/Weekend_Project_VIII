<?php
$user_access_level = mysqli_real_escape_string($mysqli, $_SESSION['user_access_level']);
if ($user_access_level == 'Chief Lab Technician') {
?>
    <header class="app-header app-header-dark">
        <!-- .navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-lg-0">
            <!-- .container -->
            <div class="container">
                <!-- .navbar-brand -->
                <a class="navbar-brand" href="dashboard">
                    MLR System
                </a>
                <button class="hamburger hamburger-squeeze d-flex d-lg-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- .navbar-collapse -->
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <!-- .navbar-nav -->
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard">Dashboard</a>
                        </li><!-- /Dashboard -->

                        <!-- Level Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarLevelMenuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mr-1">Users</span> <i class="fas fa-angle-down ml-auto"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarLevelMenuDropdown">
                                <li>
                                    <a class="dropdown-item" href="patients">Patients</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="receptionists">Receptionists</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="lab_technicians">Lab Technicians</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="chief_lab_technicians">Chief Lab Technicians</a>
                                </li>
                            </ul>
                        </li><!-- /Level Menu -->
                        <!-- Level Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarLevelMenuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mr-1">Lab Tests</span> <i class="fas fa-angle-down ml-auto"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarLevelMenuDropdown">
                                <li>
                                    <a class="dropdown-item" href="tests">Test Categories</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="patient_tests">Patient Tests</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="tests_results">Tests Results</a>
                                </li>
                            </ul>
                        </li><!-- /Level Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarLevelMenuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mr-1">Reports</span> <i class="fas fa-angle-down ml-auto"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarLevelMenuDropdown">
                                <li>
                                    <a class="dropdown-item" href="report_patients">Patients</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="report_receptionists">Receptionists</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="report_lab_technicians">Lab Technicians</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="report_chief_lab_technicians">Chief Lab Technicians</a>
                                </li>
                            </ul>
                        </li><!-- /Level Menu -->
                    </ul><!-- /.navbar-nav -->
                    <!-- .top-bar-search -->
                    <!-- .btn-account -->
                    <div class="navbar-nav dropdown d-flex mr-lg-n3">
                        <button class="btn-account w-100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md mr-lg-0">
                                <img src="../assets/images/avatars/no_profile.png" alt=""></span>
                            <span class="account-summary d-lg-none">
                                <span class="account-name">
                                    <?php echo $_SESSION['user_full_names']; ?></span>
                                <span class="account-description">
                                    <?php echo $_SESSION['user_access_level']; ?>
                                </span>
                            </span>
                        </button> <!-- .dropdown-menu -->
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-arrow mr-3"></div>
                            <h6 class="dropdown-header d-none d-lg-block d-lg-none"><?php echo $_SESSION['user_full_names']; ?> </h6>
                            <a class="dropdown-item" href="profile_settings">
                                <span class="dropdown-icon oi oi-person"></span>
                                Profile
                            </a>
                            <a class="dropdown-item" href="logout">
                                <span class="dropdown-icon oi oi-account-logout"></span>
                                Logout
                            </a>
                        </div><!-- /.dropdown-menu -->
                    </div><!-- /.btn-account -->
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->
    </header>
<?php } else if ($user_access_level == 'Lab Technician') { ?>
    <header class="app-header app-header-dark">
        <!-- .navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-lg-0">
            <!-- .container -->
            <div class="container">
                <!-- .navbar-brand -->
                <a class="navbar-brand" href="dashboard">
                    MLR System
                </a>
                <button class="hamburger hamburger-squeeze d-flex d-lg-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- .navbar-collapse -->
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <!-- .navbar-nav -->
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard">Dashboard</a>
                        </li><!-- /Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link" href="tests">Test Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="technician_patient_tests">Patient Tests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="technician_tests_results">Results</a>
                        </li>
                    </ul><!-- /.navbar-nav -->
                    <!-- .top-bar-search -->
                    <!-- .btn-account -->
                    <div class="navbar-nav dropdown d-flex mr-lg-n3">
                        <button class="btn-account w-100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md mr-lg-0">
                                <img src="../assets/images/avatars/no_profile.png" alt=""></span>
                            <span class="account-summary d-lg-none">
                                <span class="account-name">
                                    <?php echo $_SESSION['user_full_names']; ?></span>
                                <span class="account-description">
                                    <?php echo $_SESSION['user_access_level']; ?>
                                </span>
                            </span>
                        </button> <!-- .dropdown-menu -->
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-arrow mr-3"></div>
                            <h6 class="dropdown-header d-none d-lg-block d-lg-none"><?php echo $_SESSION['user_full_names']; ?> </h6>
                            <a class="dropdown-item" href="profile_settings">
                                <span class="dropdown-icon oi oi-person"></span>
                                Profile
                            </a>
                            <a class="dropdown-item" href="logout">
                                <span class="dropdown-icon oi oi-account-logout"></span>
                                Logout
                            </a>
                        </div><!-- /.dropdown-menu -->
                    </div><!-- /.btn-account -->
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->
    </header>
<?php } else if ($user_access_level == 'Receptionist') { ?>
    <header class="app-header app-header-dark">
        <!-- .navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-lg-0">
            <!-- .container -->
            <div class="container">
                <!-- .navbar-brand -->
                <a class="navbar-brand" href="reception_home">
                    MLR System
                </a>
                <button class="hamburger hamburger-squeeze d-flex d-lg-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- .navbar-collapse -->
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <!-- .navbar-nav -->
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link" href="reception_home">Dashboard</a>
                        </li><!-- /Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link" href="receptionist_tests">Test Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="receptionist_tests_results">Results</a>
                        </li>
                    </ul><!-- /.navbar-nav -->
                    <!-- .top-bar-search -->
                    <!-- .btn-account -->
                    <div class="navbar-nav dropdown d-flex mr-lg-n3">
                        <button class="btn-account w-100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md mr-lg-0">
                                <img src="../assets/images/avatars/no_profile.png" alt=""></span>
                            <span class="account-summary d-lg-none">
                                <span class="account-name">
                                    <?php echo $_SESSION['user_full_names']; ?></span>
                                <span class="account-description">
                                    <?php echo $_SESSION['user_access_level']; ?>
                                </span>
                            </span>
                        </button> <!-- .dropdown-menu -->
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-arrow mr-3"></div>
                            <h6 class="dropdown-header d-none d-lg-block d-lg-none"><?php echo $_SESSION['user_full_names']; ?> </h6>
                            <a class="dropdown-item" href="profile_settings">
                                <span class="dropdown-icon oi oi-person"></span>
                                Profile
                            </a>
                            <a class="dropdown-item" href="logout">
                                <span class="dropdown-icon oi oi-account-logout"></span>
                                Logout
                            </a>
                        </div><!-- /.dropdown-menu -->
                    </div><!-- /.btn-account -->
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->
    </header>
<?php } else { ?>
    <header class="app-header app-header-dark">
        <!-- .navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-lg-0">
            <!-- .container -->
            <div class="container">
                <!-- .navbar-brand -->
                <a class="navbar-brand" href="my_home">
                    MLR System
                </a>
                <button class="hamburger hamburger-squeeze d-flex d-lg-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- .navbar-collapse -->
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <!-- .navbar-nav -->
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link" href="my_home">Dashboard</a>
                        </li><!-- /Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link" href="my_tests">Laboratory Tests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="my_results">Results</a>
                        </li>
                    </ul><!-- /.navbar-nav -->
                    <!-- .top-bar-search -->
                    <!-- .btn-account -->
                    <div class="navbar-nav dropdown d-flex mr-lg-n3">
                        <button class="btn-account w-100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md mr-lg-0">
                                <img src="../assets/images/avatars/no_profile.png" alt=""></span>
                            <span class="account-summary d-lg-none">
                                <span class="account-name">
                                    <?php echo $_SESSION['user_full_names']; ?></span>
                                <span class="account-description">
                                    <?php echo $_SESSION['user_access_level']; ?>
                                </span>
                            </span>
                        </button> <!-- .dropdown-menu -->
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-arrow mr-3"></div>
                            <h6 class="dropdown-header d-none d-lg-block d-lg-none"><?php echo $_SESSION['user_full_names']; ?> </h6>
                            <a class="dropdown-item" href="profile_settings">
                                <span class="dropdown-icon oi oi-person"></span>
                                Profile
                            </a>
                            <a class="dropdown-item" href="logout">
                                <span class="dropdown-icon oi oi-account-logout"></span>
                                Logout
                            </a>
                        </div><!-- /.dropdown-menu -->
                    </div><!-- /.btn-account -->
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->
    </header>
<?php } ?>