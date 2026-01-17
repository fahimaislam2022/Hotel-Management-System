<?php
include("../MODEL/db.php");

if (isset($_POST['action']) && $_POST['action'] == "update_status") {
    $room_number = $_POST['room_number'];
    $cleaning_status = $_POST['cleaning_status'];

    $sql = "UPDATE rooms SET cleaning_status = '$cleaning_status' WHERE room_number = $room_number";
    if ($conn->query($sql)) {
        header("Location: ../VIEW/housekeeping.php?msg=updated");
        exit();
    } else {
        header("Location: ../VIEW/housekeeping.php?error=failed");
        exit();
    }
}

$rooms = $conn->query("SELECT * FROM rooms ORDER BY room_number ASC");
?>
