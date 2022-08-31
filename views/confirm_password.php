<?php
session_start();
require_once('../app/partials/head.php');
?>

<body>

    <main class="auth auth-floated">
        <div id="announcement" class="auth-announcement" style="background-image: url(../assets/images/avatars/background.jpg);">
        </div>
        <form class="auth-form" method="POST">
            <div class="mb-4">
                <div class="mb-3">
                    <h1 class="h3">
                        Medical Laboratory <br> Records Management System
                    </h1>
                </div>
            </div>
            <p class="text-left mb-4">
                <hr>
            </p>
            <h1 class="h3">
                Confirm Password
            </h1>
            <p class="text-left mb-4">
                Hooray!, you are one step away from setting up your new password. Kindly type your new password and confirm it.
            </p>
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputPassword">New Password</label>
                <input type="password" id="inputPassword" required name="confirm_password" class="form-control form-control-lg" required="">
            </div>
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputPassword">Confirm Password</label>
                <input type="password" id="inputPassword" required name="new_password" class="form-control form-control-lg" required="">
            </div>
            <div class="form-group mb-4 text-right">
                <button class="btn btn-lg btn-primary btn-sm" name="Reset_Password_Step_2" type="submit">
                    Confirm Password
                </button>
            </div>
        </form>

    </main><!-- /.auth -->
    <?php require_once('../app/partials/scripts.php'); ?>
</body>

</html>