<?php
session_start();


if (!isset($_SESSION['login_password'])) {
    $_SESSION['login_password'] = "abc123"; 
}

$errorMsg = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $oldPass = trim($_POST['old_password'] ?? "");
    $newPass = trim($_POST['new_password'] ?? "");
    $confirmPass = trim($_POST['confirmnew_password'] ?? "");

   
    if (empty($oldPass) || empty($newPass) || empty($confirmPass)) {
        $errorMsg = "All fields are required.";
    }
   
    elseif ($oldPass !== $_SESSION['login_password']) {
        $errorMsg = "Old password is incorrect. Try again.";
    }
    
    elseif (strlen($newPass) < 6) {
        $errorMsg = "Password must be at least 6 characters.";
    }
  
    elseif ($newPass !== $confirmPass) {
        $errorMsg = "New passwords do not match.";
    }
    else {
       
        $_SESSION['login_password'] = $newPass;
        $successMsg = "Password updated successfully.";
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
     <link rel="stylesheet" href="../CSS/Updatepassword.css">
</head>
<body>
   <div class="password-card">
    <h1>Update Your Password Here!</h1>

    <form method="POST">

        

        <label>Old Password:</label>
        <input type="password" name="old_password">

        <label>New Password:</label>
        <input type="password" name="new_password">

        <label>Confirm New Password:</label>
        <input type="password" name="confirmnew_password">

        <?php if (!empty($errorMsg)) { ?>
            <p class="error-msg"><?php echo $errorMsg; ?></p>
        <?php } ?>

        <?php if (!empty($successMsg)) { ?>
            <p class="success-msg"><?php echo $successMsg; ?></p>
        <?php } ?>

        <input type="submit" value="Update Password">

        <button type="button"
                onclick="window.location.href='UserDashboard.php'"
                class="back-btn">
            Back To Dashboard
        </button>

    </form>
</div>
    
</body>
</html>