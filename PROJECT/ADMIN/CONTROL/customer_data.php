control customer 
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

?>
