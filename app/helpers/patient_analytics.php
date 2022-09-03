<?php
$user_access_level = mysqli_real_escape_string($mysqli, $_SESSION['user_access_level']);
$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);

/*My  Results */
$query = "SELECT COUNT(*)  FROM results r INNER JOIN patient_tests pt
ON pt.patient_test_id = r.results_test_id
WHERE pt.patient_test_patient_id = '{$user_id}' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($patient_results);
$stmt->fetch();
$stmt->close();

/* My Registered Lab Tests */
$query = "SELECT COUNT(*)  FROM patient_tests WHERE patient_test_patient_id = '{$user_id}'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($patient_tests);
$stmt->fetch();
$stmt->close();
