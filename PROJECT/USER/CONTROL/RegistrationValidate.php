<?php
$fname=$lname=$number=$email=$password=$cpassword="";
$fnameError=$lnameError=$numberError=$emailError=$passwordError=$confirmError="";
$successMessage = "";
function test_input($data)
{
    $data = trim($data);
return $data;
}



if($_SERVER["REQUEST_METHOD"]=="POST"){

//firstname
$fname=$_POST["fname"];
if(empty($fname)){
$fnameError="First name is required";
}
elseif (!preg_match("/^[A-Z][a-zA-Z]+$/",$fname)){
    $fnameError="Must start with uppercase and have atleast 2 letters";
}

//lastname 
$lname=$_POST["lname"];
if(empty($lname)){
$lnameError="Last name is required";
}
elseif (!preg_match("/^[A-Z][a-zA-Z]+$/",$lname)){
    $lnameError="Must start with uppercase and have atleast 2 letters";
}

//phone
$number=$_POST["number"];
if(empty($number)){
    $numberError="Phone number is required";
}
elseif(!preg_match("/^[0-9]{11}$/",$number)){
    $numberError="Must be 11 digits";
}

//email
$email=$_POST["email"];
if(empty($email)){
    $emailError="Email is required";
}
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $emailError="Invalid format";
}

//password
$password=$_POST["password"];
$pwdPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
if (empty($password)){
    $passwordError="Password is required";
}
elseif(!preg_match($pwdPattern,$password)){
    $passwordError ="Not strong password";
}

//confirm password
$cpassword=$_POST["cpassword"];
if(empty($cpassword)){
    $confirmError="Please confirm your password";
}

elseif($password !== $cpassword){

    $confirmError="Password doesn't match";
}



if(empty($fnameError)&& empty($lnameError)&&empty($numberError)&& empty($emailError)&& empty($passwordError)&& empty($confirmError))
{
    $successMessage="Registration is done";
    echo"<h2>".$successMessage."</h2>";
    include 'Registration.php';
}
else{
    include 'Registration.php';
}

}

?>