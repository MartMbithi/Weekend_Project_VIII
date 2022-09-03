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
                                        <span class="font-weight-bold">Hi, <?php echo $_SESSION['user_full_names']; ?>.</span>
                                        <span class="d-block text-muted">Register New Patient Together With Laboratory Tests They Have Requested.</span>
                                    </p>
                                    <div class="ml-auto">
                                        <!-- .dropdown -->
                                        <div class="dropdown">
                                            <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-secondary"><span>Register Patient</button>
                                        </div><!-- /.dropdown -->
                                    </div>
                                </div>
                            </header><!-- /.page-title-bar -->
                            <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog  modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header align-items-center">
                                            <div class="modal-title">
                                                <h6 class="mb-0">Register New Patient</h6>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" enctype="multipart/form-data" role="form">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="">Full Names</label>
                                                        <input type="hidden" required name="user_access_level" value="Patient" class="form-control">
                                                        <input type="text" required name="user_full_names" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">Number</label>
                                                        <input type="text" required readonly value="PT-<?php echo $a . $b; ?>" name="user_number" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">National ID Number</label>
                                                        <input type="number" name="user_idno" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Phone Number</label>
                                                        <input type="number" required name="user_phone_number" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="">Address</label>
                                                        <textarea type="text" name="user_address" rows="2" class="form-control" id="exampleInputEmail1"></textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group col-md-12">
                                                        <label for="">Laboratory Test Name</label>
                                                        <select type="text" required name="patient_test_test_id" class="form-control">
                                                            <?php
                                                            $tests_sql = mysqli_query($mysqli, "SELECT * FROM tests");
                                                            if (mysqli_num_rows($tests_sql) > 0) {
                                                                while ($tests = mysqli_fetch_array($tests_sql)) { ?>
                                                                    <option value="<?php echo $tests['test_id']; ?>"><?php echo $tests['test_ref'] . ' ' . $tests['test_name']; ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="">Test Details</label>
                                                        <textarea type="text" name="patient_test_description" rows="5" class="form-control" id="exampleInputEmail1"></textarea>
                                                    </div>

                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" name="Add_Patient_By_Receptionist" class="btn btn-primary">Register Patient</button>
                                                </div>
                                                <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                <table id="dt-responsive" class="table dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th> Number </th>
                                                            <th> Names </th>
                                                            <th> ID Number </th>
                                                            <th> Phone Number </th>
                                                            <th> Address </th>
                                                            <th> Manage </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $patients_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_access_level = 'Patient'");
                                                        if (mysqli_num_rows($patients_sql) > 0) {
                                                            while ($patients = mysqli_fetch_array($patients_sql)) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $patients['user_number']; ?></td>
                                                                    <td><?php echo $patients['user_full_names']; ?></td>
                                                                    <td><?php echo $patients['user_idno']; ?></td>
                                                                    <td><?php echo $patients['user_phone_number']; ?></td>
                                                                    <td><?php echo $patients['user_address']; ?></td>
                                                                    <td class="align-middle text-center">
                                                                        <a title="Edit" data-toggle="modal" href="#update_<?php echo $patients['user_id']; ?>" class="btn btn-sm btn-icon btn-secondary">
                                                                            <i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <!-- Update Modal -->
                                                                <div class="modal fade fixed-right" id="update_<?php echo $patients['user_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog  modal-xl" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header align-items-center">
                                                                                <div class="modal-title">
                                                                                    <h6 class="mb-0">Update <?php echo $patients['user_full_names']; ?> Details</h6>
                                                                                </div>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post" enctype="multipart/form-data" role="form">
                                                                                    <div class="row">
                                                                                        <div class="form-group col-md-8">
                                                                                            <label for="">Full Names</label>
                                                                                            <input type="hidden" required name="user_id" value="<?php echo $patients['user_id']; ?>" class="form-control">
                                                                                            <input type="text" required value="<?php echo $patients['user_full_names']; ?>" name="user_full_names" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label for="">Number</label>
                                                                                            <input type="text" required readonly value="<?php echo $patients['user_number']; ?>" name="user_number" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-6">
                                                                                            <label for="">National ID Number</label>
                                                                                            <input type="number" name="user_idno" value="<?php echo $patients['user_idno']; ?>" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-6">
                                                                                            <label for="">Phone Number</label>
                                                                                            <input type="number" required name="user_phone_number" value="<?php echo $patients['user_phone_number']; ?>" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <label for="">Address</label>
                                                                                            <textarea type="text" name="user_address" rows="2" class="form-control" id="exampleInputEmail1"><?php echo $patients['user_address']; ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="text-right">
                                                                                        <button type="submit" name="Update_Patient" class="btn btn-primary">Update Patient</button>
                                                                                    </div>
                                                                                    <br>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

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