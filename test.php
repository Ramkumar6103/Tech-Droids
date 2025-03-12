<?php
session_start();
include 'includes/db.php';
print_r($_SESSION);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$_SESSION['admin_task_type'];
?>