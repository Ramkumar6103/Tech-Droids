<?php
session_start();
include 'includes/db.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

$delete_success = false;

// Handle deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_submission_id'])) {
    $submission_id = $_POST['delete_submission_id'];

    // Delete the record from the database
    $stmt = $conn->prepare("DELETE FROM user_submissions WHERE id = ?");
    $stmt->bind_param("i", $submission_id);
    if ($stmt->execute()) {
        $delete_success = true;
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch submissions along with user name
$query = "SELECT us.id, us.user_id, u.username AS user_name, us.task_id, us.category, us.submission_path, us.submission_date 
          FROM user_submissions us 
          JOIN users u ON us.user_id = u.id";
 // Adjust table names and column names if needed
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #edf2f7;
            text-align: center;
        }

        h1 {
            background-color: #1a73e8;
            color: white;
            padding: 20px;
            margin: 0;
            font-size: 32px;
            border-radius: 8px;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #1a73e8;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .download-btn, .delete-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .download-btn:hover {
            background-color: #0056b3;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        a.logout {
            color: #6c757d;
            display: inline-block;
            margin-top: 30px;
            font-size: 18px;
            padding: 10px 15px;
            border-radius: 8px;
            background-color: #edf2f7;
            text-decoration: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        a.logout:hover {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <?php
    if ($delete_success) {
        echo "<p style='color: green;'>Record deleted successfully!</p>";
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>User Name</th>
                <th>Task ID</th>
                <th>Category</th>
                <th>Submission Path</th>
                <th>Submission Date</th>
                <th>Download</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['user_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['task_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['category']) . "</td>";
            echo "<td>" . htmlspecialchars($row['submission_path']) . "</td>";
            echo "<td>" . htmlspecialchars($row['submission_date']) . "</td>";
            echo "<td><button class='download-btn' onclick=\"downloadImage('" . htmlspecialchars($row['submission_path']) . "')\">Download</button></td>";
            echo "<td>
                    <form method='post' style='display:inline;'>
                        <input type='hidden' name='delete_submission_id' value='" . htmlspecialchars($row['id']) . "'>
                        <button class='delete-btn' type='submit'>Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No submissions found</td></tr>";
    }
    ?>
</tbody>

    </table>

    <a class="logout" href="logout.php">Logout</a>

    <script>
        function downloadImage(path) {
            const link = document.createElement('a');
            link.href = path;
            link.download = path.split('/').pop();
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
</body>
</html>
