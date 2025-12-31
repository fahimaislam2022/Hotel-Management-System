<!DOCTYPE html>
<head>
  <title>HMS Admin Login</title>
</head>
<body>
  <div class="container">
    <div class="image-section">
      <div class="image-content">
     </div>
     </div>

    <div class="form-section">
      <div class="form-card">
        <div class="form-header">
          <h1>Welcome Back</h1>
          <span>Please enter your credentials</span>
        </div>

        <form id="loginForm" method="post" action="">
          <?php if (isset($error)) { ?>
            <p class="message"><?php echo $error; ?></p>
          <?php } ?>

          <div class="form-group">
            <label>Username</label>
            <div class="input-wrapper">
              <input type="text" id="username" name="username" 
                     value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>" />
            </div>
            <p id="userError" class="error"></p>
          </div>

          <div class="form-group">
            <label>Password</label>
            <div class="input-wrapper">
              <input type="password" id="password" name="password"
                     value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" />
            </div>
            <p id="passError" class="error"></p>
          </div>

          <div class="checkbox-group">
            <input type="checkbox" name="remember" id="remember" 
                   <?php if(isset($_COOKIE['username'])) echo "checked"; ?>>
            <label for="remember">Remember Me</label>
          </div>

          <button type="submit" name="submit" id="loginBtn">Login</button>
        </form>

        <div class="links">
          <a href="changePassword.php">Change Password</a>
        </div>
      </div>
    </div>
  </div> 
</body>
</html>