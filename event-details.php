<?php
session_start();
include 'includes/db.php';

if (isset($_SESSION['admin_logged_in'])) {
  header('Location: admin_dashboard.php');
  exit();
}
$event_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$event = null;

if ($event_id > 0) {
    $sql = "SELECT * FROM events WHERE id = $event_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $event = $result->fetch_assoc();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($event['title']) ?> - Event Details</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: #f5f5f5;
      color: #333;
    }
    .event-container {
  display: flex;
  gap: 30px;
  background: white;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  max-width: 1000px;
  margin: auto;
}

.event-image img {
  width: 350px;
  height: auto;
  border-radius: 10px;
  object-fit: cover;
}

.event-details h2 {
  color: #1a1a1a;
  font-size: 28px;
}

.event-details h3 {
  margin-top: 20px;
  font-size: 20px;
  color: #333;
}

.register-btn {
  display: inline-block;
  margin-top: 20px;
  padding: 10px 25px;
  background-color: #ff6600;
  color: white;
  text-decoration: none;
  border-radius: 8px;
  transition: background 0.3s;
}

.register-btn:hover {
  background-color: #e65c00;
}

  </style>
</head>
<body>

  <div class="event-container">
  <div class="event-image">
    <img src="uploads/<?php echo $event['event_image']; ?>" alt="Event Image">
  </div>
  <div class="event-details">
    <h2><?php echo $event['event_name']; ?></h2>
    <p><strong>Date:</strong> <?php echo date("F j, Y", strtotime($event['event_date'])); ?></p>
    <p><strong>Time:</strong> <?php echo date("H:i", strtotime($event['event_time'])); ?></p>
    <p><strong>Location:</strong> <?php echo $event['event_location']; ?></p>
    <p><strong>Category:</strong> <?php echo $event['category']; ?></p>
    <p><strong>Fees:</strong> <?php echo $event['fees']; ?></p>

    <h3>About the Event</h3>
    <p><?php echo nl2br($event['event_description']); ?></p>

    <h3>Agenda</h3>
    <p><?php echo nl2br($event['agenda']); ?></p>

    <h3>Speakers / Guests</h3>
    <p><?php echo nl2br($event['speakers']); ?></p>

    <h3>Rules</h3>
    <p><?php echo nl2br($event['rules']); ?></p>

    <h3>Contact</h3>
    <p><strong>Coordinator:</strong> <?php echo $event['event_coordinator']; ?></p>
    <p><strong>Phone:</strong> <?php echo $event['contact_number']; ?></p>

    <a class="register-btn" href="<?php echo $event['registration_link']; ?>" target="_blank">Register Now</a>
  </div>
</div>
</body>
</html>
