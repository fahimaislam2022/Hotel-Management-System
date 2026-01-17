<?php
$errorMsg = "";
$successMsg = "";

$name = "";
$email = "";
$profileImage = "http://localhost/Web%20tech/Project/USER/Image/edituser.jpg";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST['name'] ?? "");
    $email = trim($_POST['email'] ?? "");

   
    if (empty($name) || empty($email)) {
        $errorMsg = "Name and Email cannot be empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please enter a valid email address";
    } else {

        
        if (!empty($_FILES['avatar']['name'])) {

            $uploadDir = "../UPLOAD/";
            $fileName = time() . "_" . basename($_FILES['avatar']['name']);
            $serverPath = $uploadDir . $fileName;       
            $browserPath = "UPLOAD/" . $fileName;       

            $allowedTypes = ["jpg", "jpeg", "png"];
            $imageType = strtolower(pathinfo($serverPath, PATHINFO_EXTENSION));

            if (!in_array($imageType, $allowedTypes)) {
                $errorMsg = "Only JPG, JPEG, PNG files are allowed";
            } elseif (!move_uploaded_file($_FILES['avatar']['tmp_name'], $serverPath)) {
                $errorMsg = "Failed to upload profile picture";
            } else {
                $profileImage = $browserPath; 
            }
        }

        
        if (empty($errorMsg)) {
            $successMsg = "Profile updated successfully!";
        }
    }
}
?>
