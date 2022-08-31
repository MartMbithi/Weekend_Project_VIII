<?php
/* Login  */
if (isset($_POST['Login'])) {
    $user_login_username = mysqli_real_escape_string($mysqli, $_POST['user_login_username']);
    $user_login_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['user_login_password'])));

    /* Persist */
    $stmt = $mysqli->prepare("SELECT user_id, user_number, user_login_username, user_login_password, user_access_level FROM users WHERE user_login_username=? AND user_login_password=?");
    $stmt->bind_param('ss', $user_login_username, $user_login_password);
    $stmt->execute();
    $stmt->bind_result($user_id, $user_number, $user_login_username, $user_login_password, $user_access_level);
    $rs = $stmt->fetch();

    /* Session Variables */
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_access_level'] = $user_access_level;
    $_SESSION['user_number'] = $user_number;

    if (
        $rs && ($user_access_level == "Chief Lab Technician") ||
        $rs && ($user_access_level == "Lab Technician")
    ) {
        header("location:dashboard");
    } elseif ($rs && $user_access_level == "Receptionist") {
        header("location:reception_home");
    } else {
        $err = "Incorrect login username or password";
    }
}

/* Reset Password Step 1  */
if (isset($_POST['Reset_Password_Step_1'])) {
    $user_login_username = mysqli_real_escape_string($mysqli, $_POST['user_login_username']);

    /* Does this username exist */
    $sql = "SELECT * FROM  users WHERE user_login_username= '{$user_login_username}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        /* Redirect User To Confirm Password */
        $_SESSION['success'] = 'Proceed To Confirm Password';
        $_SESSION['user_login_username'] = $user_login_username;
        header('Location: confirm_password');
        exit;
    } else {
        $err = "Email Address  Does Not Exist";
    }
}

/* Reset Password Step 2 */
if (isset($_POST['Reset_Password_Step_2'])) {
    $user_login_username = mysqli_real_escape_string($mysqli, $_SESSION['user_login_username']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Do Passwords Match */
    if ($new_password != $confirm_password) {
        $err = "Passwords does not match";
    } else {
        /* Persist */
        $sql = "UPDATE users SET user_login_password = '{$confirm_password}' WHERE user_login_username = '{$user_login_username}'";

        if (mysqli_query($mysqli, $sql)) {
            /* Redirect User To Login With Success Alert */
        } else {
            $err = "Failed, try again";
        }
    }
}
