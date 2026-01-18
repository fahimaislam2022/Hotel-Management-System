<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../VIEW/UserLogin.php");
    exit;
}

$username = trim($_POST['username'] ?? "");
$password = $_POST['password'] ?? "";
$remember = $_POST['remember'] ?? "";


if ($username === "" || $password === "") {
    $_SESSION['errorMsg'] = "Please fill in all fields!";
} elseif (strlen($username) < 3) {
    $_SESSION['errorMsg'] = "Username must be at least 3 characters!";
} elseif (strlen($password) < 4) {
    $_SESSION['errorMsg'] = "Password must be at least 4 characters!";
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

       
        header("Location: ../VIEW/UserDashboard.php");
        exit;
    } else {
        $_SESSION['errorMsg'] = "Invalid username or password!";
    }
}


header("Location: ../VIEW/UserLogin.php");
exit;
