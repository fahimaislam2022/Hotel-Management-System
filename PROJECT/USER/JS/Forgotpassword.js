
function checkPasswordMatch() {
    const password = document.getElementById('newPassword').value;
    const confirm = document.getElementById('confirmPassword').value;
    const errorDisplay = document.getElementById('passError');

    
    if (password.length > 0 && password.length < 6) {
        errorDisplay.innerHTML = "Password must be at least 6 characters long.";
        errorDisplay.style.color = "#e74c3c"; 
        return false;
    }

   
    if (confirm.length > 0 && password !== confirm) {
        errorDisplay.innerHTML = "Passwords do not match.";
        errorDisplay.style.color = "#e74c3c";
        return false;
    }

   
    errorDisplay.innerHTML = "";
    return true;
}


function validatePasswordForm() {
    const password = document.getElementById('newPassword').value;
    const confirm = document.getElementById('confirmPassword').value;
    const errorDisplay = document.getElementById('passError');

    
    if (password === "" || confirm === "") {
        errorDisplay.innerHTML = "Please fill in both password fields.";
        return false;
    }

    
    return checkPasswordMatch();
}