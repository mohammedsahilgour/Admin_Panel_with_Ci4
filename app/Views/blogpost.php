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
                <div class="title">Blog Post </div>
           
                <form action="<?php echo base_url('blogpost')?>" method="POST">
                    <div class="user__details">
                    <div class="input__box">
                        <span class="details"> Name</span>
                        <input type="text" placeholder="E.g: John Smith" name="name"required>
                        <input type="hidden" placeholder="E.g: John Smith" name="user_id" value="<?php echo session('id')?>" >

                    </div>
                    <div class="input__box">
                        <span class="details">Date</span>
                        <input type="date" placeholder="johnWC98"name="date" required>
                    </div>
                    <div class="input__box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="johnsmith@hotmail.com" name="email" required>
                    </div>
                    <div class="input__box">
                        <span class="details">Phone Number</span>
                        <input type="tel"  placeholder="012-345-6789" name="number"required>
                    </div>
                    <div class="input__box">
                        <span class="details">Title</span>
                        <input type="text" placeholder="Title" name="title"required>
                    </div>
                    <div class="input__box">
                    <div class="gender__details">
                    <input type="radio" name="gender" value="Male" id="dot-1">
                    <input type="radio" name="gender" value="female" id="dot-2">
                    <input type="radio" name="gender"value="other" id="dot-3">
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
                       
                        <input type="text"class="input__box_phone" name="description" placeholder="" required>
                    </div>
               
                    <div class="button">
                    <input type="submit" value="Post">
                   
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



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
