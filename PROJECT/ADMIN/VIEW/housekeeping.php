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
    <title>HMS Housekeeping</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
</head>
<body>

<div class="sidebar">
    <h2 class="brand">Hotel Management System</h2>
    <ul class="menu">
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="rooms.php">Rooms</a></li>
        <li><a href="housekeeping.php" class="active">Housekeeping</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="billing.php">Billing</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="../CONTROL/logout.php">Logout</a></li>
    </ul>
</div>


<div class="table-container">
        <h3>All Rooms Cleaning Status</h3>
        <table>
            <tr>
                <th>Room No</th>
                <th>Type</th>
                <th>Price</th>
                <th>Cleaning Status</th>
                <th>Action</th>
            </tr>
            <?php
            if ($rooms && $rooms->num_rows > 0) {
                while ($r = $rooms->fetch_assoc()) {
            ?>
            <tr>
                <form method="POST" action="../CONTROL/housekeeping_data.php">
                    <input type="hidden" name="action" value="update_status">
                    <input type="hidden" name="room_number" value="<?php echo $r['room_number']; ?>">
                    <td><?php echo $r['room_number']; ?></td>
                    <td><?php echo $r['type']; ?></td>
                    <td><?php echo $r['price']; ?></td>
                    <td>
                        <select name="cleaning_status">
                            <option value="Dirty" <?php if ($r['cleaning_status']=="Dirty") echo "selected"; ?>>Dirty</option>
                            <option value="In Progress" <?php if ($r['cleaning_status']=="In Progress") echo "selected"; ?>>In Progress</option>
                            <option value="Clean" <?php if ($r['cleaning_status']=="Clean") echo "selected"; ?>>Clean</option>
                            <option value="Maintenance" <?php if ($r['cleaning_status']=="Maintenance") echo "selected"; ?>>Maintenance</option>
                        </select>
                    </td>
                    <td><button type="submit" class="btn btn-warning">Update</button></td>
                </form>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5'>No rooms found.</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
