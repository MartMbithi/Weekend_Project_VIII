<?php
session_start();
require_once('../app/settings/config.php');
require_once('../app/settings/checklogin.php');
check_login();
require_once('../app/helpers/laboratory.php');
require_once('../app/settings/codeGen.php');
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
                                        <span class="font-weight-bold">Patients Laboratory Tests Results</span>
                                    </p>
                                </div>
                            </header><!-- /.page-title-bar -->
                            <hr>
                            <!-- .page-section -->
                            <div class="page-section">
                                <!-- .section-block -->
                                <div class="section-block">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <form class="form-inline">
                                            <input id="Search_Querry" onkeyup="FilterFunction()" type="text" class="form-control mb-2 mr-sm-2" placeholder="Search">
                                        </form>
                                    </div>
                                    <br>
                                    <!-- metric row -->
                                    <div class="metric-row">
                                        <?php
                                        $tests_sql = mysqli_query(
                                            $mysqli,
                                            "SELECT *  FROM results r 
                                            INNER JOIN patient_tests pt ON r.results_test_id = pt.patient_test_id
                                            INNER JOIN tests t ON t.test_id = pt.patient_test_test_id
                                            INNER JOIN users u ON u.user_id = pt.patient_test_patient_id"
                                        );
                                        if (mysqli_num_rows($tests_sql) > 0) {
                                            while ($tests = mysqli_fetch_array($tests_sql)) {
                                        ?>
                                                <div class="col-12">
                                                    <div class="card Search_Result">
                                                        <div class="card-body">
                                                            <div class="d-flex bd-highlight mb-3">
                                                                <div class="mr-auto p-2 bd-highlight">
                                                                    <p class="lead">
                                                                        <span class=""><b>Test : </b> <?php echo $tests['test_ref'] . ' ' . $tests['test_name']; ?></span><br>
                                                                        <span class=""><b>Patient Number: </b> <?php echo $tests['user_number']; ?></span><br>
                                                                        <span class=""><b>Patient Full Names: </b> <?php echo $tests['user_full_names']; ?></span><br>
                                                                        <span class=""><b>Patient Contacts: </b> <?php echo $tests['user_phone_number']; ?> </span><br>
                                                                        <span class=""><b>Date Test Done: </b> <?php echo $tests['patient_test_date_created']; ?> </span><br>
                                                                    </p>
                                                                </div>
                                                                <?php
                                                                /* Get Chief Lab Techician Details */
                                                                $approver_sql = mysqli_query(
                                                                    $mysqli,
                                                                    "SELECT *  FROM users WHERE user_id = '{$tests['results_approved_by']}'"
                                                                );
                                                                if (mysqli_num_rows($approver_sql) > 0) {
                                                                    while ($chief_lab_tech = mysqli_fetch_array($approver_sql)) {
                                                                ?>

                                                                        <div class="p-2 bd-highlight">
                                                                            <p class="lead">
                                                                                <span class=""><b>Results Date Released : </b> <?php echo $tests['results_date_realeased']; ?></span><br>
                                                                                <span class=""><b>Results Approved By Number: </b> <?php echo $chief_lab_tech['user_number']; ?></span><br>
                                                                                <span class=""><b>Results Approved By Name: </b> <?php echo $chief_lab_tech['user_full_names']; ?></span><br>
                                                                            </p>
                                                                        </div>
                                                                    <?php }
                                                                } else { ?>
                                                                    <div class="p-2 bd-highlight">
                                                                        <p class="lead">
                                                                            <span class="text-danger"><b>Results Pending Approval From Chief Laboratory Technician</b></span><br>
                                                                        </p>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            <hr>
                                                            <p class="">
                                                                <span class=""><b>Test Details </b> </span> <br>
                                                                <?php echo $tests['patient_test_description']; ?>
                                                            </p>
                                                            <hr>
                                                            <p class="">
                                                                <span class=""><b>Results Details </b> </span> <br>
                                                                <?php echo $tests['results_details']; ?>
                                                            </p>
                                                            <div class="text-right">
                                                                <br>
                                                                <?php
                                                                if ($tests['results_approved_by'] != '')
                                                                /* Dont Print Any Unapproved Results */ { ?>
                                                                    <a href="print_results?view=<?php echo $tests['result_id']; ?>" class="badge badge-success">
                                                                        <i class="fa fa-print"></i> Print
                                                                    </a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                        } else { ?>
                                            <div class="text-center">
                                                <p class="lead">
                                                    <span class="font-weight-bold text-danger">No Lab Tests Results Available For The Moment</span>
                                                </p>
                                            </div>
                                        <?php } ?>
                                    </div><!-- /metric row -->
                                </div><!-- /.section-block -->
                            </div><!-- /.page-section -->
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