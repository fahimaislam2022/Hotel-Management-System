<?php
include("../MODEL/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $booking_id = $_POST['booking_id'];
    $new_status = $_POST['status'];

    $sql = "UPDATE bookings SET status = '$new_status' WHERE id_booking = '$booking_id'";
    if ($conn->query($sql)) {
        header("Location: ../VIEW/billing.php?msg=updated");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}


$sql = "
    SELECT 
        b.id_booking, b.room_number, b.checkin_date, b.checkout_date, b.status, b.amount, 
        c.name, c.email
    FROM bookings b
    JOIN customers c ON b.id_customer = c.id_customer
    ORDER BY b.id_booking DESC
";
$result = $conn->query($sql);
?>
