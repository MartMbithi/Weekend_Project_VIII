<?php
$user_access_level = mysqli_real_escape_string($mysqli, $_SESSION['user_access_level']);
$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);

if ($user_access_level == 'Chief Lab Technician' || $user_access_level == 'Receptionist' || $user_access_level = 'Lab Technician') {
    /* Receptionists */
    $query = "SELECT COUNT(*)  FROM users WHERE user_access_level = 'Receptionist' ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($receptionist);
    $stmt->fetch();
    $stmt->close();


    /* Lab Technicials */
    $query = "SELECT COUNT(*)  FROM users WHERE user_access_level = 'Lab Technician' ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($lab_technician);
    $stmt->fetch();
    $stmt->close();

    /* Patients */
    $query = "SELECT COUNT(*)  FROM users WHERE user_access_level = 'Patient' ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($patient);
    $stmt->fetch();
    $stmt->close();


    /* Recorded Lab Tests Categories */
    $query = "SELECT COUNT(*)  FROM tests ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($tests);
    $stmt->fetch();
    $stmt->close();

    /* Pending Approval Lab Tests */
    $query = "SELECT COUNT(*)  FROM results WHERE ISNULL(results_approved_by) ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($pending_approval);
    $stmt->fetch();
    $stmt->close();

    /* Results */
    $query = "SELECT COUNT(*)  FROM results ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($results);
    $stmt->fetch();
    $stmt->close();

    /* Registered Lab Tests */
    $query = "SELECT COUNT(*)  FROM patient_tests ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($patient_tests);
    $stmt->fetch();
    $stmt->close();
} else {
    /* Load Patient Access Level Analytics */


    /*My  Results */
    $query = "SELECT COUNT(*)  FROM results r INNER JOIN patient_tests pt ON pt.patient_test_id = r.results_test_id
    WHERE pt.patient_test_patient_id = '{$user_id}' ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($results);
    $stmt->fetch();
    $stmt->close();

    /* My Registered Lab Tests */
    $query = "SELECT COUNT(*)  FROM patient_tests WHERE patient_test_patient_id = '{$user_id}'  ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($patient_tests);
    $stmt->fetch();
    $stmt->close();

    /* Pending Approval Results */
    $query = "SELECT COUNT(*)  FROM results r INNER JOIN patient_tests pt ON pt.patient_test_id = r.results_test_id
    WHERE pt.patient_test_patient_id = '{$user_id}'  AND ISNULL(results_approved_by) ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($pending_results);
    $stmt->fetch();
    $stmt->close();
}
