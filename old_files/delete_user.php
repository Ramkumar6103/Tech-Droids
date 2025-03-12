<?php
session_start();
include 'includes/db.php';
// Check if the user is logged in as an admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect back to the admin panel with a success message
        $_SESSION['message'] = "User deleted successfully.";
    } else {
        // Redirect back to the admin panel with an error message
        $_SESSION['message'] = "Error deleting user: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header('Location: admin_panel.php');
    exit;
}
?>