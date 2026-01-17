<?php
include("../MODEL/db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    $id_customer = $_POST['id_customer'];
    $room_number = $_POST['room_number'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $status = "Confirmed";

    
    $priceQuery = $conn->query("SELECT price FROM rooms WHERE room_number='$room_number'");
    $roomData = $priceQuery->fetch_assoc();
    $pricePerNight = $roomData['price'];

    
    $days = (strtotime($checkout_date) - strtotime($checkin_date)) / (60 * 60 * 24);
    if ($days <= 0) $days = 1;

    $amount = $days * $pricePerNight;

   
    $sql = "INSERT INTO bookings (room_number, id_customer, checkin_date, checkout_date, status, amount)
            VALUES ('$room_number', '$id_customer', '$checkin_date', '$checkout_date', '$status', '$amount')";
    
    if ($conn->query($sql)) {
        header("Location: ../VIEW/booking.php?msg=added");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
