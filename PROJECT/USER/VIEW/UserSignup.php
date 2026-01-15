<?php include('../CONTROL/Signupvalidation.php');?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="../CSS/UserSignUp.css">
</head>
<body>
    <div class ="signup-box">
    
        <h1>Create Your Account</h1>
 
        <?php if(!empty($errorMsg)):?>
                <p class ="error-banner"><?= htmlspecialchars($errorMsg) ?></p>
                <?php endif;?>
                <form id ="signupForm">
                        <div class ="input-group">
                <input type ="text" id="signupUsername" name="username" placeholder="Username" onblur="checkSignupUsername()">                
              <p id="signupUError" class="error-msg"></p>
        </div>

        <div class ="input-group">
                <input type ="email" id="signupEmail" name="email" placeholder="Email" onblur="checkSignupEmail()">                
              <p id="signupEError" class="error-msg"></p>
        </div>

        <div class="input-group">
            <input type="password" id="signupPassword" name="password" placeholder="Password" onblur="checkSignupPassword()">
            <p id="signupPError" class="error-msg"></p>
        </div>

        <input type="button" class="btn" value="Sign Up" onclick="signupUser()">
        <p id="signupSuccess" class="success-msg"></p>
    </form>

    <div>
        <a href= "UserLogin.php" class ="secondary-link">Already have an account? Login</a>
<button type="button" class="back-home-btn" onclick="window.location.href='Homepage.php'">Back to Home</button>
    </div>
    </div>

    <script src ="../JS/Signup.js"></script>


</body>
</html>