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
                Reset Password
            </h1>
            <p class="text-left mb-4">
                Having trouble loggin in?, worry not. Provide your login username to reset your password
            </p>
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputUser">Username</label>
                <input type="text" id="inputUser" required name="user_login_username" class="form-control form-control-lg" required="" autofocus="">
            </div>
            <div class="form-group mb-4 text-right">
                <button class="btn btn-lg btn-primary btn-sm" name="Reset_Password_Step_1" type="submit">
                    Reset Password
                </button>
            </div>
            <p class="py-2">
                <a href="../" class="link">Remember Password?</a>
            </p>
        </form>

    </main><!-- /.auth -->
    <?php require_once('../app/partials/scripts.php'); ?>
</body>

</html>