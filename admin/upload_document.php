<?php
session_start();
include '../includes/db.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || !isset($_SESSION['admin_task_type'])) {
    header("Location: admin_login.php");
    exit();
}

$category = $_SESSION['admin_task_type'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $_POST['description'];
    $day = $_POST['days'];

    // File Upload Handling
    //$category = $task_type;
    $target_dir = "../doc_uploads/";
    $file_name = basename($_FILES["document"]["name"]);
    $target_file = $target_dir . $file_name;
    move_uploaded_file($_FILES["document"]["tmp_name"], $target_file);

    // Insert into database
    $sql = "INSERT INTO documents (document_name, document_path, description, days, category) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $file_name, $target_file, $description, $day, $category);

    if ($stmt->execute()) {
        echo "<script>alert('Document uploaded successfully!'); window.location.href='admin_task.php?category=$category';</script>";
    } else {
        echo "<script>alert('Error uploading document: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Document - <?php echo htmlspecialchars($task_type); ?></title>
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
        input[type="text"], input[type="file"] {
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
    <h1>Upload Document - <?php echo htmlspecialchars($category); ?></h1>

    <form action="upload_document.php?category=<?php echo urlencode($category); ?>" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label>Day:</label>
        <input type="text" id="days" name="days" required>
    </div>

    <div class="form-group">
        <label>Description:</label>
        <input type="text" id="description" name="description" required>
    </div>

    <div class="form-group">
        <label>Choose Document:</label>
        <input type="file" name="document" required>
    </div>

    
    <button type="submit" class="button">Upload Document</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
