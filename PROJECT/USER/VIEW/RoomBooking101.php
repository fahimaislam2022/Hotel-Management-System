<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Book</title>
    <link rel="stylesheet" href="../CSS/RoomBooking101.css">
</head>
<body>

<div class ="container">
    <h1> Room 101_Delux </h1>
    <img src = "" alt ="Room image">
<p><strong>Price Per Night : </strong> TK 3500.00</p>
<p>Status:</strong>
<span class ="badge available" >Available</span>
</p>

<p><strong>Features:</strong>Wi-fi,Air Conditioning ,Balcony</p>

<form method ="POST" action ="">
    <label>CheckIn Date</label>
    <input type ="date" id ="checkin_date" >

     <label>Nights</label>
    <input type ="number" id ="nights" min="1" value="1" >

     <label>CheckOut Date</label>
    <input type ="date" id ="checkout_date" >


<p id ="totalcost" class="total">Total:Tk 3500.00</p>
<button type ="submit">Confirm Booking </button>


</form>

<a class ="back-btn" href="RoomInventory.php"> Back</a>
</div>

<script>
    const ROOM_PRICE = 3500;
    function updateBooking(){
        const night= parseInt(document.getElementById('nights').value)||0;
        const checkin=document.getElementById('checkin_date').value;


const total = nights * ROOM_PRICE;
 document.getElementById('totalCost').innerText ="Total: TK " + total.toFixed(2);

if (checkin && nights > 0)
{
    const d = new Date(checkin);
    d.setDate(d.getDate()+nights);
    document.getElementById('checkout_date').value= d.toISOString().split('T')[0];


}
    }
document.getElementById('nights').addEventListner('change',updateBoking);
document.getElementById('checkin_date').addEventListner('change',updateBoking);
updateBooking();
</script>


    
</body>
</html>