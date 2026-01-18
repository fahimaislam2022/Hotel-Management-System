<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include("../CONTROL/billing_data.php");
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
<div class="main">
    <header>
        <h2>Invoices & Billing</h2>
        <div class="date-display"><?php echo date("l, F j, Y"); ?></div>
    </header>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert">Billing status successfully updated.</div>
    <?php endif; ?>

    <div class="table-container">
        <h3>All Invoices</h3>
        <table>
            <tr>
                <th>Invoice ID</th>
                <th>Customer</th>
                <th>Room & Dates</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>

            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>#<?php echo $row['id_booking']; ?></td>
                        <td>
                            <strong><?php echo htmlspecialchars($row['name']); ?></strong><br>
                            <small><?php echo htmlspecialchars($row['email']); ?></small>
                        </td>
                        <td>
                            Room <?php echo $row['room_number']; ?><br>
                            <small><?php echo $row['checkin_date'] . " → " . $row['checkout_date']; ?></small>
                        </td>
                        <td>$<?php echo number_format($row['amount'], 2); ?></td>
                        <td>
                            <form method="POST" action="../CONTROL/billing_data.php" style="display:inline;">
                                <input type="hidden" name="booking_id" value="<?php echo $row['id_booking']; ?>">
                                <select name="status"
                                        class="status-select status-<?php echo $row['status']; ?>"
                                        onchange="this.form.submit()">
                                    <option value="Confirmed" <?php if($row['status']=='Confirmed') echo 'selected'; ?>>Confirmed</option>
                                    <option value="Pending" <?php if($row['status']=='Pending') echo 'selected'; ?>>Pending</option>
                                    <option value="Cancelled" <?php if($row['status']=='Cancelled') echo 'selected'; ?>>Cancelled</option>
                                </select>
                                <input type="hidden" name="update_status" value="1">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5">No invoices found.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</div>


</body>
</html>
