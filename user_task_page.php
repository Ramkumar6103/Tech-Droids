<?php
session_start();
include 'includes/db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$upload_success = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['task_image'])) {
    $task_id = $_POST['task_id'];
    $user_id = $_SESSION['user_id'];
    $target_dir = "assessment/";
    $target_file = $target_dir . basename($_FILES["task_image"]["name"]);

    // Save the uploaded file to the server
    if (move_uploaded_file($_FILES["task_image"]["tmp_name"], $target_file)) {
        // Insert submission into the database
        $stmt = $conn->prepare("INSERT INTO user_submissions (task_id, user_id, submission_path) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $task_id, $user_id, $target_file);
        if ($stmt->execute()) {
            $upload_success = true;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Fetch tasks from the database based on category
$sql = "SELECT * FROM tasks WHERE category = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Task Page - <?php echo htmlspecialchars($category); ?></title>
    <script>
    function showAlert(message) {
        alert(message);
    }
    </script>
    <style>
        /* Your CSS styles here */
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        
        h2 {
            background: #007bff;
            color: white;
            padding: 15px;
            border-radius: 10px;
            display: inline-block;
        }

        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: white;
            margin: 15px auto;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            max-width: 600px;
        }

        li:hover {
            transform: scale(1.02);
        }

        /* Form Styling */
        form {
            margin-top: 10px;
        }

        input[type="file"] {
            display: block;
            margin: 10px auto;
            padding: 5px;
        }

        input[type="submit"] {
            background: #28a745;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #218838;
        }

    </style>
</head>
<body>
    <h2>Task List - <?php echo htmlspecialchars($category); ?></h2>
    <?php
    if ($upload_success) {
        echo "<script>showAlert('Photo uploaded successfully!');</script>";
    }
    ?>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li><strong>" . htmlspecialchars($row["task_name"]) . ":</strong> " . htmlspecialchars($row["description"]);
                echo "<br><form method='post' enctype='multipart/form-data'>
                        <input type='hidden' name='task_id' value='" . htmlspecialchars($row["id"]) . "'>
                        <input type='file' name='task_image' required>
                        <input type='submit' value='Upload Image'>
                      </form></li>";
            }
        } else {
            echo "<li>No tasks available</li>";
        }
        ?>
    </ul>
</body>
</html>
