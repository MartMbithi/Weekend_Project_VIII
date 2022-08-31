<?php
/* Terminate All Live Sessions */
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_access_level']);
session_destroy();
header("Location: ../");
exit;
