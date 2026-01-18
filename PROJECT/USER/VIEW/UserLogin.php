<?php
session_start();


$username = "";
$remember = "0";
$errorMsg = "";


if (isset($_COOKIE['remember_user'])) {
    $username = $_COOKIE['remember_user'];
    $remember = "1";
}


if (isset($_SESSION['errorMsg'])) {
    $errorMsg = $_SESSION['errorMsg'];
    unset($_SESSION['errorMsg']);
}
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="../CSS/Login.css">
</head>
<body>

<div class="login-box">
    <h1>Login Now!</h1>

    <?php if ($errorMsg !== ""): ?>
        <p class="error-msg"><?= htmlspecialchars($errorMsg) ?></p>
    <?php endif; ?>

    <form method="POST" action="../CONTROL/UserLoginValidate.php">
        <input type="text" name="username" placeholder="Enter Username" value="<?= htmlspecialchars($username) ?>">
        <input type="password" name="password" placeholder="Enter Password">

       <label class="checkbox-label">
    <input type="checkbox" name="remember" value="1" <?= ($remember === "1") ? "checked" : "" ?>>
    Remember me
</label>


        <input type="submit" value="Login" class="btn-login">

        <div class="secondary-btns">
            <input type="button" value="Forgot Password" onclick="window.location.href='Forgotpassword.php'">
            <input type="button" value="Sign Up" onclick="window.location.href='UserSignup.php'">
        </div>
    </form>

    <input type="button" value="Back to Home" onclick="window.location.href='Homepage.php'" class="btn">
</div>

</body>
</html>
