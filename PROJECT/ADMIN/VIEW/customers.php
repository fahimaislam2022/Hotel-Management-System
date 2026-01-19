<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include("../CONTROL/customers_data.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>HMS Customers</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/customers.css">
    
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
    <div class="user-mini">
        <div class="user-info"><h4><?php echo $_SESSION['username']; ?></h4><span>Manager</span></div>
    </div>
</div>
<div class="main">
    <header>
        <h2>Customer Management</h2>
        <div class="date-display"><?php echo date("l, F j, Y"); ?></div>
    </header>

    <?php if (isset($_GET['msg'])): ?>
        <div style="color: green; background: #e6ffe6; padding: 10px; border-radius: 6px; margin-bottom: 10px;">
            Customer successfully <?php echo htmlspecialchars($_GET['msg']); ?>.
        </div>
    <?php endif; ?>

 <div class="form-box">
        <h4>Add New Customer</h4>
        <form method="POST" action="../CONTROL/customers_data.php">
            <input type="hidden" name="action" value="add">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Full Name" required>
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Email Address" required>
            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <label>Total Visits</label>
            <input type="number" name="total_visits" placeholder="Total Visits" value="0" min="0">
            <button type="submit" class="btn btn-primary" >Add Customer</button>
        </form>
    </div>
<div class="table-container">
        <h3>Registered Customers</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Total Visits</th>
                <th>Action</th>
            </tr>

            <?php if ($customers && $customers->num_rows > 0): ?>
                <?php while ($c = $customers->fetch_assoc()): ?>
                <tr>
                    <form method="POST" action="../CONTROL/customers_data.php">
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="id_customer" value="<?php echo $c['id_customer']; ?>">
                        <td><?php echo $c['id_customer']; ?></td>
                        <td><input type="text" name="name" value="<?php echo htmlspecialchars($c['name']); ?>" required></td>
                        <td><input type="email" name="email" value="<?php echo htmlspecialchars($c['email']); ?>" required></td>
                        <td><input type="text" name="phone" value="<?php echo htmlspecialchars($c['phone']); ?>" required></td>
                        <td><input type="number" name="total_visits" value="<?php echo $c['total_visits']; ?>" min="0"></td>
                        <td>
                            <button type="submit" class="btn btn-warning">Update</button>
                            <a href="../CONTROL/customers_data.php?delete=<?php echo $c['id_customer']; ?>"
                               class="btn btn-danger"
                               onclick="return confirm('Are you sure you want to delete this customer?');">
                               Delete
                            </a>
                        </td>
                    </form>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7">No customers found.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</div>
</body>
</html>
