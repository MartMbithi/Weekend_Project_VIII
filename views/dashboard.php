<?php
session_start();
require_once('../app/settings/config.php');
require_once('../app/settings/checklogin.php');
check_login();
require_once('../app/helpers/analytics.php');
require_once('../app/partials/head.php');

?>

<body>
    <!-- .app -->
    <div class="app has-fullwidth">

        <?php require_once('../app/partials/navigation.php'); ?>
        <!-- /.app-header -->
        <!-- .app-main -->
        <main class="app-main">
            <!-- .wrapper -->
            <div class="wrapper">
                <!-- .page -->
                <div class="page">
                    <!-- .page-inner -->
                    <div class="page-inner">
                        <!-- .container -->
                        <div class="container">
                            <!-- .page-title-bar -->
                            <header class="page-title-bar">
                                <div class="d-flex flex-column flex-md-row">
                                    <p class="lead">
                                        <span class="font-weight-bold">Hi, <?php echo $_SESSION['user_full_names']; ?>.</span>
                                        <span class="d-block text-muted">Welcome to <?php echo $_SESSION['user_access_level']; ?> dashboard</span>
                                    </p>
                                    <div class="ml-auto">
                                        <!-- .dropdown -->
                                        <div class="dropdown">
                                            <button class="btn btn-secondary"><span>Today: </span> <?php echo date('d M Y'); ?></button>
                                        </div><!-- /.dropdown -->
                                    </div>
                                </div>
                            </header><!-- /.page-title-bar -->
                            <!-- .page-section -->
                            <?php if ($user_access_level == 'Chief Lab Technician') {
                            ?>
                                <div class="page-section">
                                    <!-- .section-block -->
                                    <div class="section-block">
                                        <!-- metric row -->
                                        <div class="metric-row">
                                            <div class="col-lg-12">
                                                <div class="metric-row metric-flush">
                                                    <!-- metric column -->
                                                    <div class="col">
                                                        <!-- .metric -->
                                                        <a href="receptionists" class="metric metric-bordered align-items-center">
                                                            <h2 class="metric-label"> Receptionists </h2>
                                                            <p class="metric-value h3">
                                                                <span class="value"><?php echo $receptionist; ?></span>
                                                            </p>
                                                        </a> <!-- /.metric -->
                                                    </div><!-- /metric column -->
                                                    <!-- metric column -->
                                                    <div class="col">
                                                        <!-- .metric -->
                                                        <a href="lab_technicians" class="metric metric-bordered align-items-center">
                                                            <h2 class="metric-label"> Lab Technicians </h2>
                                                            <p class="metric-value h3">
                                                                <span class="value"><?php echo $lab_technician; ?></span>
                                                            </p>
                                                        </a> <!-- /.metric -->
                                                    </div><!-- /metric column -->
                                                    <!-- metric column -->
                                                    <div class="col">
                                                        <!-- .metric -->
                                                        <a href="patients" class="metric metric-bordered align-items-center">
                                                            <h2 class="metric-label"> Patients </h2>
                                                            <p class="metric-value h3">
                                                                <span class="value"><?php echo $patient; ?></span>
                                                            </p>
                                                        </a> <!-- /.metric -->
                                                    </div><!-- /metric column -->
                                                </div>
                                            </div><!-- metric column -->
                                            <div class="col-lg-12">
                                                <div class="metric-row metric-flush">
                                                    <div class="col">
                                                        <!-- .metric -->
                                                        <a href="tests" class="metric metric-bordered align-items-center">
                                                            <h2 class="metric-label">Lab Test Categories</h2>
                                                            <p class="metric-value h3">
                                                                <span class="value"><?php echo $tests; ?></span>
                                                            </p>
                                                        </a> <!-- /.metric -->
                                                    </div><!-- /metric column -->
                                                    <!-- metric column -->
                                                    <div class="col">
                                                        <!-- .metric -->
                                                        <a href="tests_results" class="metric metric-bordered align-items-center">
                                                            <h2 class="metric-label"> Pending Approval Results </h2>
                                                            <p class="metric-value h3">
                                                                <span class="value"><?php echo $pending_approval; ?></span>
                                                            </p>
                                                        </a> <!-- /.metric -->
                                                    </div><!-- /metric column -->
                                                </div>
                                            </div><!-- metric column -->
                                        </div><!-- /metric row -->
                                    </div><!-- /.section-block -->
                                </div><!-- /.page-section -->
                            <?php } else if ($user_access_level == 'Lab Technician') { ?>
                                <div class="page-section">
                                    <!-- .section-block -->
                                    <div class="section-block">
                                        <!-- metric row -->
                                        <div class="metric-row">
                                            <div class="col-lg-12">
                                                <div class="metric-row metric-flush">
                                                    <div class="col">
                                                        <!-- .metric -->
                                                        <a href="tests" class="metric metric-bordered align-items-center">
                                                            <h2 class="metric-label">Lab Test Categories</h2>
                                                            <p class="metric-value h3">
                                                                <span class="value"><?php echo $tests; ?></span>
                                                            </p>
                                                        </a> <!-- /.metric -->
                                                    </div>
                                                    <div class="col">
                                                        <!-- .metric -->
                                                        <a href="technician_patient_tests" class="metric metric-bordered align-items-center">
                                                            <h2 class="metric-label">Registered Lab Tests</h2>
                                                            <p class="metric-value h3">
                                                                <span class="value"><?php echo $patient_tests; ?></span>
                                                            </p>
                                                        </a> <!-- /.metric -->
                                                    </div>
                                                    <!-- /metric column -->
                                                    <!-- metric column -->
                                                    <div class="col">
                                                        <!-- .metric -->
                                                        <a href="technician_tests_results" class="metric metric-bordered align-items-center">
                                                            <h2 class="metric-label"> Results </h2>
                                                            <p class="metric-value h3">
                                                                <span class="value"><?php echo $results; ?></span>
                                                            </p>
                                                        </a> <!-- /.metric -->
                                                    </div><!-- /metric column -->
                                                </div>
                                            </div><!-- metric column -->
                                        </div><!-- /metric row -->
                                    </div><!-- /.section-block -->
                                </div><!-- /.page-section -->
                            <?php } ?>
                        </div><!-- /.container -->
                    </div><!-- /.page-inner -->
                </div><!-- /.page -->
            </div><!-- /.wrapper -->
            <!-- .app-footer -->
            <?php require_once('../app/partials/footer.php'); ?>
        </main><!-- /.app-main -->
    </div><!-- /.app -->
    <!-- BEGIN BASE JS -->
    <?php require_once('../app/partials/scripts.php'); ?>
</body>

</html>