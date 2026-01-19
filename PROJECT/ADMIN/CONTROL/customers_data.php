<?php
include("../MODEL/db.php");


if (isset($_POST['action']) && $_POST['action'] == "add") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $total_visits = $_POST['total_visits'];

    $sql = "INSERT INTO customers (name, email, phone, password, total_visits)
            VALUES ('$name', '$email', '$phone', '$password', '$total_visits')";
    if ($conn->query($sql)) {
        header("Location: ../VIEW/customers.php?msg=added");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
if (isset($_POST['action']) && $_POST['action'] == "edit") {
    $id_customer = $_POST['id_customer'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $total_visits = $_POST['total_visits'];

    
    if (password_get_info($password)['algo'] === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

    $sql = "UPDATE customers 
            SET name='$name', email='$email', phone='$phone', password='$password', total_visits='$total_visits'
            WHERE id_customer=$id_customer";

    if ($conn->query($sql)) {
        header("Location: ../VIEW/customers.php?msg=updated");
        exit();
    } else {
        echo "Error updating: " . $conn->error;
    }
}
if (isset($_GET['delete'])) {
    $id_customer = $_GET['delete'];
    $conn->query("DELETE FROM customers WHERE id_customer=$id_customer");
    header("Location: ../VIEW/customers.php?msg=deleted");
    exit();
}
$customers = $conn->query("SELECT * FROM customers ORDER BY id_customer ASC");
?>
