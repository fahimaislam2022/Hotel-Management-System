
<?php include "../CONTROL/Edituservalidate.php";?>


<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../CSS/editprofile.css">

</head>
<body>
   <form class="edit-card"
      method="post"
      enctype="multipart/form-data">

    <h1>Edit Profile!</h1>

    <img src="<?php echo $profileImage.'?v='.time(); ?>" id="profile-edit" alt="profile">

    <label>Name:</label>
    <input type="text" name="name" placeholder="Enter your name">

    <label>Email:</label>
    <input type="email" name="email" placeholder ="Enter your email">

    <label>Update Profile Picture</label>
    <input type="file" name="avatar" accept="image/*">

    
    <?php if (!empty($errorMsg)) { ?>
        <p class="err"><?php echo $errorMsg; ?></p>
    <?php } ?>

    
    <?php if (!empty($successMsg)) { ?>
        <p class="ok"><?php echo $successMsg; ?></p>
    <?php } ?>

    <input type="submit" value="Update Profile">
    <input type="button"
           value="Back to Dashboard"
           onclick="window.location.href='UserDashboard.php'"
           class="secondary-btn">

</form>
    
</body>
</html>