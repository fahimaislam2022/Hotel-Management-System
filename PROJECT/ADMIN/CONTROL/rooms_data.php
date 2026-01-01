<?php
include("../MODEL/db.php");

$conn->query("
    UPDATE rooms 
    SET status = 'Occupied'
    WHERE room_number IN (
        SELECT room_number FROM bookings WHERE status = 'Confirmed'
    )
");

if (isset($_POST['action']) && $_POST['action'] === "add") {
    $type = $_POST['type'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $imageName = '';

    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/$imageName");
    }

    $sql = "INSERT INTO rooms (type, status, price, image)
            VALUES ('$type', '$status', '$price', '$imageName')";
    if ($conn->query($sql)) {
        header("Location: ../VIEW/rooms.php?msg=added");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_POST['action']) && $_POST['action'] === "edit") {
    $room_number = $_POST['room_number'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    
    $check = $conn->query("
        SELECT status FROM bookings 
        WHERE room_number = $room_number 
        AND status = 'Confirmed'
    ");

    if ($check->num_rows > 0) {
        
        header("Location: ../VIEW/rooms.php?error=status_locked");
        exit();
    }

    
    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/$imageName");
        $sql = "UPDATE rooms 
                SET type='$type', price='$price', status='$status', image='$imageName'
                WHERE room_number=$room_number";
    } else {
        $sql = "UPDATE rooms 
                SET type='$type', price='$price', status='$status'
                WHERE room_number=$room_number";
    }

    if ($conn->query($sql)) {
        header("Location: ../VIEW/rooms.php?msg=updated");
        exit();
    } else {
        echo "Error updating: " . $conn->error;
    }
}

if (isset($_GET['delete'])) {
    $room_number = $_GET['delete'];

    $check = $conn->query("
        SELECT status FROM bookings 
        WHERE room_number = $room_number 
        AND status = 'Confirmed'
    ");

    if ($check->num_rows > 0) {
       
        header("Location: ../VIEW/rooms.php?error=delete_locked");
        exit();
    }

    $conn->query("DELETE FROM rooms WHERE room_number = $room_number");
    header("Location: ../VIEW/rooms.php?msg=deleted");
    exit();
}

$rooms = $conn->query("
    SELECT r.*, b.status AS booking_status
    FROM rooms r
    LEFT JOIN bookings b 
        ON r.room_number = b.room_number 
        AND b.status = 'Confirmed'
    ORDER BY r.room_number ASC
");
?>

