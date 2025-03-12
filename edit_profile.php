<?php
session_start();
include 'includes/db.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['username'];

// Fetch user data
$sql = "SELECT * FROM users WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No user found";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST["username"];
    $new_email = $_POST["email"];
    $new_academic_year = $_POST["academic_year"];
    $photo = $_FILES["upload-photo"];
    $id_card = $_FILES["upload-id"];
    $password = $_POST["password"];

    // Update password only if it is provided
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password='$hashed_password' WHERE username='$user'";
        $conn->query($sql);
    }

    // Handling file uploads
    $upload_directory = "uploads/";
    $photo_path = $upload_directory . basename($photo["name"]);
    $id_card_path = $upload_directory . basename($id_card["name"]);

    if (!empty($photo["name"])) {
        move_uploaded_file($photo["tmp_name"], $photo_path);
        $sql = "UPDATE users SET photo_path='$photo_path' WHERE username='$user'";
        $conn->query($sql);
    }

    if (!empty($id_card["name"])) {
        move_uploaded_file($id_card["tmp_name"], $id_card_path);
        $sql = "UPDATE users SET id_card_path='$id_card_path' WHERE username='$user'";
        $conn->query($sql);
    }

    // Update user data
    $sql = "UPDATE users SET username='$new_username', email='$new_email', academic_year='$new_academic_year' WHERE username='$user'";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['username'] = $new_username;  // Update session username
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>
    <link rel="stylesheet" href="signup.css" />
</head>
<body>
    <div class="container">
        <form id="editProfileForm" action="edit_profile.php" method="POST" enctype="multipart/form-data">
            <h2>Edit Profile</h2>

            <div class="input-group">
                <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" required />
                <label for="username">Username</label>
            </div>

            <div class="input-group">
                <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required />
                <label for="email">Email</label>
            </div>

            <div class="input-group">
                <input type="password" name="password" id="password" />
                <label for="password">New Password (Leave blank if you don't want to change)</label>
            </div>

            <!-- Academic Year Dropdown -->
            <div class="input-group">
                <label for="academic_year"></label>
                <select name="academic_year" id="academic_year" required>
                    <option value="2023-2024" <?php if($row['academic_year'] == '2023-2024') echo 'selected'; ?>>2023-2024</option>
                    <option value="2024-2025" <?php if($row['academic_year'] == '2024-2025') echo 'selected'; ?>>2024-2025</option>
                    <option value="2025-2026" <?php if($row['academic_year'] == '2025-2026') echo 'selected'; ?>>2025-2026</option>
                </select>
            </div>

            <!-- Upload Photo -->
            <div class="input-group">
                <label for="upload-photo"><b>Upload New Photo:</b></label>
                <input type="file" name="upload-photo" id="upload-photo" />
                <img src="<?php echo $row['photo_path']; ?>" alt="Current Photo" style="width: 100px; height: 100px;">
            </div>

            <!-- Upload ID Card -->
            <div class="input-group">
                <label for="upload-id"><b>Upload New ID Card:</b></label>
                <input type="file" name="upload-id" id="upload-id" />
                <img src="<?php echo $row['id_card_path']; ?>" alt="Current ID Card" style="width: 100px; height: 100px;">
            </div>

            <button type="submit">Save Changes</button>
        </form>
    </div>
    <script src="register.js"></script>
</body>
</html>
