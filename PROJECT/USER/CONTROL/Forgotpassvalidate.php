<?php

$newpassword = $confirmpassword ="";
$newpasswordError = $confirmpasswordError ="";
$successmessage ="";


function test_input ($data){
    $data = trim($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

//new pass
if(empty($_POST["newpassword"])){
   $newpasswordError ="New password is required";
}

else{
$newpassword = test_input($_POST["newpassword"]);
if(strlen($newpassword)<8){
    $newpasswordError = "Must be 8 character";
}
elseif(!preg_match("/[A-Z]/",$newpassword)){
    $newpasswordError = "Must have a uppercase letter";
}
elseif(!preg_match("/[a-z]/",$newpassword)){
    $newpasswordError = "Must have a lowercase letter";
}
elseif(!preg_match("/[0-9]/",$newpassword)){
    $newpasswordError = "Must have a digit";
}

elseif(!preg_match("/[\W]/",$newpassword)){
    $newpasswordError = "Must have a special character";
}

}

//confirm pass
if(empty($_POST["confirmpassword"])){


    $confirmpasswordError = "Please confirm your password";
}

else {
$confirmpassword = test_input($_POST["confirmpassword"]);
if($newpassword!== $confirmpassword){
    $confirmpasswordError = "Passwords do not match";
}
}

//success message
if (empty ($newpasswordError ) && empty($confirmpasswordError)){
$successmessage = "Password Changed";


}


}
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameError) && empty($emailError) && empty($dateofbirthError))
{
    echo "<h2>Your Input:</h2>";
    echo "New password: $newpassword <br>";
    echo "Confirm Password:  $confirmpassword <br>";
    
}





?>