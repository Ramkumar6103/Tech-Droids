<?php
// Include the database configuration
include 'includes/db.php';

// Check if the task ID is provided
if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];

    // Delete the task from the database
    $sql = "DELETE FROM admin_task WHERE id = $task_id";

    if ($conn->query($sql) === TRUE) {
        echo "Task deleted successfully";
    } else {
        echo "Error deleting task: " . $conn->error;
    }
}

// Close the database connection
$conn->close();

// Redirect back to the dashboard
header("Location: admin_dashboard.php");
exit;
?>
