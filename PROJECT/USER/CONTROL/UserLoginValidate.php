<?php
$username = "";
$rememberChecked = false;

if (isset($_COOKIE['remember_user'])) {
    $username = $_COOKIE['remember_user'];
    $rememberChecked = true;
}
