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

    const username = encodeURIComponent(document.getElementById('signupUsername').value.trim());
    const email = encodeURIComponent(document.getElementById('signupEmail').value.trim());
    const password = encodeURIComponent(document.getElementById('signupPassword').value);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../CONTROL/SignupvalidationHandler.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        const msg = document.getElementById('signupSuccess');
        if (this.status === 200) {
            const response = this.responseText.trim();

            if (response === "success") {
                msg.style.color = "green";
                msg.innerHTML = "Signup successful! ";
                setTimeout(() => {
                    window.location.href = "../View/UserDashboard.php";
                }, 1500);
            } else {
                msg.style.color = "red";
                msg.innerHTML = response;
            }
        } else {
            msg.style.color = "red";
            msg.innerHTML = "Server error!";
        }
    };

    xhr.send(`username=${username}&email=${email}&password=${password}`);
}
