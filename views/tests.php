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
                                        <span class="font-weight-bold">Lab Tests Categories</span>
                                    </p>
                                    <div class="ml-auto">
                                        <!-- .dropdown -->
                                        <div class="dropdown">
                                            <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-secondary"><span>Register Category</button>
                                        </div><!-- /.dropdown -->
                                    </div>
                                </div>
                            </header><!-- /.page-title-bar -->
                            <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog  modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header align-items-center">
                                            <div class="modal-title">
                                                <h6 class="mb-0">Register Lab Test Categories</h6>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" enctype="multipart/form-data" role="form">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="">Category Name</label>
                                                        <input type="text" required name="test_name" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">Category REF Number</label>
                                                        <input type="text" required readonly value="REF-<?php echo $b . $a; ?>" name="test_ref" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="">Address</label>
                                                        <textarea type="text" name="test_details" rows="5" class="form-control" id="exampleInputEmail1"></textarea>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" name="Add_Lab_Test_Category" class="btn btn-primary">Add</button>
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
                                                            <th> REF </th>
                                                            <th> Name </th>
                                                            <th> Description </th>
                                                            <th> Manage </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $tests_sql = mysqli_query($mysqli, "SELECT * FROM tests");
                                                        if (mysqli_num_rows($tests_sql) > 0) {
                                                            while ($tests = mysqli_fetch_array($tests_sql)) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $tests['test_ref']; ?></td>
                                                                    <td><?php echo $tests['test_name']; ?></td>
                                                                    <td><?php echo $tests['test_details']; ?></td>
                                                                    <td class="align-middle text-center">
                                                                        <a data-toggle="modal" href="#update_<?php echo $tests['test_id']; ?>" class="btn btn-sm btn-icon btn-secondary">
                                                                            <i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span>
                                                                        </a>
                                                                        <a data-toggle="modal" href="#delete_<?php echo $tests['test_id']; ?>" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i>
                                                                            <span class="sr-only">Remove</span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <!-- Update Modal -->
                                                                <div class="modal fade fixed-right" id="update_<?php echo $tests['test_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog  modal-xl" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header align-items-center">
                                                                                <div class="modal-title">
                                                                                    <h6 class="mb-0">Update <?php echo $tests['test_name']; ?> Details</h6>
                                                                                </div>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post" enctype="multipart/form-data" role="form">
                                                                                    <div class="row">
                                                                                        <div class="form-group col-md-8">
                                                                                            <label for="">Category Name</label>
                                                                                            <input type="hidden" required value="<?php echo $tests['test_id']; ?>" name="test_id" class="form-control">
                                                                                            <input type="text" required name="test_name" value="<?php echo $tests['test_name']; ?>" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label for="">Category REF Number</label>
                                                                                            <input type="text" required readonly value="<?php echo $tests['test_ref']; ?>" name="test_ref" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <label for="">Description</label>
                                                                                            <textarea type="text" name="test_details" rows="5" class="form-control" id="exampleInputEmail1"><?php echo $tests['test_details']; ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="text-right">
                                                                                        <button type="submit" name="Update_Lab_Test_Category" class="btn btn-primary">Update</button>
                                                                                    </div>
                                                                                    <br>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Delete Modal-->
                                                                <div class="modal fade" id="delete_<?php echo $tests['test_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                    <h4>Delete <?php echo $tests['test_name']; ?> Record? </h4>
                                                                                    <br>
                                                                                    <!-- Hide This -->
                                                                                    <input type="hidden" name="test_id" value="<?php echo $tests['test_id']; ?>">
                                                                                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                                    <input type="submit" name="Delete_Test_Category" value="Delete" class="text-center btn btn-danger"><br>
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