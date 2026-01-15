<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel= "stylesheet" href="../CSS/UserProfile.css">
</head>
<body>
<dciv class =" profile-card">
<h1>Welcome To Profile</h1>
<img src = " http://localhost/Web%20tech/Project/USER/Image/userprofile.jpg"alt ="Profile Picture" class ="avatar">

<div class ="profile-actions">
    <button  onclick="window.location.href='EditProfile.php'">Edit Profile</button>
    <button onclick="window.location.href='UpdatePassword.php'">Update Password</button><br><br>
    
</div>

<div class ="back-dashboard-container".>
    <button class ="back-dashboard-btn" onclick ="window.location.href='userdashboard.php'"> Back to Dashboard</button>

</div>
</div>
    
</body>
</html>
