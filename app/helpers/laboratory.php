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
    $patient_test_done_by = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $patient_test_date_created = mysqli_real_escape_string($mysqli, date('d M Y'));
    $patient_test_description = mysqli_real_escape_string($mysqli, $_POST['patient_test_description']);

    /* Persist */
    $sql = "INSERT INTO patient_tests (patient_test_test_id, patient_test_patient_id, patient_test_done_by, patient_test_date_created, patient_test_description)
    VALUES('{$patient_test_test_id}', '{$patient_test_patient_id}', '{$patient_test_done_by}', '{$patient_test_date_created}', '{$patient_test_description}')";

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
    $patient_test_description = mysqli_real_escape_string($mysqli, $_POST['patient_test_description']);


    /* Persist */
    $sql = "UPDATE patient_tests SET patient_test_test_id = '{$patient_test_test_id}', patient_test_description = '{$patient_test_description}' WHERE patient_test_id  = '{$patient_test_id}'";

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


/* -----------------------  Results  --------------------------------------------*/

/* Add Results As Chief Lab Technician */
if (isset($_POST['Add_Patient_Tests_Results'])) {
    $results_test_id = mysqli_real_escape_string($mysqli, $_POST['results_test_id']);
    $results_details = mysqli_real_escape_string($mysqli, $_POST['results_details']);
    $results_date_realeased = mysqli_real_escape_string($mysqli, $_POST['results_date_realeased']);
    $results_approved_by = mysqli_real_escape_string($mysqli, $_POST['results_approved_by']);
    $patient_test_status = mysqli_real_escape_string($mysqli, '1');

    /* Persist */
    $results_sql = "INSERT INTO results (results_test_id, results_details, results_date_realeased, results_approved_by) 
    VALUES('{$results_test_id}', '{$results_details}', '{$results_date_realeased}', '{$results_approved_by}')";

    $status_sql = "UPDATE patient_tests SET patient_test_status = '{$patient_test_status}' WHERE patient_test_id = '{$results_test_id}'";

    if (mysqli_query($mysqli, $results_sql) && mysqli_query($mysqli, $status_sql)) {
        $success = "Results added";
    } else {
        $err = "Failed, please try again";
    }
}

/* Add Tests As Lab Technician */
if (isset($_POST['Add_Patient_Tests_Results_By_Technician'])) {
    $results_test_id = mysqli_real_escape_string($mysqli, $_POST['results_test_id']);
    $results_details = mysqli_real_escape_string($mysqli, $_POST['results_details']);
    $results_date_realeased = mysqli_real_escape_string($mysqli, $_POST['results_date_realeased']);
    $patient_test_status = mysqli_real_escape_string($mysqli, '1');

    /* Persist */
    $results_sql = "INSERT INTO results (results_test_id, results_details, results_date_realeased) 
    VALUES('{$results_test_id}', '{$results_details}', '{$results_date_realeased}')";

    $status_sql = "UPDATE patient_tests SET patient_test_status = '{$patient_test_status}' WHERE patient_test_id = '{$results_test_id}'";

    if (mysqli_query($mysqli, $results_sql) && mysqli_query($mysqli, $status_sql)) {
        $success = "Results added";
    } else {
        $err = "Failed, please try again";
    }
}


/* Update Results */
if (isset($_POST['Update_Patient_Tests_Results'])) {
    $result_id  = mysqli_real_escape_string($mysqli, $_POST['result_id']);
    $results_details = mysqli_real_escape_string($mysqli, $_POST['results_details']);

    /* Persist */
    $sql = "UPDATE results SET results_details = '{$results_details}' WHERE result_id = '{$result_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Results updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Approve Lab Results */
if (isset($_POST['Approve_Patient_Tests_Results'])) {
    $results_approved_by = mysqli_real_escape_string($mysqli, $_POST['results_approved_by']);
    $result_id = mysqli_real_escape_string($mysqli, $_POST['result_id']);

    /* Persist */
    $sql  = "UPDATE results SET results_approved_by = '{$results_approved_by}' WHERE result_id = '{$result_id}'";
    if (mysqli_query($mysqli, $sql)) {
        $success = "Results Approved";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Results */
if (isset($_POST['Delete_Patient_Tests_Results'])) {
    $result_id  = mysqli_real_escape_string($mysqli, $_POST['result_id']);
    $results_test_id = mysqli_real_escape_string($mysqli, $_POST['results_test_id']);

    /* Persist */
    $sql = "DELETE FROM results WHERE result_id = '{$result_id}'";
    $status_sql = "UPDATE patient_tests SET patient_test_status = '0'  WHERE patient_test_id  = '{$results_test_id}'";


    if (mysqli_query($mysqli, $sql) && mysqli_query($mysqli, $status_sql)) {
        $success = "Results deleted";
    } else {
        $err = "Failed, Please try again";
    }
}

