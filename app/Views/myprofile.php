<?php
        include("inc/header.php");
    ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/myprofile.css')?>">

<style>
    /* ------------------- */




/* ----------------- */
/* Fifth */

</style>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
      
<!-- left sider  -->
       
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
        <?php
                    include("inc/navbar.php");
                    ?>
        <?php
             include("inc/leftside.php");
        ?>
          <!-- Navbar -->
          <div class="content-wrapper">
            <!-- Content -->
         
            
             <!-- main content starrt -->
            
          <div class="container-xxl flex-grow-1 container-p-">
          <!-- <div class="container"> -->


<div class="container">
    <!-- Main Content -->
    <div class="main-content">
      <?php
      $data=json_decode(json_encode($data),true);
      // print_r($data);
      // die; 
      ?>
      <h1>Update  Profile</h1>

      <!-- Profile Form -->
      <div class="profile-form">
        <form action="<?php echo base_url('updatemyprofile')?>" method="POST" >
          <div class="form-group">
            <span> <b>Username</b></span>
            <input type="text" id="username" name="username" value=<?php echo $data[0]['name']?>  required>
           
          </div>

          <div class="form-group">
          <span> <b>Email</b></span>

            <input type="email" id="email" name="email" value=<?php echo $data[0]['email']?> required>
          </div>

          <div class="form-group">
          <span> <b>Pasword</b></span>

          <input type="password" id="email" name="password" value=<?php echo $data[0]['password']?> required>

          </div>

          <div class="form-group">
          <span> <b>Number</b></span>

          <input type="number" id="email" name="number" value=<?php echo $data[0]['number']?> required>
          
          </div>

          <button type="submit" class="submit-btn">Update Profile</button>
        </form>
      </div>
    </div>
  </div></div>

          </div>
            <!-- / Content -->
            <!-- end  -->
            <!-- Footer -->
        
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


  <?php
    include("inc/footer.php");
  
  ?>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

  </body>
</html>
