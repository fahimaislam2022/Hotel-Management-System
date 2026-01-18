<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: UserLogin.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../CSS/UserDashboard.css">
</head>
<body>

<main class="main-content">
    <h1>Welcome Back, <?= htmlspecialchars($username) ?>!</h1>

    <div class="dashboard-grid">

        <section class="card">
            <h2>Quick Actions</h2>
            <div class="action-buttons">
                <button class="btn" onclick="window.location.href='UserProfile.php'">View My Profile</button>
                <button class="btn" onclick="window.location.href='RoomInventory.php'">Book Room</button>
                <button class="btn" onclick="window.location.href='FeedBack.php'">FeedBack</button>
            </div>
        </section>

    </div>
</main>

<div class="logout-container">
    <button class="logout-btn" onclick="window.location.href='../CONTROL/logout.php'">Logout</button>
</div>

</body>
</html>
