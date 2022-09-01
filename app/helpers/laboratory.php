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


/* ------------------------- LABORATORY TESTS --------------------------------- */

/* Add Tests */
if (isset($_POST['Add_Patient_Tests_record'])) {
    $patient_test_test_id = mysqli_real_escape_string($mysqli, $_POST['patient_test_test_id']);
    $patient_test_patient_id = mysqli_real_escape_string($mysqli, $_POST['patient_test_patient_id']);
    $patient_test_done_by = mysqli_real_escape_string($mysqli, $_SESSION['patient_test_done_by']);
    $patient_test_date_created = mysqli_real_escape_string($mysqli, date('d, M Y'));

    /* Persist */
    $sql = "INSERT INTO patient_tests (patient_test_test_id, patient_test_patient_id, patient_test_done_by, patient_test_date_created)
    VALUES('{$patient_test_test_id}', '{$patient_test_patient_id}', '{$patient_test_done_by}', '{$patient_test_date_created}')";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Laboratory test record added";
    } else {
        $err = "Failed, please try again";
    }
}


/* Update Tests  */
if (isset($_POST['Update_Patient_Tests_record'])) {
    $patient_test_id = mysqli_real_escape_string($mysqli, $_POST['patient_test_id']);
    $patient_test_test_id = mysqli_real_escape_string($mysqli, $_POST['patient_test_test_id']);

    /* Persist */
    $sql = "UPDATE patient_tests SET patient_test_test_id = '{$patient_test_test_id}' WHERE patient_test_id  = '{$patient_test_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Laboratory test record updated";
    } else {
        $err = "Failed, please try again";
    }
}


/* Delete Tests  */
if (isset($_POST['Delete_Patient_Tests_record'])) {
    $patient_test_id = mysqli_real_escape_string($mysqli, $_POST['patient_test_id']);

    /* Persist */
    $sql = "DELETE FROM  patient_tests WHERE patient_test_id = '{$patient_test_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Laboratory test record deleted";
    } else {
        $err = "Failed, please try again";
    }
}
