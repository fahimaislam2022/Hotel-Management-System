<?php include('../CONTROL/UserLoginValidate.php');?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
     <link rel="stylesheet" href="../CSS/UserLogin.css">
</head>
<body>
<div class ="login-box">
    <h1>Login Now! </h1>
    <?php if (isset($_GET['success']) && $_GET['success']==='registered'):?>
        <p class ="success message">Please Login!</p>
        <?php endif;?>
    <form id ="Login" onsubmit ="event.preventDefault(); UserLogin();">

    <?php if ($err2): ?>
            <p class="error-msg"><?= htmlspecialchars($err2) ?></p>
        <?php endif; ?>
        
        <?php if ($err1): ?>
            <p class="error-msg"><?= htmlspecialchars($err1) ?></p>
        <?php endif; ?>

        <input type="text" id="loginUsername" name="username"
               placeholder="Enter Username"
               value="<?= htmlspecialchars($username) ?>"
               onblur="checkLoginUsername()" />
        <p id="loginUError" class="error-msg"></p>

        <input type="password" id="loginPassword" name="password"
               placeholder="Enter Password"
               onblur="checkLoginPassword()" />
        <p id="loginPError" class="error-msg"></p>

        <label class="checkbox-label">
            <input type="checkbox" name="remember" value="1" <?= $rememberChecked ? 'checked' : '' ?>> Remember me
        </label>

        <input type="submit" class="btn" value="Login"  />
        
        <p id="loginSuccess" class="error-msg"></p>

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