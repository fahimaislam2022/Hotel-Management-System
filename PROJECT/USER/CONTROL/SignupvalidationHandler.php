<?php
session_start();
include "db.php"; 

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit;
}

$username = trim($_POST["username"] ?? '');
$email    = trim($_POST["email"] ?? '');
$password = $_POST["password"] ?? '';

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


$hashPassword = password_hash($password, PASSWORD_DEFAULT);


$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
if (!$stmt) {
    echo "Database error: prepare failed.";
    exit;
}

$stmt->bind_param("sss", $username, $email, $hashPassword);

if ($stmt->execute()) {
    $_SESSION['status'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = "User";
    echo "success";
} else {
    echo "Username or email already exists.";
}

$stmt->close();
$conn->close();
