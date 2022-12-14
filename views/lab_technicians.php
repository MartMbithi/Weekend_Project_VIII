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
                                        <span class="font-weight-bold">Lab Technicians</span>
                                    </p>
                                    <div class="ml-auto">
                                        <!-- .dropdown -->
                                        <div class="dropdown">
                                            <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-secondary"><span>Register Lab Technician</button>
                                        </div><!-- /.dropdown -->
                                    </div>
                                </div>
                            </header><!-- /.page-title-bar -->
                            <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog  modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header align-items-center">
                                            <div class="modal-title">
                                                <h6 class="mb-0">Register New Lab Technician</h6>
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
                                                        <input type="hidden" required name="user_access_level" value="Lab Technician" class="form-control">
                                                        <input type="text" required name="user_full_names" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">Number</label>
                                                        <input type="text" required readonly value="<?php echo $a . $b; ?>" name="user_number" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">National ID Number</label>
                                                        <input type="number" name="user_idno" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Phone Number</label>
                                                        <input type="number" required name="user_phone_number" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">Login Username</label>
                                                        <input type="text" name="user_login_username" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">Login Password</label>
                                                        <input type="password" required name="new_password" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">Confirm Password</label>
                                                        <input type="password" required name="confirm_password" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="">Address</label>
                                                        <textarea type="text" name="user_address" rows="2" class="form-control" id="exampleInputEmail1"></textarea>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" name="Add_User" class="btn btn-primary">Register Lab Technician</button>
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
                                                        $technician_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_access_level = 'Lab Technician'");
                                                        if (mysqli_num_rows($technician_sql) > 0) {
                                                            while ($technicians = mysqli_fetch_array($technician_sql)) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $technicians['user_number']; ?></td>
                                                                    <td><?php echo $technicians['user_full_names']; ?></td>
                                                                    <td><?php echo $technicians['user_idno']; ?></td>
                                                                    <td><?php echo $technicians['user_phone_number']; ?></td>
                                                                    <td><?php echo $technicians['user_address']; ?></td>
                                                                    <td class="align-middle text-center">
                                                                        <a data-toggle="modal" href="#update_<?php echo $technicians['user_id']; ?>" class="btn btn-sm btn-icon btn-secondary">
                                                                            <i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span>
                                                                        </a>
                                                                        <a data-toggle="modal" href="#delete_<?php echo $technicians['user_id']; ?>" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i>
                                                                            <span class="sr-only">Remove</span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <!-- Update Modal -->
                                                                <div class="modal fade fixed-right" id="update_<?php echo $technicians['user_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog  modal-xl" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header align-items-center">
                                                                                <div class="modal-title">
                                                                                    <h6 class="mb-0">Update <?php echo $technicians['user_full_names']; ?> Details</h6>
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
                                                                                            <input type="hidden" required name="user_id" value="<?php echo $technicians['user_id']; ?>" class="form-control">
                                                                                            <input type="text" required value="<?php echo $technicians['user_full_names']; ?>" name="user_full_names" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label for="">Number</label>
                                                                                            <input type="text" required readonly value="<?php echo $technicians['user_number']; ?>" name="user_number" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label for="">National ID Number</label>
                                                                                            <input type="number" name="user_idno" value="<?php echo $technicians['user_idno']; ?>" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label for="">Phone Number</label>
                                                                                            <input type="number" required name="user_phone_number" value="<?php echo $technicians['user_phone_number']; ?>" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label for="">Access Level</label>
                                                                                            <select required name="user_access_level" class="form-control">
                                                                                                <option><?php echo $technicians['user_access_level']; ?></option>
                                                                                                <option>Chief Lab Technician</option>
                                                                                                <option>Receptionist</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <label for="">Address</label>
                                                                                            <textarea type="text" name="user_address" rows="2" class="form-control" id="exampleInputEmail1"><?php echo $technicians['user_address']; ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="text-right">
                                                                                        <button type="submit" name="Update_User" class="btn btn-primary">Update Lab Technician</button>
                                                                                    </div>
                                                                                    <br>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Delete Modal-->
                                                                <div class="modal fade" id="delete_<?php echo $technicians['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                                                                                <button type="button" class="close" data-dismiss="modal">
                                                                                    <span>&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <form method="POST">
                                                                                <div class="modal-body text-center text-danger">
                                                                                    <h4>Delete <?php echo $technicians['user_full_names']; ?> Record? </h4>
                                                                                    <br>
                                                                                    <!-- Hide This -->
                                                                                    <input type="hidden" name="user_id" value="<?php echo $technicians['user_id']; ?>">
                                                                                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                                    <input type="submit" name="Delete_User" value="Delete" class="text-center btn btn-danger"><br>
                                                                                </div>
                                                                            </form>
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