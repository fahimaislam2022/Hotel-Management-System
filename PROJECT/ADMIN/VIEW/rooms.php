<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include("../CONTROL/rooms_data.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>HMS Rooms</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/rooms.css">
</head>
<body>

<div class="sidebar">
    <h2 class="brand">Hotel Management System</h2>
    <ul class="menu">
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="rooms.php" class="active">Rooms</a></li>
        <li><a href="housekeeping.php">Housekeeping</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="booking.php">Booking </a></li>
        <li><a href="billing.php">Billing</a></li>
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
        <h2>Room Management</h2>
        <div class="date-display"><?php echo date("l, F j, Y"); ?></div>
    </header>

   
    <?php if (isset($_GET['error'])): ?>
        <div style="color: red; background: #ffe6e6; padding: 10px; border-radius: 6px; margin-bottom: 10px;">
            <?php if ($_GET['error'] == 'status_locked'): ?>
                This room has a confirmed booking. You cannot update or change its status.
            <?php elseif ($_GET['error'] == 'delete_locked'): ?>
                This room cannot be deleted because it has a confirmed booking.
            <?php endif; ?>
        </div>
    <?php elseif (isset($_GET['msg'])): ?>
        <div style="color: green; background: #e6ffe6; padding: 10px; border-radius: 6px; margin-bottom: 10px;">
             Room successfully <?php echo htmlspecialchars($_GET['msg']); ?>.
        </div>
    <?php endif; ?>

    
    <div class="form-box">
        <h4>Add Room</h4>
        <form method="POST" action="../CONTROL/rooms_data.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add">
           <label>Type</label>
            <select name="type">
                <option value="Standard">Standard</option>
                <option value="Deluxe">Deluxe</option>
                <option value="Suite">Suite</option>
            </select>
            <input type="hidden" name="price" value="0">
            <label>Status</label>
            <select name="status">
                <option value="Available">Available</option>
                <option value="Occupied">Occupied</option>
            </select>
            <label>Room Image</label>
            <input type="file" name="image" required>
            <button type="submit" class="btn btn-primary" style="width:100%">Add Room</button>
        </form>
    </div>

    
    <div class="table-container">
        <h3>All Rooms</h3>
        <table>
            <tr>
                <th>Room No</th>
                <th>Image</th>
                <th>Type</th>
                <th>$Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php if ($rooms && $rooms->num_rows > 0): ?>
                <?php while ($r = $rooms->fetch_assoc()): ?>
                <tr>
                    <form method="POST" action="../CONTROL/rooms_data.php" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="room_number" value="<?php echo $r['room_number']; ?>">

                        <td><?php echo $r['room_number']; ?></td>
                        <td>
                            <?php if($r['image'] != ''): ?>
                                <img src="../uploads/<?php echo $r['image']; ?>" style="width:150px; height:110px;">
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                            <br><input type="file" name="image">
                        </td>
                        <td>
                            <select name="type">
                                <option value="Standard" <?php if ($r['type']=="Standard") echo "selected"; ?>>Standard</option>
                                <option value="Deluxe" <?php if ($r['type']=="Deluxe") echo "selected"; ?>>Deluxe</option>
                                <option value="Suite" <?php if ($r['type']=="Suite") echo "selected"; ?>>Suite</option>
                            </select>
                        </td>
                        <td><?php echo $r['price']; ?></td>
                        <td>
                            <select name="status" <?php if ($r['booking_status'] == "Confirmed") echo "disabled"; ?>>
                                <option value="Available" <?php if ($r['status']=="Available") echo "selected"; ?>>Available</option>
                                <option value="Occupied" <?php if ($r['status']=="Occupied") echo "selected"; ?>>Occupied</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-warning">Update</button>
                            <?php if ($r['booking_status'] == "Confirmed"): ?>
                                <button type="button" class="btn btn-danger"
                                    onclick="alert(' This room cannot be deleted because it has a confirmed booking.')">
                                    Delete
                                </button>
                            <?php else: ?>
                                <a href="../CONTROL/rooms_data.php?delete=<?php echo $r['room_number']; ?>" 
                                   class="btn btn-danger" 
                                   onclick="return confirm('Are you sure you want to delete this room?')">
                                   Delete
                                </a>
                            <?php endif; ?>
                        </td>
                    </form>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6">No rooms found.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</div>

</body>
</html>
