<?php
session_start();
include '../includes/db.php'; // Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Fetch documents based on category
$sql = "SELECT * FROM documents WHERE category = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Documents - <?php echo htmlspecialchars($category); ?></title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
    padding: 20px;
}

h2 {
    color: #333;
}

table {
    margin: 0 auto;
    border-collapse: collapse;
    width: 80%;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #007BFF;
    color: white;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

a {
    text-decoration: none;
    color: #007BFF;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

.download-btn {
    display: inline-block;
    padding: 8px 12px;
    background-color: #28a745;
    color: white;
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
    transition: 0.3s;
}

.download-btn:hover {
    background-color: #218838;
}

.back-link {
    display: block;
    margin-top: 20px;
    font-size: 18px;
    text-decoration: none;
    color: #007BFF;
    font-weight: bold;
}

.back-link:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <h2>Documents in <?php echo htmlspecialchars($category); ?></h2>
    
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Days</th>
                    <th>Document Name</th>
                    <th>Description</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['days']); ?></td>
                        <td><?php echo htmlspecialchars($row['document_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><a href="?download=<?php echo urlencode($row['document_path']); ?>" class="download-btn">Download</a></td>
                        </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No documents found in this category.</p>
    <?php endif; ?>

    <a class="back-link" href="../index.php">Back to Categories</a>

    <?php
if (isset($_GET['download'])) {
    $file_name = basename($_GET['download']);
    $file_path = '../doc_uploads/' . $file_name; // Ensure the correct path

    if (file_exists($file_path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file_name . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        exit();
    } else {
        echo "<p style='color:red;'>File not found.</p>";
    }
}

    ?>
</body>
</html>
