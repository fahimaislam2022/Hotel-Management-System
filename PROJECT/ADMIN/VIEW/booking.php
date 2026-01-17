<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include("../CONTROL/booking_data.php");
?>
<!DOCTYPE html>
<head>
    <title>HMS Booking</title>
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
        <li><a href="booking.php" class="active">Booking</a></li>
        <li><a href="Billing.php">Billing</a></li>
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
<div class="form-box">
        <h4>Create New Booking</h4>
        <form method="POST" action="../CONTROL/booking_data.php">
            <input type="hidden" name="action" value="add">

            <label>Customer</label>
            <select name="id_customer" required>
                <option value="">Select Customer</option>
                <?php while ($c = $customers->fetch_assoc()): ?>
                    <option value="<?php echo $c['id_customer']; ?>">
                        <?php echo htmlspecialchars($c['name']); ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Room</label>
            <select name="room_number" required>
                <option value="">Select Room</option>
                <?php while ($r = $rooms->fetch_assoc()): ?>
                    <option value="<?php echo $r['room_number']; ?>">
                        Room <?php echo $r['room_number'] . " - " . $r['type'] . " ($" . $r['price'] . ")"; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Check-in Date</label>
            <input type="date" name="checkin_date" required>

            <label>Check-out Date</label>
            <input type="date" name="checkout_date" required>

            <button type="submit" class="btn btn-primary">Confirm Booking</button>
        </form>
    </div>

</body>
</html>

