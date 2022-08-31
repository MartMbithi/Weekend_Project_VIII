<?php
/* Add Patient */
if (isset($_POST['Add_Patient'])) {
    $user_full_names = mysqli_real_escape_string($mysqli, $_POST['user_full_names']);
    $user_number = mysqli_real_escape_string($mysqli, $_POST['user_number']);
    $user_idno = mysqli_real_escape_string($mysqli, $_POST['user_idno']);
    $user_phone_number = mysqli_real_escape_string($mysqli, $_POST['user_phone_number']);
    $user_address = mysqli_real_escape_string($mysqli, $_POST['user_address']);
    $user_access_level = mysqli_real_escape_string($mysqli, $_POST['user_access_level']);

    /* Prevent Double Entries */
    $sql = "SELECT * FROM  users   WHERE user_phone_number ='{$user_phone_number}' ";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if (
            $user_phone_number == $row['user_phone_number']
        ) {
            $err = 'Contacts already exists';
        }
    } else {
        /* Persist */
        $sql = "INSERT INTO users (user_full_names, user_number, user_idno, user_phone_number, user_address, user_access_level)
        VALUES('{$user_full_names}', '{$user_number}', '{$user_idno}', '{$user_phone_number}', '{$user_address}', '{$user_access_level}')";

        if (mysqli_query($mysqli, $sql)) {
            $success = "Patient registered";
        } else {
            $err  = "Failed, please try again";
        }
    }
}

/* Update Patient */
if (isset($_POST['Update_Patient'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $user_full_names = mysqli_real_escape_string($mysqli, $_POST['user_full_names']);
    $user_idno = mysqli_real_escape_string($mysqli, $_POST['user_idno']);
    $user_phone_number = mysqli_real_escape_string($mysqli, $_POST['user_phone_number']);
    $user_address = mysqli_real_escape_string($mysqli, $_POST['user_address']);

    /* Persist */
    $sql = "UPDATE users SET user_full_names = '{$user_full_names}', user_idno = '{$user_idno}', user_phone_number = '{$user_phone_number}', user_address = '{$user_address}'
    WHERE user_id = '{$user_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Patient updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Add Receptionist  / Lab Tect / Cheif Lab Tech*/
if (isset($_POST['Add_User'])) {
    $user_full_names = mysqli_real_escape_string($mysqli, $_POST['user_full_names']);
    $user_number = mysqli_real_escape_string($mysqli, $_POST['user_number']);
    $user_idno = mysqli_real_escape_string($mysqli, $_POST['user_idno']);
    $user_phone_number = mysqli_real_escape_string($mysqli, $_POST['user_phone_number']);
    $user_address = mysqli_real_escape_string($mysqli, $_POST['user_address']);
    $user_access_level = mysqli_real_escape_string($mysqli, $_POST['user_access_level']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Do Passwords Match */
    if ($confirm_password != $new_password) {
        $err = "Passwords does not match";
    } else {
        /* Prevent Double Entry */
        $sql = "SELECT * FROM  users   WHERE user_login_username ='{$user_login_username}' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if (
                $user_login_username == $row['user_login_username']
            ) {
                $err = 'Login username exists';
            }
        } else {
            /* Persist */
            $sql = "INSERT INTO users (user_full_names, user_number, user_idno, user_phone_number, user_address, user_access_level, user_login_username, user_login_password)
            VALUES('{$user_full_names}', '{$user_number}', '{$user_idno}', '{$user_phone_number}', '{$user_address}', '{$user_access_level}', '{$user_login_username}', '{$confirm_password}')";

            if (mysqli_query($mysqli, $sql)) {
                $success = $user_access_level . " account registered";
            } else {
                $err  = "Failed, please try again";
            }
        }
    }
}

/* Update Receptionist / Lab Tech / Chief Lab Tech */
if (isset($_POST['Update_User'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $user_full_names = mysqli_real_escape_string($mysqli, $_POST['user_full_names']);
    $user_idno = mysqli_real_escape_string($mysqli, $_POST['user_idno']);
    $user_phone_number = mysqli_real_escape_string($mysqli, $_POST['user_phone_number']);
    $user_address = mysqli_real_escape_string($mysqli, $_POST['user_address']);
    $user_access_level = mysqli_real_escape_string($mysqli, $_POST['user_access_level']);

    /* Persist */
    $sql = "UPDATE users SET user_full_names = '{$user_full_names}', user_idno = '{$user_idno}', user_phone_number = '{$user_phone_number}', user_address = '{$user_address}'
    WHERE user_id = '{$user_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Account updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Users */
if (isset($_POST['Delete_User'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);

    /* Persist */
    $sql = "DELETE FROM users WHERE user_id = '{$user_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Record deleted";
    } else {
        $err = "Failed, please try again";
    }
}
