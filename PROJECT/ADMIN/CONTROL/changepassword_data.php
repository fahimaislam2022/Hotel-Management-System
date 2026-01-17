<?php
session_start();
include("../MODEL/db.php");

$msg = "";
$msgType = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $current_pass = $_POST['current_password'];
    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];

    if ($new_pass !== $confirm_pass) {
        $msg = "New Password and Confirm Password do not match.";
        $msgType = "error";
    } else {
        $sql = "SELECT password FROM admin WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $db_pass = $row['password'];

            if (password_verify($current_pass, $db_pass)) {
                $new_hashed = password_hash($new_pass, PASSWORD_DEFAULT);
                $update = "UPDATE admin SET password='$new_hashed' WHERE username='$username'";

                if ($conn->query($update) === TRUE) {
                    $msg = "Password updated successfully!";
                    $msgType = "success";
                } else {
                    $msg = "Error updating password: " . $conn->error;
                    $msgType = "error";
                }
            } else {
                $msg = "Current password is incorrect.";
                $msgType = "error";
            }
        } else {
            $msg = "Admin user not found.";
            $msgType = "error";
        }
    }
}

$_SESSION['msg'] = $msg;
$_SESSION['msgType'] = $msgType;

header("Location: ../VIEW/changepassword.php");
exit();
?>
