<?php
        include("inc/header.php");
    ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url('css/register.css')?>">

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
          <div class="container">
  <div class="table-wrapper">

  <div class="container">
        
    <form  method="POST" action="<?php echo base_url('updateuserdata')?>">
     
     <div class="container">
       <h1> Update </h1>

         <label for="email"><b>Username</b></label>
         <input type="text" name="name" placeholder="Enter Username" value="<?php echo $data[0]['name']?>" >
        
         <label for="email"><b>Email</b></label>
         <?php
         
         ?>
         <input type="text" placeholder="Enter Email" name="email" value="<?php echo $data[0]['email']?>" >
       
       <label for="psw"><b>Password</b></label>
       <input type="password" placeholder="Enter Password" name="password"  value="<?php echo $data[0]['password']?>">
       <input type="hidden"  name="id"  value="<?php echo $data[0]['id']?>">

   
         <label for="email"><b>Phone Number</b></label>
         <br>
        
        <input type="number" name="number" placeholder="Enter contact"   value="<?php echo $data[0]['number']?>" ><br>


   
       <div class="clearfix"><br>
   
         <button type="submit" >Update </button>
       </div>
     </div>
   </form>

<!-- <div class="youtubeBtn"> -->

 </a>

</div>

</div>
  </div>
</div>

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
