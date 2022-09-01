<?php

/* Add Tests Categories */
if (isset($_POST['Add_Lab_Test_Category'])) {
    $test_ref = mysqli_real_escape_string($mysqli, $_POST['test_ref']);
    $test_name = mysqli_real_escape_string($mysqli, $_POST['test_name']);
    $test_details = mysqli_real_escape_string($mysqli, $_POST['test_details']);

    /* Persist */
    $sql = "INSERT INTO tests (test_ref, test_name, test_details) VALUES('{$test_ref}', '{$test_name}', '{$test_details}')";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Test category added";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Tests Categories */
if (isset($_POST['Update_Lab_Test_Category'])) {
    $test_id = mysqli_real_escape_string($mysqli, $_POST['test_id']);
    $test_ref = mysqli_real_escape_string($mysqli, $_POST['test_ref']);
    $test_name = mysqli_real_escape_string($mysqli, $_POST['test_name']);
    $test_details = mysqli_real_escape_string($mysqli, $_POST['test_details']);

    /* Persist */
    $sql = "UPDATE tests SET test_ref = '{$test_ref}', test_name = '{$test_name}', test_details = '{$test_details}'
    WHERE test_id = '{$test_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Test category updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Tests Categories */
if (isset($_POST['Delete_Test_Category'])) {
    $test_id = mysqli_real_escape_string($mysqli, $_POST['test_id']);

    /* Persist */
    $sql = "DELETE FROM tests WHERE test_id = '{$test_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Test category deleted";
    } else {
        $err = "Failed, please try again";
    }
}


/* ---------------------------------------------------------- */