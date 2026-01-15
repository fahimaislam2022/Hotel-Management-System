<?php 
session_start();
$err1 ="";
$err2="";
if(isset($_GET['error'])){
    $error = $_GET['error'];
    if($error==="Invalid"){
        $err1 =" Please Type Valid Username and Password!";
    }
    elseif($error==="badrequest"){
        $err2="Please Login";
    }
}
//cookie
$username = isset($_COOKIE['remember_user'])?$_COOKIE['remember_user']:"";
$rememberChecked = isset($_COOKIE['remember_user'])?true:false;
?>