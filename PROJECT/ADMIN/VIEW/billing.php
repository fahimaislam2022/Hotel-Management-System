<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>HMS Billing</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    
</head>
<body>

<div class="sidebar">
    <h2 class="brand">Hotel Management System</h2>
    <ul class="menu">
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="rooms.php">Rooms</a></li>
        <li><a href="housekeeping.php">Housekeeping</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="billing.php" class="active">Billing</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="../CONTROL/logout.php">Logout</a></li>
    </ul>
    <div class="user-mini">
        <div class="user-info">
            <h4><?php echo $_SESSION['username']; ?></h4>
            <span>Manager</span>
        </div>
    </div>
</div>


</body>
</html>
