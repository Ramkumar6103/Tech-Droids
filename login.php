<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $username = $_POST["username"];
        $academic_year = $_POST["academic_year"];
        $password = $_POST["password"];

        // Escape user inputs for security
        $username = $conn->real_escape_string($username);
        $academic_year = $conn->real_escape_string($academic_year);
        $password = $conn->real_escape_string($password);

        // Retrieve user data from the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND academic_year = ?");
        $stmt->bind_param("ss", $username, $academic_year);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            throw new Exception($conn->error);
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

                // Redirect to index.php
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Invalid password!";
            }
        } else {
            $error_message = "No user found with the provided username and academic year!";
        }
    } catch (Exception $e) {
        $error_message = "Error: " . htmlspecialchars($e->getMessage());
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <video autoplay muted loop playsinline class="background-video">
        <source src="./assests/images/login.mp4" type="video/mp4" />
    </video>
    <div class="container">
        <form id="loginForm" action="login.php" method="POST">
            <h2>Login</h2>

            <?php
            if (isset($error_message)) {
                echo "<p style='color:red;'>$error_message</p>";
            }
            ?>

            <div class="input-group">
                <input type="text" name="username" id="username" required />
                <label for="username">Username</label>
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
                <input type="password" name="password" id="password" required />
                <label for="password">Password</label>
            </div>

            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Click Here!...</a></p>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("loginForm");

            form.addEventListener("submit", function (event) {
                const username = document.getElementById("username").value;
                const password = document.getElementById("password").value;

                if (username.trim() === "" || password.trim() === "") {
                    event.preventDefault();
                    alert("Please fill in all fields.");
                }
            });
        });
    </script>
</body>
</html>
