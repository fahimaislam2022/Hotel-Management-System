<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include("../CONTROL/dashboard_data.php");
?>
<!DOCTYPE html>
<head>
    <title>HMS Dashboard</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
</head>
<body>

<div class="sidebar">
    <h2 class="brand">Hotel Management System</h2>
    <ul class="menu">
        <li><a href="dashboard.php" class="active">Home</a></li>
        <li><a href="rooms.php">Rooms</a></li>
        <li><a href="housekeeping.php">Housekeeping</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="billing.php">Billing</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="../CONTROL/logout.php">Logout</a></li>
    </ul>
    <div class="user-mini">
        <div class="user-info"><h4><?php echo $_SESSION['username']; ?></h4><span>Manager</span></div>
    </div>
</div>

<div class="main">
    <header>
        <h2>Dashboard Overview</h2>
        <div class="date-display"><?php echo date("l, F j, Y"); ?></div>
    </header>

   
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total Rooms</h3>
            <div class="value"><?php echo $total_rooms; ?></div>
        </div>
        <div class="stat-card">
            <h3>Available</h3>
            <div class="value"><?php echo $available; ?></div>
        </div>
        <div class="stat-card">
            <h3>Check-ins Today</h3>
            <div class="value"><?php echo $checkins_today; ?></div>
        </div>
        <div class="stat-card">
            <h3>Daily Revenue</h3>
            <div class="value">$<?php echo number_format($revenue, 2); ?></div>
        </div>
    </div>


 <h3>Recent Bookings</h3>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Guest</th>
                    <th>Room</th>
                    <th>Check-in Date</th>
                </tr>
            </thead>
             <tbody>
                <?php if ($recent_bookings && $recent_bookings->num_rows > 0): ?>
                    <?php while ($row = $recent_bookings->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id_customer']); ?></td>
                            <td><?php echo $row['room_number']; ?></td>
                            <td><?php echo $row['checkin_date']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="4">No recent bookings.</td></tr>
                <?php endif; ?>
            </tbody>

</table>
</div>
</div>
</body>
</html>
