<?php
session_start();


$errorMsg = "";
$username = "";
$remember = "";


if (isset($_COOKIE['remember_user'])) {
    $username = $_COOKIE['remember_user'];
    $remember = "1";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? "");
    $password = $_POST['password'] ?? "";
    $remember = $_POST['remember'] ?? "";

   
    if ($username === "" || $password === "") {
        $errorMsg = "Please fill in all fields!";
    } elseif (strlen($username) < 3) {
        $errorMsg = "Username must be at least 3 characters!";
    } elseif (strlen($password) < 4) {
        $errorMsg = "Password must be at least 4 characters!";
    } else {
       
        $validUser = "sinthia";
        $validPass = "sinthia123";

        if ($username === $validUser && $password === $validPass) {
           
            $_SESSION['username'] = $username;

            
            if ($remember === "1") {
                setcookie("remember_user", $username, time() + (86400 * 7), "/");
            } else {
                setcookie("remember_user", "", time() - 3600, "/");
            }

          
            header("Location: UserDashboard.php");
            exit;
        } else {
            $errorMsg = "Invalid username or password!";
        }
    }
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

    <form method="POST" action="">
        <input type="text" name="username" placeholder="Enter Username" value="<?= htmlspecialchars($username) ?>">
        <input type="password" name="password" placeholder="Enter Password">

        <label>
            <input type="checkbox" name="remember" value="1" <?= ($remember === "1") ? "checked" : "" ?>>
            Remember me
        </label>

        <input type="submit" value="Login" class="btn">

        <div class="secondary-btns">
            <input type="button" value="Forgot Password" onclick="window.location.href='Forgotpassword.php'">
            <input type="button" value="Sign Up" onclick="window.location.href='UserSignup.php'">
        </div>
    </form>

    <input type="button" value="Back to Home" onclick="window.location.href='Homepage.php'" class="btn">
</div>

</body>
</html>
