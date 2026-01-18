<?php
session_start();

/* =========================
   PART 1: PAGE LOAD (GET)
   ========================= */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $username = "";
    $rememberChecked = false;

    if (isset($_COOKIE['remember_user'])) {
        $username = $_COOKIE['remember_user'];
        $rememberChecked = true;
    }

    // VERY IMPORTANT
    // Do NOT echo or exit here
}

/* =========================
   PART 2: AJAX LOGIN (POST)
   ========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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

    // Demo credentials
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
        exit;
    } else {
        echo "Invalid username or password!";
        exit;
    }
}
