<?php
session_start();
include 'includes/db.php';
// Check if admin is logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_dashboard.php'); // Redirect to the admin dashboard
    exit();
}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $academic_year = $_POST["academic_year"];
        $photo = $_FILES["upload-photo"];
        $id_card = $_FILES["upload-id"];

        // Password validation
        if ($password !== $confirm_password) {
            throw new Exception("Passwords do not match!");
        }

        // Hashing the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Allowed image types
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

        // Validate photo file type
        if (!in_array($photo["type"], $allowed_types)) {
            throw new Exception("Photo must be an image file (JPG, PNG, or GIF).");
        }

        // Validate ID card file type
        if (!in_array($id_card["type"], $allowed_types)) {
            throw new Exception("ID card must be an image file (JPG, PNG, or GIF).");
        }

        // Handling file uploads with hashed filenames
        $upload_directory = "uploads/";
        $photo_hash = hash('sha256', $photo["name"] . time());
        $id_card_hash = hash('sha256', $id_card["name"] . time());

        $photo_extension = pathinfo($photo["name"], PATHINFO_EXTENSION);
        $id_extension = pathinfo($id_card["name"], PATHINFO_EXTENSION);

        $photo_path = $upload_directory . $photo_hash . '.' . $photo_extension;
        $id_card_path = $upload_directory . $id_card_hash . '.' . $id_extension;

        // Check if upload directory is writable
        if (!is_writable($upload_directory)) {
            throw new Exception("Upload directory is not writable.");
        }

        // Move uploaded files to target directory
        if (!move_uploaded_file($photo["tmp_name"], $photo_path)) {
            throw new Exception("Failed to upload photo: " . $photo["error"]);
        }

        if (!move_uploaded_file($id_card["tmp_name"], $id_card_path)) {
            throw new Exception("Failed to upload ID card: " . $id_card["error"]);
        }

        // Insert user data into the database
        $sql = "INSERT INTO users (username, email, password, academic_year, photo_path, id_card_path)
                VALUES ('$username', '$email', '$hashed_password', '$academic_year', '$photo_path', '$id_card_path')";

        if ($conn->query($sql) !== TRUE) {
            throw new Exception("Error: " . $sql . "<br>" . $conn->error);
        }

        // Redirect to login page after successful registration
        header("Location: login.html");
        exit();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
