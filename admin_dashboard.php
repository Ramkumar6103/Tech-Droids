<?php
session_start();
include 'includes/db.php';

// Check if the admin is logged in and authorized
if (!isset($_SESSION['admin_logged_in']) || !isset($_SESSION['admin_task_type'])) {
    header("Location: admin_login.php");
    exit();
}

$task_type = $_SESSION['admin_task_type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - <?php echo htmlspecialchars($task_type); ?></title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f9;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            background: #007bff;
            color: white;
            padding: 15px;
            border-radius: 10px;
            display: inline-block;
            font-size: 24px;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        /* Task Divisions */
        .task-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .task-division {
            background: white;
            padding: 15px;
            width: 200px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.3s, background 0.3s;
        }

        .task-division:hover {
            background: #007bff;
            color: white;
            transform: scale(1.05);
        }

        /* Table Styling */
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        /* Delete Button */
        .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .delete-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Admin Dashboard - <?php echo htmlspecialchars($task_type); ?></h1>
    <a href="admin_users.php">Click to see the users</a>
    <!-- Task Divisions -->
    <h2>Task Divisions</h2>
    <div class="task-division" onclick="window.location.href='admin_task.php?category=<?php echo urlencode($task_type); ?>'">
        <?php echo htmlspecialchars($task_type); ?>
    </div>
    <a href="logout.php">Logout</a>

<?php
// Close the database connection
$conn->close();
?>
