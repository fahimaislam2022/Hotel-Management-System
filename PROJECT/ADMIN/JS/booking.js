
document.addEventListener("DOMContentLoaded", function () {
    const checkin = document.getElementById("checkin_date");
    const checkout = document.getElementById("checkout_date");
    const today = new Date().toISOString().split("T")[0];
    checkin.min = today;

    checkin.addEventListener("change", function () {
        
        checkout.min = checkin.value;

        if (checkout.value && checkout.value <= checkin.value) {
            alert("Check-out date must be after check-in date.");
            checkout.value = "";
        }
    });

    checkout.addEventListener("change", function () {
        if (checkout.value <= checkin.value) {
            alert("Check-out date must be after check-in date.");
            checkout.value = "";
        }
    });
});

