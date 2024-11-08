<?php
        include("inc/header.php");
    ?>
      <link rel="stylesheet" href="<?php echo base_url('assets/css/blogpost.css')?>" />

    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
      
<!-- left sider  -->
       
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
      

          <!-- Navbar -->
          <div class="content-wrapper">
            <!-- Content -->
            <?php
         include("inc/leftside.php");
        ?>
            
             <!-- main content starrt -->
            <div class="container-xxl flex-grow-1 container-p-y">
          

            </div>
            <?php
             include("inc/navbar.php");
            ?>
            <div class="container">
                <div class="title"> Edit Blog  </div>
          <?php
            $data=json_decode(json_encode($data),true);
            // print_r($data);

          ?>
                <form action="<?php echo base_url('updateblog')?>" method="POST">
                    <div class="user__details">
                    <div class="input__box">
                        <span class="details"> Name</span>
                        <input type="text" placeholder="E.g: John Smith" name="name" value="<?php echo $data[0]['name'] ?>"required>
                        <input type="hidden" placeholder="E.g: John Smith" name="id" value="<?php echo $data[0]['id'] ?>" >

                    </div>
                    <div class="input__box">
                        <span class="details">Date</span>
                        <input type="date" placeholder="johnWC98"name="date" value="<?php echo $data[0]['date'] ?>" required>
                    </div>
                    <div class="input__box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="johnsmith@hotmail.com" name="email"value="<?php echo $data[0]['email'] ?>" required>
                    </div>
                    <div class="input__box">
                        <span class="details">Phone Number</span>
                        <input type="tel"  placeholder="012-345-6789" name="number"value="<?php echo $data[0]['number'] ?>"required>
                    </div>
                    <div class="input__box">
                        <span class="details">Title</span>
                        <input type="text" placeholder="Title" name="title"value="<?php echo $data[0]['title'] ?>"required>
                    </div>
                    <div class="input__box">
                    <div class="gender__details">
                    <input type="radio" name="gender" value="male" id="dot-1" <?php echo ($data[0]['gender'] == 'male') ? 'checked' : ''; ?>>
                    <input type="radio" name="gender" value="female" id="dot-2" <?php echo ($data[0]['gender'] == 'female') ? 'checked' : ''; ?>>
                    <input type="radio" name="gender" value="other" id="dot-3" <?php echo ($data[0]['gender'] == 'other') ? 'checked' : ''; ?>>
                    <span class="gender__titleee">Gender</span>
                    
                    
                    <div class="category">
                        <label for="dot-1">
                        <span class="dot one"></span>
                        <span>Male</span>
                        </label>
                        <label for="dot-2">
                        <span class="dot two"></span>
                        <span>Female</span>
                        </label>
                        <label for="dot-3">
                        <span class="dot three"></span>
                        <span>Other</span>
                        </label>
                    </div>
                    </div>
                    </div>

                    </div>
                    <div >
                    <span class="details">Description</span>
                       
                        <input type="text"class="input__box_phone" value="<?php echo $data[0]['description'] ?>"name="description" placeholder="" required>
                    </div>
               
                    <div class="button">
                    <input type="submit" value="Update ">
                   
                    </div>
                </form>
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
