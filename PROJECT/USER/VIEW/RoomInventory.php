<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Rooms</title>
    <script>
        function submitFilters() {
            document.getElementById('filterForm').submit();
        }

        function resetFilters() {
            document.getElementById('filterForm').reset();submitFilters();
        }
        </script>
         <link rel="stylesheet" href="../CSS/RoomInventory.css">
</head>
<body>
    <h1>Room Inventory</h1>

    <form method="POST" action ="">
        <div class ="filters">
            <select name ="type" onchange ="submitFilters">
           <option value ="">Room Type </option>
           <option value ="1">Single </option>
           <option value ="2">Double </option>
           <option value ="3">Suite </option>
    </select>

    <select name ="feature" onchange ="submitFilters">
           <option value ="">Features </option>
           <option value ="1">Wi-fi </option>
           <option value ="2">Air Conditioning </option>
           <option value ="3">Balcony </option>
    </select>

  <select name="price" onchange="submitFilters()">
            <option value="">Price </option>
            <option value="0-2000">0-2000</option>
            <option value="2001-4000">2001-4000</option>
            <option value="4001-6000">4001-6000</option>
            <option value="6001-10000">6001-10000</option>
        </select>
       
        
    </div>
    </form>

<div class="grid">
    
    <div class="room-card">
        <img src="" alt="Room 101">
        <div class="room-card-content">
            <h3>Room 101 — Single</h3>
            <p class="price">TK 2000.00</p>
            <p><span class="badge available">Available</span></p>
            <p><strong>Features:</strong> Wi-Fi, Balcony</p>
            <button class="btn" onclick="window.location.href='RoomBooking101.php'">View Details</button>
        </div>
    </div>

    <div class="room-card">
        <img src="" alt="Room 102">
        <div class="room-card-content">
            <h3>Room 102 — Double</h3>
            <p class="price">TK 3500.00</p>
            <p><span class="badge booked">Booked</span></p>
            <p><strong>Features:</strong> Wi-Fi, Air Conditioning</p>
            <button class="btn" onclick="window.location.href='BookRoom.php?id=102'">View Details</button>
        </div>
    </div>

 
</div>



<button class="btn secondary back-btn" onclick="window.location.href='userdashboard.php'">Back to Dashboard</button>
   

    
</body>
</html>