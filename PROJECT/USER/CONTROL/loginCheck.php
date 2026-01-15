<?php
session_start();


if (isset($_POST['username']) && isset($_POST['password'])) {
    
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $remember = $_POST['remember']; 

  
    if ($username === "Sinthiaaa" && $password === "1234") {
        
       
        $_SESSION['user'] = $username;
        $_SESSION['status'] = true;

       
        if ($remember === '1') {
            
            setcookie('remember_user', $username, time() + (86400 * 30), "/");
        } else {
           
            setcookie('remember_user', '', time() - 3600, "/");
        }

       
        echo "user_success";
        
    } else {
        
        echo "Invalid Username or Password!";
    }

} else {
    echo "Bad Request: No data received.";
}
?>