<?php include('../CONTROL/UserLoginValidate.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../CSS/UserLogin.css">
</head>

<body>
<div class="login-box">
    <h1>Login Now!</h1>

    <form id="Login" onsubmit="event.preventDefault(); loginUser();">

        <input type="text" id="loginUsername" name="username"
               placeholder="Enter Username"
               value="<?= htmlspecialchars($username) ?>">

        <input type="password" id="loginPassword" name="password"
               placeholder="Enter Password">

        <label class="checkbox-label">
            <input type="checkbox" name="remember" value="1" <?= $rememberChecked ? 'checked' : '' ?>>
            Remember me
        </label>

        <input type="submit" class="btn" value="Login">

        <p id="loginSuccess" class="success-msg"></p>

        <div class="secondary-btns">
            <input type="button" value="Forgot Password" onclick="window.location.href='Forgotpassword.php'">
            <input type="button" value="Sign Up" onclick="window.location.href='UserSignup.php'">
        </div>

    </form>

    <input type="button" value="Back to Home" class="btn" onclick="window.location.href='Homepage.php'">
</div>

<script src="../JS/UserLogin.js"></script>
</body>
</html>
