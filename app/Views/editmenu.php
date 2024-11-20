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
                        <span class="align-middle">Log Outt</span>
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
            <div class="container" >
            <div class="title"> Edit Menu   </div><br>
               <form action="<?php echo base_url('updatemenu')?>" method="POST" enctype="multipart/form-data">
 
                    <div class="form-group"cstyle="margin-top:20px">
                    <span class="details" style="margin-top:20px"> Menu For</span>
                    <select class="form-select" name="menu_for" aria-label="Default select example">
                             <?php echo empty($data[0]['menu_for']) ? 'selected' : ''; ?>>Select menu</option> 
                            <option value="Frontend" <?php echo $data[0]['menu_for'] === 'Frontend' ? 'selected' : ''; ?>>Frontend</option>
                            <option value="Admin" <?php echo $data[0]['menu_for'] === 'Admin' ? 'selected' : ''; ?>>Admin</option>
                        </select>
                    </div><br>
                    <div class="mb-3">
                      <span> Permission</span>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?php echo $data[0]["permission"]?>" placeholder="eg:Permission`"name="Permission"aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                      </div><br>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Title</label>
                      <textarea class="form-control" name="title" id="exampleFormControlTextarea1" rows="3"><?php echo htmlspecialchars($data[0]["title"]); ?></textarea>
                      </div><br>
                    <input type="hidden" class="form-control" value="<?php echo $data[0]["id"]?>" name="id"aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

                    <div class="button">
                    <input type="submit" value="Submit">
                   
                    </div> 
                </form>
                </div>
        

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
