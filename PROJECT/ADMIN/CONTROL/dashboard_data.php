<?php
include("../MODEL/db.php"); 

$total_rooms = 0;
$available = 0;
$checkins_today = 0;
$revenue = 0;

$res = $conn->query("SELECT COUNT(*) AS total FROM rooms");
if ($res && $row = $res->fetch_assoc()) $total_rooms = $row['total'];


$res = $conn->query("SELECT COUNT(*) AS total FROM rooms WHERE status='Available'");
if ($res && $row = $res->fetch_assoc()) $available = $row['total'];

$res = $conn->query("SELECT COUNT(*) AS total FROM bookings WHERE checkin_date = CURDATE()");
if ($res && $row = $res->fetch_assoc()) $checkins_today = $row['total'];

$res = $conn->query("SELECT SUM(amount) AS rev FROM bookings WHERE checkin_date = CURDATE()");
if ($res && $row = $res->fetch_assoc()) $revenue = $row['rev'] ?? 0;

$recent_bookings = $conn->query("SELECT * FROM bookings ORDER BY id DESC LIMIT 5");
?>
