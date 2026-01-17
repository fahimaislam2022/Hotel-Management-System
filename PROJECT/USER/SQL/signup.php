<?php
require_once('../VIEW/UserSignup.php')
include('../MODEL/DatabaseConnection.php')

include "db.php";
 
$success=$error="";
if($_SERVER["REQUEST_METHOD"]== "POST")
{
$username=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];
 
if(empty($username)||empty($password)||empty($email))
{
$error="All the field must be fill_up";
}
 
else{
$hassPassword= password_hash($password,PASSWORD_DEFAULT);
 
$sql= "INSERT INTO users(username,password,email) VALUES ('$username','$hassPassword','$email')";
if($conn->query($sql))
{
    $success="Registration Complete you can do the login";
}
 
else{
 
    $error = "Error: .".$conn->error;
}
 
 
}
 
 
 
}
 


?>