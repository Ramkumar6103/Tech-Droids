<?php
session_start();
include 'includes/db.php';
// Check if the user is logged in as an admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

// Fetch users from the database
$result = $conn->query("SELECT * FROM users");

if ($result === false) {
    die("Error fetching users: " . $conn->error);
}

$users = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - View Users</title>
</head>
<body>
    <h1>Admin Panel - View Users</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <!-- Add more columns as needed -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>