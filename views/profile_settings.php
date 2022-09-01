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
                                                        <hr>
                                                        <div class="card-body">
                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                <div class="row">
                                                                    <div class="form-group col-md-8">
                                                                        <label for="">Full Names</label>
                                                                        <input type="hidden" required name="user_access_level" value="<?php echo $user['user_access_level']; ?>" class="form-control">
                                                                        <input type="hidden" required name="user_id" value="<?php echo $user['user_id']; ?>" class="form-control">
                                                                        <input type="text" required value="<?php echo $user['user_full_names']; ?>" name="user_full_names" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Number</label>
                                                                        <input type="text" required readonly value="<?php echo $user['user_number']; ?>" name="user_number" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">National ID Number</label>
                                                                        <input type="number" name="user_idno" value="<?php echo $user['user_idno']; ?>" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Phone Number</label>
                                                                        <input type="number" required name="user_phone_number" value="<?php echo $user['user_phone_number']; ?>" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="">Address</label>
                                                                        <textarea type="text" name="user_address" rows="2" class="form-control" id="exampleInputEmail1"><?php echo $user['user_address']; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="Update_User" class="btn btn-primary">Update Profile</button>
                                                                </div>
                                                                <br>
                                                            </form>
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