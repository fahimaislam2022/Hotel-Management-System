<?php 
session_start();

/*if(!isset($_SESSION ['status'])|| $_SESSION['status']!==true)
    {
    header('location: UserLogin.php?error=badrequest');
    exit();}*/

   

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard </title>
   
    <link rel="stylesheet" href="../CSS/UserDashboard.css">
</head>
<body>

    <main class="main-content">
        <h1>Welcome Back </h1>

        <div class="dashboard-grid">
    
<section class="card">
                <h2>Quick Actions</h2>
                <div class="action-buttons">
                    <button class="btn" onclick="window.location.href='UserProfile.php'">View My Profile</button>
                    <button class="btn" onclick="window.location.href='RoomInventory.php'"> Book Room</button>
                    
                    <button class="btn" onclick="window.location.href='FeedBack.php'">FeedBack</button>
                </div>
            </section>
            

        </div>
    </main>
    <div class ="logout-container">
        <button class ="logout-btn">Logout </button>
</div>

</body>
</html>
