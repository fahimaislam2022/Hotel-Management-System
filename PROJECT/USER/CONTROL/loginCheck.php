<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request!";
    exit;
}

$username = trim($_POST['username'] ?? "");
$password = $_POST['password'] ?? "";
$remember = $_POST['remember'] ?? "0";

if ($username === "" || $password === "") {
    echo "All fields are required!";
    exit;
}

if (strlen($username) <= 3 || strlen($password) <= 4) {
    echo "Invalid username or password length!";
    exit;
}


$validUser = "admin";
$validPass = "admin123";

if ($username === $validUser && $password === $validPass) {

    $_SESSION['username'] = $username;

   
    if ($remember === "1") {
        setcookie("remember_user", $username, time() + (86400 * 7), "/");
    } else {
        setcookie("remember_user", "", time() - 3600, "/");
    }

    echo "success";
} else {
    echo "Invalid username or password!";
}
