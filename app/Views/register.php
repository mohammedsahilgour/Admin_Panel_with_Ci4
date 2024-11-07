<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('css/register.css')?>">
    <title> Reistration Form</title>
</head>
<body>

    <form  method="POST" action="<?php echo base_url('registerform')?>">
     
        <div class="container">
          <h1>Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
   
            <label for="email"><b>Username</b></label>
            <input type="text" name="name" placeholder="Enter Username" >
            <?php
              $check = validation_list_errors() ;
              print_r($check);
            ?>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" >
          
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" >
      
            <label for="email"><b>Phone Number</b></label>
            <br>
           
           <input type="number" name="number" placeholder="Enter contact" ><br>

         <span> already sign up</span>  <a href="<?php echo base_url('login')?>" class="login">Log in </a><br>

      
          <div class="clearfix"><br>
      
            <button type="submit" class="btn">Sign Up</button>
          </div>
        </div>
      </form>

  <div class="youtubeBtn">

    </a>

</div>
</body>
</html>