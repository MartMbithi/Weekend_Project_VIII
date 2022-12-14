<?php

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

/* Load Patient Access Level Analyticst */