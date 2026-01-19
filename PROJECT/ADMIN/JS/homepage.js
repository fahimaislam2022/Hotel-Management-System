
document.getElementById("feedbackForm").addEventListener("submit", function(e) {
    e.preventDefault();

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var response = JSON.parse(this.responseText);
            document.getElementById("feedbackResult").innerText = response.message;
            document.getElementById("feedbackForm").reset();
        }
    };

    xhttp.open("POST", "feedback.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");

    xhttp.send(JSON.stringify({
        name: name,
        email: email,
        message: message
    }));
});
