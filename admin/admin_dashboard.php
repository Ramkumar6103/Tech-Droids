<?php
session_start();
include '../includes/db.php';

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
        /* General Page Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        /* Header Styling */
        h1 {
            background-color: #007bff;
            color: white;
            padding: 20px;
            margin: 0;
            font-size: 28px;
        }

        /* Link Styling */
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            margin: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Task Divisions Container */
        .task-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }

        /* Individual Task Division */
        .task-division {
            background-color: #ffffff;
            border: 2px solid #dddddd;
            border-radius: 10px;
            width: 220px;
            padding: 15px;
            cursor: pointer;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .task-division:hover {
            background-color: #007bff;
            color: white;
            transform: translateY(-5px);
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);
        }

        /* Logout Link */
        a.logout {
            color: #6c757d;
            display: inline-block;
            margin-top: 30px;
            font-size: 16px;
        }

        a.logout:hover {
            color: #dc3545;
        }

        /* Text Styling */
        h2 {
            font-size: 22px;
            color: #333333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Admin Dashboard - <?php echo htmlspecialchars($task_type); ?></h1>
    <a href="admin_users.php">Click to see the users</a>

    <!-- Task Divisions -->
    <h2>Task Divisions</h2>
    <div class="task-container">
        <!-- Existing Button -->
        <div class="task-division" onclick="window.location.href='admin_task.php?category=<?php echo urlencode($task_type); ?>'">
            <?php echo htmlspecialchars($task_type); ?>
        </div>
        
        <!-- New Button for View Task Results -->
        <div class="task-division" onclick="window.location.href='admin_task_results.php?category=<?php echo urlencode($task_type); ?>'">
            View Task Results
        </div>
    </div>
    <a class="logout" href="logout.php">Logout</a>

<?php
// Close the database connection
$conn->close();
?>
