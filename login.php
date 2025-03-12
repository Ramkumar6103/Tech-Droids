<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $academic_year = $_POST["academic_year"];
  $password = $_POST["password"];

  // Escape user inputs for security
  $username = $conn->real_escape_string($username);
  $academic_year = $conn->real_escape_string($academic_year);
  $password = $conn->real_escape_string($password);

  // Retrieve user data from the database
  $sql = "SELECT * FROM users WHERE username = '$username' AND academic_year = '$academic_year'";
  $result = $conn->query($sql);

  if ($result === false) {
    echo "Error: " . $conn->error;
    exit();
  }

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify the password
    if (password_verify($password, $row["password"])) {
      // Start the session and set session variables
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['username'] = $row["username"];
      $_SESSION['academic_year'] = $row["academic_year"];
      $_SESSION['photo_path'] = $row["photo_path"];
      
      // Redirect to index.html
      header("Location: index.php");
      exit();
    } else {
      echo "Invalid password!";
    }
  } else {
    echo "No user found with the provided username and academic year!";
  }
}

$conn->close();
?>
