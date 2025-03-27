<?php
// session_start();

// // Check if the user or admin is logged in
// if (!isset($_SESSION['username']) && !isset($_SESSION['admin_logged_in'])) {
//     // Redirect to the login page if no valid session is found
//     header('Location: login.html');
//     exit();
// }

// // Redirect admin to the admin dashboard if they try to access the index page
// if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
//     if (basename($_SERVER['PHP_SELF']) === 'index.php') {
//         header('Location: admin_dashboard.php');
//         exit();
//     }
// }
?>
