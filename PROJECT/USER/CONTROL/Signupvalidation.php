<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $email === '' || $password === '') {
        echo "All fields are required.";
        exit;
    }

    if (strlen($username) < 3) {
        echo "Username must be at least 3 characters.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    if (strlen($password) < 4) {
        echo "Password must be at least 4 characters.";
        exit;
    }

    // (Database insert would go here)

    $_SESSION['status'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = "User";

    echo "success";
    exit;
}


