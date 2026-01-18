<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$msg = "";
$msgType = "";
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    $msgType = $_SESSION['msgType'];
    unset($_SESSION['msg'], $_SESSION['msgType']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password - HMS</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/changepassword.css">
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
        <li><a href="billing.php">Billing</a></li>
        <li><a href="changepassword.php" class="active">Change Password</a></li>
        <li><a href="../CONTROL/logout.php">Logout</a></li>
    </ul>
    <div class="user-mini">
        <div class="user-info">
            <h4><?php echo $_SESSION['username']; ?></h4>
            <span>Manager</span>
        </div>
    </div>
</div>
<div class="main">
    <header>
        <h2>Change Password</h2>
        <div class="date-display"><?php echo date("l, F j, Y"); ?></div>
    </header>

    <div class="form-card">
        <h3 style="text-align:center; margin-bottom:20px;">Update Security</h3>

        <?php if ($msg != ""): ?>
            <div class="alert <?php echo $msgType; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>

        <form action="../CONTROL/changepassword_data.php" method="POST">
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="current_password" required>
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password" required>
            </div>
            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
    </div>
</div>

</body>
</html>
