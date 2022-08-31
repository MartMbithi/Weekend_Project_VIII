<?php
/* Receptionists */
$query = "SELECT COUNT(*)  FROM uses WHERE user_acess_level = 'Receptionist' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($patient);
$stmt->fetch();
$stmt->close();


/* Lab Technicials */
$query = "SELECT COUNT(*)  FROM uses WHERE user_acess_level = 'Lab Technician' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lab_technician);
$stmt->fetch();
$stmt->close();

/* Patients */
$query = "SELECT COUNT(*)  FROM uses WHERE user_acess_level = 'Patient' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($patient);
$stmt->fetch();
$stmt->close();


/* Recored Lab Tests */
$query = "SELECT COUNT(*)  FROM patient_tests ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($patient_tests);
$stmt->fetch();
$stmt->close();

/* Pending Approval Lab Tests */
$query = "SELECT COUNT(*)  FROM results WHERE results_approved_by = '' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($pending_approval);
$stmt->fetch();
$stmt->close();
