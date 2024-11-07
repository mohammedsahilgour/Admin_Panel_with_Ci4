<!DOCTYPE html>
<html lang="en">
<!-- coding by Gogila._ -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-Up/Login Form | @Gogila._</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="<?php echo base_url('css/login.css')?>">
</head>

<body>
  <div class="wrapper">
    <form action="<?php echo base_url('loginvalidate')?>" method="POST">

    <div class="login-box">
      <div class="login-header">
        <span>Login</span>
      </div>
      <?php     echo    validation_list_errors();?>
      <div class="input_box">
        <input type="email" id="user" class="input-field" name="email">
        <label for="user" class="label">Email</label>
        <i class="bx bx-user icon"></i>
      </div>
      <div class="input_box">
        <input type="password" id="pass" class="input-field" name="password"  oninput="checkPasswordStrength(this.value)">
        <label for="pass" class="label">Password</label>
        <i class="bx bx-lock-alt icon" id="togglePassword"></i>
      </div>
      <div id="passwordStrength" class="password-strength"></div>

   
      <div class="input_box">
        <input type="submit" class="input-submit" value="Login" onclick="handleLogin()">
      </div>
      <div class="register">
        <span>Don't have an account ? <a href="<?php echo base_url('/')?>">Register</a></span>
      </div>
    </div>
  </div>

 
      </div>
    </div>
  </div>

  </form>
    </div>
  </div>

  <script src="script.js"></script>
</body>

</html>