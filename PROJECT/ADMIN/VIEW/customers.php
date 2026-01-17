<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include("../CONTROL/customer_data.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>HMS Customers</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    
</head>
<body>

<div class="sidebar">
    <h2 class="brand">Hotel Management System</h2>
    <ul class="menu">
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="rooms.php">Rooms</a></li>
        <li><a href="housekeeping.php">Housekeeping</a></li>
        <li><a href="customers.php" class="active">Customers</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="billing.php">Billing</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="../CONTROL/logout.php">Logout</a></li>
    </ul>
</div>

 <div class="form-box">
        <h4>Add New Customer</h4>
        <form method="POST" action="../CONTROL/customers_data.php">
            <input type="hidden" name="action" value="add">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="number" name="total_visits" placeholder="Total Visits" value="0" min="0">
            <button type="submit" class="btn btn-primary" style="width:100%">Add Customer</button>
        </form>
    </div>

</body>
</html>
