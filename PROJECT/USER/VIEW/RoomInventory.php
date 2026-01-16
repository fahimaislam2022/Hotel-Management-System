<?php
$rooms = [
    101 => [
        "type" => "Single",
        "price" => 2000,
        "status" => "available",
        "features" => "Wi-Fi, Balcony",
        "image" => "../Image/Room101.jpg"
    ],
    102 => [
        "type" => "Single",
        "price" => 3500,
        "status" => "booked",
        "features" => "Wi-Fi, Air Conditioning",
        "image" => "../Image/Room102.jpg"
    ],
    103 => [
        "type" => "Suite",
        "price" => 6000,
        "status" => "available",
        "features" => "Wi-Fi, AC, Balcony",
        "image" => "../Image/Room103.jpg"
    ],
    104 => [
        "type" => "Double",
        "price" => 4000,
        "status" => "booked",
        "features" => "Wi-Fi, AC",
        "image" => "../Image/Room104.jpg"
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Room Inventory</title>
    <link rel="stylesheet" href="../CSS/RoomInventory.css">
</head>
<body>

<h1>Room Inventory</h1>

<div class="grid">
<?php foreach ($rooms as $roomNo => $room): ?>
    <div class="room-card">
        <img src="<?= $room['image']; ?>" alt="Room <?= $roomNo; ?>">

        <div class="room-card-content">
            <h3>Room <?= $roomNo; ?> — <?= $room['type']; ?></h3>
            <p class="price">TK <?= number_format($room['price'], 2); ?></p>

            <p>
                <span class="badge <?= $room['status']; ?>">
                    <?= ucfirst($room['status']); ?>
                </span>
            </p>

            <p><strong>Features:</strong> <?= $room['features']; ?></p>

            <button class="btn"
                onclick="window.location.href='RoomDetails.php?id=<?= $roomNo; ?>'">
                View Details
            </button>
        </div>
    </div>
<?php endforeach; ?>
</div>

<button class="btn secondary back-btn"
onclick="window.location.href='UserDashboard.php'">
Back to Dashboard
</button>

</body>
</html>
