<?php
$rooms = [
    101 => [
        "name" => "Room 101 Deluxe",
        "price" => 2000,
        "status" => "available",
        "features" => "Wi-Fi, Balcony",
        "image" => "../Image/Room101.jpg"
    ],
    102 => [
        "name" => "Room 102 Single",
        "price" => 3500,
        "status" => "booked",
        "features" => "Wi-Fi, Air Conditioning",
        "image" => "../Image/Room102.jpg"
    ],
    103 => [
        "name" => "Room 103 Suite",
        "price" => 6000,
        "status" => "available",
        "features" => "Wi-Fi, Air Conditioning, Balcony",
        "image" => "../Image/Room103.jpg"
    ],
    104 => [
        "name" => "Room 104 Double",
        "price" => 4000,
        "status" => "booked",
        "features" => "Wi-Fi, Air Conditioning",
        "image" => "../Image/Room104.jpg"
    ]
];


if (!isset($_GET['id']) || !isset($rooms[$_GET['id']])) {
    echo "<h2>Invalid room selected</h2>";
    echo "<a href='Inventory.php'>Back </a>";
    exit;
}

$roomNo = $_GET['id'];
$room = $rooms[$roomNo];


if ($room['status'] !== 'available') {
    echo "<h2>This room is already booked</h2>";
    echo "<a href='Inventory.php'>Back</a>";
    exit;
}


$successMsg = "";
$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $checkin = $_POST['checkin_date'] ?? '';
    $nights  = $_POST['nights'] ?? 0;

    if (empty($checkin) || $nights < 1) {
        $errorMsg = " Please fill all fields correctly.";
    } else {
        $successMsg = " Your room has been booked.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $room['name']; ?></title>
    <link rel="stylesheet" href="../CSS/RoomDetails.css">
</head>
<body>

<div class="container">
    <h1><?= $room['name']; ?></h1>

    <img src="<?= $room['image']; ?>" alt="Room <?= $roomNo; ?>">

    <p><strong>Price Per Night:</strong> TK <?= number_format($room['price'], 2); ?></p>

    <p>
        <strong>Status:</strong>
        <span class="badge available">Available</span>
    </p>

    <p><strong>Features:</strong> <?= $room['features']; ?></p>

    
    <?php if ($successMsg): ?>
        <p class="success"> <?= $successMsg; ?>
        </p>
    <?php elseif ($errorMsg): ?>
        <p class="error"><?= $errorMsg; ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Check-In Date</label>
        <input type="date" name="checkin_date" id="checkin_date" required>

        <label>Nights</label>
        <input type="number" name="nights" id="nights" min="1" value="1" required>

        <label>Check-Out Date</label>
        <input type="date" id="checkout_date" readonly>

        <p id="totalCost" class="total">
            Total: TK <?= number_format($room['price'], 2); ?>
        </p>

        <button type="submit">Confirm Booking</button>
    </form>

    <a class="back-btn" href="Inventory.php">Back</a>
</div>

<script>
const ROOM_PRICE = <?= $room['price']; ?>;

function updateBooking() {
    const nights = parseInt(document.getElementById('nights').value) || 0;
    const checkin = document.getElementById('checkin_date').value;

    const total = nights * ROOM_PRICE;
    document.getElementById('totalCost').innerText =
        "Total: TK " + total.toFixed(2);

    if (checkin && nights > 0) {
        const d = new Date(checkin);
        d.setDate(d.getDate() + nights);
        document.getElementById('checkout_date').value =
            d.toISOString().split('T')[0];
    }
}

document.getElementById('nights').addEventListener('change', updateBooking);
document.getElementById('checkin_date').addEventListener('change', updateBooking);
updateBooking();
</script>

</body>
</html>
