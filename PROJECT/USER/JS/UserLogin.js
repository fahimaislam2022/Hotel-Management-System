function loginUser() {

    const username = document.getElementById("loginUsername").value.trim();
    const password = document.getElementById("loginPassword").value;
    const remember = document.querySelector('input[name="remember"]:checked') ? '1' : '0';
    const statusMsg = document.getElementById("loginSuccess");

    // Empty field check
    if (username === "" || password === "") {
        alert("All fields are required!");
        return;
    }

    // Length validation
    if (username.length <= 3) {
        alert("Username must be greater than 3 characters!");
        return;
    }

    if (password.length <= 4) {
        alert("Password must be greater than 4 characters!");
        return;
    }

    const params =
        "username=" + encodeURIComponent(username) +
        "&password=" + encodeURIComponent(password) +
        "&remember=" + encodeURIComponent(remember);

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../CONTROL/loginCheck.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {

            if (this.responseText.trim() === "success") {
                statusMsg.innerHTML = "Login successful!";
                setTimeout(() => {
                    window.location.href = "userdashboard.php";
                }, 1000);
            } else {
                alert(this.responseText);
            }
        }
    };

    xhttp.send(params);
}
