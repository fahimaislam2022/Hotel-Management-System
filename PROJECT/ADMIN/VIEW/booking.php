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
<div class="table-container">
        <h3>All Bookings</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Room</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>

            <?php if ($bookings && $bookings->num_rows > 0): ?>
                <?php while ($b = $bookings->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $b['id_booking']; ?></td>
                        <td><?php echo htmlspecialchars($b['customer_name']); ?></td>
                        <td><?php echo $b['room_number'] . " (" . $b['room_type'] . ")"; ?></td>
                        <td><?php echo $b['checkin_date']; ?></td>
                        <td><?php echo $b['checkout_date']; ?></td>
                        <td><?php echo $b['status']; ?></td>
                        <td>$<?php echo number_format($b['amount'], 2); ?></td>
                        <td>
                            <a href="../CONTROL/booking_data.php?delete=<?php echo $b['id_booking']; ?>" 
                               class="btn btn-danger"
                               onclick="return confirm('Are you sure you want to delete this booking?');">
                               Delete
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="8">No bookings found.</td></tr>
            <?php endif; ?>
        </table>
    </div>


</body>
</html>

