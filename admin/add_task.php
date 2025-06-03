<?php
session_start();
include '../includes/db.php';

// Check if the admin is logged in and authorized
if (!isset($_SESSION['admin_logged_in']) || !isset($_SESSION['admin_task_type'])) {
    header("Location: admin_login.php");
    exit();
}

$task_type = $_SESSION['admin_task_type'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];

    // Insert the new task into the database
    $stmt = $conn->prepare("INSERT INTO tasks (course_id, task_name, description, category) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $course_id, $task_name, $description, $task_type);
    if ($stmt->execute()) {
        echo "<script>alert('Task added successfully!');</script>";
        echo "<script>window.location.href='admin_task.php?category=" . urlencode($task_type) . "';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task - <?php echo htmlspecialchars($task_type); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Add Task - <?php echo htmlspecialchars($task_type); ?></h1>

    <!-- Add Task Form -->
    <form method="POST" action="">
        <label for="course_id">Course ID:</label>
        <input type="text" id="course_id" name="course_id" required>

        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <input type="submit" value="Add Task">
    </form>
</body>
</html>
