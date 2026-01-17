function checkSignupUsername() {
    const el = document.getElementById('signupUsername');
    const err = document.getElementById('signupUError');

    if (el.value.trim() === "") {
        err.innerHTML = "Username is required!";
    } else if (el.value.length < 3) {
        err.innerHTML = "Minimum 3 characters required!";
    } else {
        err.innerHTML = "";
    }
}

function checkSignupEmail() {
    const email = document.getElementById('signupEmail').value.trim();
    const err = document.getElementById('signupEError');
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (email === "") {
        err.innerHTML = "Email is required!";
    } else if (!regex.test(email)) {
        err.innerHTML = "Invalid email format!";
    } else {
        err.innerHTML = "";
    }
}

function checkSignupPassword() {
    const pass = document.getElementById('signupPassword').value;
    const err = document.getElementById('signupPError');

    if (pass.length < 4) {
        err.innerHTML = "Password must be at least 4 characters!";
    } else {
        err.innerHTML = "";
    }
}

function signupUser() {

    checkSignupUsername();
    checkSignupEmail();
    checkSignupPassword();

    if (
        document.getElementById('signupUError').innerHTML !== "" ||
        document.getElementById('signupEError').innerHTML !== "" ||
        document.getElementById('signupPError').innerHTML !== ""
    ) {
        return;
    }

    const username = document.getElementById('signupUsername').value.trim();
    const email = document.getElementById('signupEmail').value.trim();
    const password = document.getElementById('signupPassword').value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../CONTROL/UserSignup.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (this.status === 200) {
            const response = this.responseText.trim();

            if (response === "success") {
                const msg = document.getElementById('signupSuccess');
                msg.style.color = "green";
                msg.innerHTML = "Signup successful! Redirecting...";

                setTimeout(() => {
                    window.location.href = "../View/UserDashboard.php";
                }, 1500);
            } else {
                document.getElementById('signupSuccess').style.color = "red";
                document.getElementById('signupSuccess').innerHTML = response;
            }
        } else {
            document.getElementById('signupSuccess').innerHTML = "Server error!";
        }
    };

    xhr.send(
        "username=" + encodeURIComponent(username) +
        "&email=" + encodeURIComponent(email) +
        "&password=" + encodeURIComponent(password)
    );
}
