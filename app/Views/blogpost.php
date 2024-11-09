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
       
            <!-- Navbar -->
             
            <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- session name  -->
            <h2><?php  echo  session('username');?></h2>         
     </div>
              <!-- /Search -->
              

       
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <!-- <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li> -->
         <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <!-- <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" /> -->
                    
                    <div class="account-section">
                     <h4 style="color: white"> Account </h4>
                    </div>
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <!-- <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" /> -->
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo session('username')?></span>
                            <small class="text-muted">User</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?php echo base_url('myprofile')?>">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                 
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
             <!-- main content starrt -->
            <div class="container-xxl flex-grow-1 container-p-y">
          

            </div>
            <?php
         include("inc/leftside.php");
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
                    <input type="radio" name="gender" value="male" id="dot-1">
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


  <?php
    include("inc/footer.php");
  
  ?>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

  </body>
</html>
