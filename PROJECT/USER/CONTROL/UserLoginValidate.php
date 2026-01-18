<?php
session_start();

// Initialize variables
$errorMsg = "";
$username = "";

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? "");
    $password = $_POST['password'] ?? "";
    $remember = $_POST['remember'] ?? "";

    // Validation
    if ($username === "" || $password === "") {
        $errorMsg = "Please fill in all fields!";
    } elseif (strlen($username) < 3) {
        $errorMsg = "Username must be at least 3 characters!";
    } elseif (strlen($password) < 4) {
        $errorMsg = "Password must be at least 4 characters!";
    } else {
        // Demo credentials
        $validUser = "admin";
        $validPass = "admin123";

        if ($username === $validUser && $password === $validPass) {
            // Set session
            $_SESSION['username'] = $username;

            // Set cookie if "remember me" checked
            if ($remember === "1") {
                setcookie("remember_user", $username, time() + (86400 * 7), "/");
            } else {
                setcookie("remember_user", "", time() - 3600, "/");
            }

            // Redirect to dashboard
            header("Location: UserDashboard.php");
            exit;
        } else {
            $errorMsg = "Invalid username or password!";
        }
    }
}

// If error, show form again with error
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="../CSS/UserLogin.css">
</head>
<body>

<div class="login-box">
    <h1>Login Now!</h1>

    <?php if ($errorMsg !== ""): ?>
        <p style="color:red; text-align:center;"><?= htmlspecialchars($errorMsg) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="username" placeholder="Enter Username" value="<?= htmlspecialchars($username) ?>">
        <input type="password" name="password" placeholder="Enter Password">

        <label>
            <input type="checkbox" name="remember" value="1" <?= isset($remember) && $remember === "1" ? "checked" : "" ?>>
            Remember me
        </label>

        <input type="submit" value="Login">

        <div class="secondary-btns">
            <input type="button" value="Forgot Password" onclick="window.location.href='Forgotpassword.php'">
            <input type="button" value="Sign Up" onclick="window.location.href='UserSignup.php'">
        </div>
    </form>

    <input type="button" value="Back to Home" onclick="window.location.href='Homepage.php'">
</div>

</body>
</html>
