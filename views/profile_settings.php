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

        <?php require_once('../app/partials/navigation.php');
        $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
        $user_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '{$user_id}'");
        if (mysqli_num_rows($user_sql) > 0) {
            while ($user = mysqli_fetch_array($user_sql)) {
        ?>
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
                                                <span class="font-weight-bold"><?php echo $user['user_full_names']; ?> Profile Settings</span>
                                            </p>
                                        </div>
                                    </header><!-- /.page-title-bar -->
                                    <!-- .page-section -->
                                    <div class="page-section">
                                        <!-- .section-block -->
                                        <div class="section-block">
                                            <!-- metric row -->
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="card">
                                                        <div class="card-head">
                                                            <h6 class="text-center">
                                                                <br>
                                                                Personal Information
                                                            </h6>
                                                        </div>
                                                        <div class="card-body">

                                                        </div><!-- /.card-body -->
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card">
                                                        <div class="card-head">
                                                            <h6 class="text-center">
                                                                <br>
                                                                Authentication Information
                                                            </h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <!-- .table -->

                                                        </div><!-- /.card-body -->
                                                    </div>
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
        <?php }
        } ?>
    </div><!-- /.app -->
    <!-- BEGIN BASE JS -->
    <?php require_once('../app/partials/scripts.php'); ?>
</body>

</html>