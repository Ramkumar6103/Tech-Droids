<?php
session_start();
include 'includes/db.php';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_dashboard.php'); // Redirect admin to the dashboard
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate admin credentials from the database
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_task_type'] = $admin['task_type'];
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error = "Invalid username or password.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
       /* Animated Background */
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(-45deg, #007bff, #6610f2, #6f42c1, #d63384);
    background-size: 300% 300%;
    animation: gradientMove 5s ease infinite;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Smooth Fade-In for Login Box */
@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Login Container */
.admin-login-container {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    border-radius: 15px;
    padding: 30px;
    width: 350px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    color: white;
    animation: fadeInScale 0.6s ease-out;
}

/* Heading */
h1 {
    margin-bottom: 20px;
    font-size: 24px;
    letter-spacing: 1px;
    animation: fadeInScale 1s ease-in-out;
}

/* Input Fields */
input[type="text"], input[type="password"] {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    outline: none;
    transition: box-shadow 0.3s ease, transform 0.2s ease;
}

/* Glow Effect on Focus */
input:focus {
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    transform: scale(1.05);
}

/* Placeholder Color */
input::placeholder {
    color: #e0e0e0;
}

/* Button Styling */
button {
    margin-top: 30px;
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    background: #28a745;
    color: white;
    font-size: 18px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
    animation: pulseEffect 2s infinite;
}

/* Button Hover Effect */
button:hover {
    background: #218838;
    transform: scale(1.05);
}

/* Button Pulse Animation */
@keyframes pulseEffect {
    0% { box-shadow: 0 0 5px #28a745; }
    50% { box-shadow: 0 0 15px #28a745; }
    100% { box-shadow: 0 0 5px #28a745; }
}

/* Error Message */
.error {
    color: #ff4d4d;
    background: rgba(255, 77, 77, 0.1);
    padding: 8px;
    border-radius: 5px;
    margin-bottom: 10px;
    animation: shakeError 0.5s ease-in-out;
}

/* Shake Animation for Error */
@keyframes shakeError {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    50% { transform: translateX(5px); }
    75% { transform: translateX(-5px); }
}

/* Responsive Design */
@media (max-width: 400px) {
    .admin-login-container {
        width: 90%;
    }
}
    </style>
</head>
<body>
    <div class="admin-login-container">
        <h1>Admin Login</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
