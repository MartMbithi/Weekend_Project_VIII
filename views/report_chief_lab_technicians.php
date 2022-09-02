<?php
session_start();
require_once('../app/settings/config.php');
require_once('../app/settings/checklogin.php');
check_login();
require_once('../app/helpers/users.php');
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
                                        <span class="font-weight-bold">Chief Lab Technician</span>
                                    </p>
                                    <div class="ml-auto">
                                    </div>
                                </div>
                            </header><!-- /.page-title-bar -->
                            <hr>
                            <!-- .page-section -->
                            <div class="page-section">
                                <!-- .section-block -->
                                <div class="section-block">
                                    <!-- metric row -->
                                    <div class="metric-row">
                                        <div class="card col-12">
                                            <div class="card-body">
                                                <!-- .table -->
                                                <table class="report_table dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th> Number </th>
                                                            <th> Names </th>
                                                            <th> ID Number </th>
                                                            <th> Phone Number </th>
                                                            <th> Address </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $technician_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_access_level = 'Chief Lab Technician'");
                                                        if (mysqli_num_rows($technician_sql) > 0) {
                                                            while ($technicians = mysqli_fetch_array($technician_sql)) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $technicians['user_number']; ?></td>
                                                                    <td><?php echo $technicians['user_full_names']; ?></td>
                                                                    <td><?php echo $technicians['user_idno']; ?></td>
                                                                    <td><?php echo $technicians['user_phone_number']; ?></td>
                                                                    <td><?php echo $technicians['user_address']; ?></td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table><!-- /.table -->
                                            </div><!-- /.card-body -->
                                        </div>
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