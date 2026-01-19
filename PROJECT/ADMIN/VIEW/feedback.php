<?php
include("../MODEL/db.php");
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$email = $data['email'];
$message = $data['message'];

$sql = "INSERT INTO feedback (name, email, message)
        VALUES ('$name', '$email', '$message')";

if ($conn->query($sql)) {
    echo json_encode([
        "success" => true,
        "message" => "Thank you! Your feedback has been saved."
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Failed to save feedback."
    ]);
}
?>