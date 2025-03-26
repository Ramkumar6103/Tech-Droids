<?php
include 'includes/db.php';

// Get the selected category
$category = isset($_GET['category']) ? trim($_GET['category']) : '';

// Handle delete request
if (isset($_POST['delete_task_id'])) {
    $delete_task_id = $_POST['delete_task_id'];
    $delete_sql = "DELETE FROM tasks WHERE id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $delete_task_id);
    if ($delete_stmt->execute()) {
        echo "<script>alert('Task deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting task: " . $conn->error . "');</script>";
    }
    $delete_stmt->close();
}

// Fetch tasks
$sql = "SELECT * FROM tasks WHERE category = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Task Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .button:hover {
            background-color: #45a049;
        }
        .delete-button {
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .delete-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <h1>Tasks for <?php echo htmlspecialchars($category); ?></h1>

    <!-- Add Task Button -->
    <button onclick="window.location.href='add_task.php?category=<?php echo urlencode($category); ?>'" class="button">Add Task</button>

    <!-- Task Table -->
    <table>
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Task Name</th>
                <th>Description</th>
                <th>Action</th> <!-- New column for delete button -->
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['course_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['task_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "<td>
                        <form method='post' style='display:inline;'>
                            <input type='hidden' name='delete_task_id' value='" . htmlspecialchars($row['id']) . "'>
                            <button type='submit' class='delete-button'>Delete</button>
                        </form>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No tasks found for this category.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button onclick="history.back();" class="button">Go Back</button>

</body>
</html>

<?php
$conn->close();
?>
