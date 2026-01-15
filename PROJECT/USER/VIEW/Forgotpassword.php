<?php
session_start();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPass = $_POST['new_password'] ?? '';
    $confirmPass = $_POST['confirm_password'] ?? '';

    if (strlen($newPass) < 6) {
        $error = 'Password must be at least 6 characters long!';
    } elseif ($newPass !== $confirmPass) {
        $error = 'Passwords do not match!';
    } else {
        
        $success = ' Your password has been updated successfully!';
    }
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Forgot Pass</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    
    <link rel="stylesheet" href="../CSS/Forgotpassword.css">
</head>
<body>

<div class="container">
    <div class="left-panel"></div>

    <div class="right-panel">
        <div class="form-box">
            <h1>Forgot Password</h1>
            <p class="desc">Set a new secure password for your account.</p>

            <?php if ($success): ?>
                <p class="ok"><?= htmlspecialchars($success) ?></p>
            <?php endif; ?>

            <form method="post" action="" onsubmit="return validatePasswordForm()">
                <input type="password" id="newPassword" name="new_password"
                       placeholder="New Password"
                       onkeyup="checkPasswordMatch()" />
                
                <input type="password" id="confirmPassword" name="confirm_password"
                       placeholder="Confirm Password"
                       onkeyup="checkPasswordMatch()" />
                
                <p id="passError" class="error-msg"><?= htmlspecialchars($error) ?></p>

                <input type="submit" class="btn" value="Update Password" />
            </form>

            <a href="UserLogin.php" class="secondary-btn">Back to Login</a>
        </div>
    </div>
</div>

<script src="../JS/Forgotpassword.js"></script>

</body>
</html>