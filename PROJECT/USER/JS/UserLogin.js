function loginUser() {
    const btn = document.querySelector('.btn[type="submit"]');
    const statusMsg = document.getElementById('loginSuccess');
   
    const isUValid = checkLoginUsername();
    const isPValid = checkLoginPassword();

    const username = document.getElementById('loginUsername').value.trim();
    const password = document.getElementById('loginPassword').value;
    const remember = document.querySelector('input[name="remember"]:checked') ? '1' : '0';
    
    
    if(!isUValid || !isPValid) return;

    
    btn.value = "Logging in...";
    btn.disabled = true;

   
    const params = "username=" + encodeURIComponent(username) + 
                   "&password=" + encodeURIComponent(password) + 
                   "&remember=" + encodeURIComponent(remember);

    const xhttp = new XMLHttpRequest();
    
    
    xhttp.open('POST', '../CONTROL/loginCheck.php', true);
    
  
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            btn.value = "Login";
            btn.disabled = false;
            
            if (this.status == 200) {
                const response = this.responseText.trim();
                
                if (response === 'user_success') {
                    window.location.href = 'userdashboard.php';
                } else {
                 
                    statusMsg.innerHTML = response;
                }
            } else {
                statusMsg.innerHTML = "Connection error. Try again.";
            }
        }
    };

    xhttp.send(params);
}