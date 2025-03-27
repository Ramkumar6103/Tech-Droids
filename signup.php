<?php
session_start();
include 'includes/db.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $academic_year = $_POST["academic_year"];
        $photo = $_FILES["upload-photo"];
        $id_card = $_FILES["upload-id"];

        // Validate inputs
        if (empty($username) || empty($email) || empty($password) || empty($academic_year) || !$photo || !$id_card) {
            throw new Exception("All fields are required!");
        }

        if ($password !== $confirm_password) {
            throw new Exception("Passwords do not match!");
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Validate file types for uploads
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($photo["type"], $allowed_types) || !in_array($id_card["type"], $allowed_types)) {
            throw new Exception("Both photo and ID card must be image files (JPG, PNG, or GIF).");
        }

        // Handling file uploads
        $upload_directory = "uploads/";
        if (!is_writable($upload_directory)) {
            throw new Exception("Upload directory is not writable.");
        }

        $photo_hash = hash('sha256', $photo["name"] . time());
        $id_card_hash = hash('sha256', $id_card["name"] . time());

        $photo_extension = pathinfo($photo["name"], PATHINFO_EXTENSION);
        $id_extension = pathinfo($id_card["name"], PATHINFO_EXTENSION);

        $photo_path = $upload_directory . $photo_hash . '.' . $photo_extension;
        $id_card_path = $upload_directory . $id_card_hash . '.' . $id_extension;

        if (!move_uploaded_file($photo["tmp_name"], $photo_path)) {
            throw new Exception("Failed to upload photo.");
        }
        if (!move_uploaded_file($id_card["tmp_name"], $id_card_path)) {
            throw new Exception("Failed to upload ID card.");
        }

        // Insert user data into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, academic_year, photo_path, id_card_path) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $username, $email, $hashed_password, $academic_year, $photo_path, $id_card_path);

        if (!$stmt->execute()) {
            throw new Exception("Database error: " . $stmt->error);
        }

        // Redirect on success
        header("Location: login.php");
        exit();
    }
} catch (Exception $e) {
    $error_message = htmlspecialchars($e->getMessage());
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page</title>
    <link rel="stylesheet" href="register.css" />
</head>
<body>
    <video autoplay muted loop playsinline class="background-video">
        <source src="./assests/images/register.mp4" type="video/mp4" />
    </video>
    <div class="container">
        <form id="registerForm" action="signup.php" method="POST" enctype="multipart/form-data">
            <h2>Register</h2>

            <?php
            if (isset($error_message)) {
                echo "<p class='error-message'>" . $error_message . "</p>";
            }
            ?>

            <div class="input-group">
                <input type="text" name="username" id="username" required />
                <label for="username">Username</label>
            </div>

            <div class="input-group">
                <input type="email" name="email" id="email" required />
                <label for="email">Email</label>
            </div>

            <div class="input-group">
                <input type="password" name="password" id="password" required />
                <label for="password">Password</label>
            </div>

            <div class="input-group">
                <input type="password" name="confirm_password" id="confirm_password" required />
                <label for="confirm_password">Confirm Password</label>
            </div>

            <div class="input-group">
                <label for="academic_year"></label>
                <select name="academic_year" id="academic_year" required>
                    <option value="" disabled selected>Select Academic Year</option>
                    <option value="2022-2025">2022-2025</option>
                    <option value="2023-2026">2023-2026</option>
                    <option value="2024-2027">2024-2027</option>
                </select>
            </div>

            <div class="input-group">
                <label for="upload-photo"></label>
                <input type="file" name="upload-photo" id="upload-photo" required />
            </div>

            <div class="input-group">
                <label for="upload-id"></label>
                <input type="file" name="upload-id" id="upload-id" required />
            </div>

            <button type="submit">Register</button>
        </form>
        <p>Do you have an account? <a href="login.php">Click Here!...</a></p>
    </div>
    <script src="register.js"></script>
</body>
</html>
