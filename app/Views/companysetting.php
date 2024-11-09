<?php
        include("inc/header.php");
    ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/companysetting.css')?>">

<style>
    /* ------------------- */

    .company-setting-container{
width: 160%;
margin-left: -500px;
/* background-color:'blue';0 */
margin-top: 50px;;
    }


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
            
          <!-- <div class="container-xxl flex-grow-1 container-p-"> -->
          <!-- <div class="container"> -->


<div class="company-setting-container">


    <!-- Main Content -->
    <div class="container">
    <h1>Company Detail</h1>
    <?php
   $data=json_decode(json_encode($data),true);
   $country=json_decode(json_encode($country),true);
   print_r($data);
   print_r($country);
   ?>
    
    <div class="progress-bar-company-section">
        <div class="progress"></div>
        <div class="step active">1</div>
        <div class="step">2</div>
        <div class="step">3</div>
    </div>

    <form id="patientForm">
        <!-- Personal Information -->
        <div class="form-section active" id="section1">
            <h2>Company  Information</h2>
            <div class="form-group">
                <label for="fullName">Company  Name</label>
                <input type="text" id="fullName" value="<?php echo $data[0]['companyname']?>" required>
            </div>
            <div class="form-group">
                <label for="dob">Established Date </label>
                                <?php
                // Assuming $data is your array
                $established_date = $data[0]['established_date']; // "28-1-2024"

                // Convert the date to YYYY-MM-DD format
                $date = DateTime::createFromFormat('d-m-Y', $established_date); 
                $formatted_date = $date ? $date->format('Y-m-d') : '';

                // Output the HTML with the formatted date
                ?>
            <input type="date" id="dob" value="<?php echo $formatted_date; ?>" required>

            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email"value="<?php echo $data[0]['email']?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Contact  Number</label>
                <input type="tel" id="phone" value="<?php echo $data[0]['number']?>"required>
            </div>
            <div class="btn-group">
                <button type="button" class="btn-prev" disabled>Previous</button>
                <button type="button" class="btn-next">Next</button>
            </div>
        </div>

        <!-- Medical History -->
        <div class="form-section" id="section2">
            <h2>Location</h2>
            <div class="form-group">
                <label for=""> Country</label>
            <select class="form-select" aria-label="Default select example">
                <?php foreach($country as $c){?>
                <option selected><?php echo $c['country']?></option>
                <!-- <option value="1">One</option> -->
                <?php }?>
            </select>
            </div>
            <div class="form-group">
            <label for=""> State</label>

            <select class="form-select" aria-label="Default select example">
            <?php foreach($country as $c){?>
                <option selected><?php echo $c['state']?></option>
                <!-- <option value="1">One</option> -->
                <?php }?>
            </select>
            </div>
            <div class="form-group">
                <label for="allergies">City</label>
                <select class="form-select" aria-label="Default select example">
                <?php foreach($country as $c){?>
                <option selected><?php echo $c['city']?></option>
                <!-- <option value="1">One</option> -->
                <?php }?>
            </select>
            </div>
            <div class="btn-group">
                <button type="button" class="btn-prev">Previous</button>
                <button type="button" class="btn-next">Next</button>
            </div>
        </div>

        <!-- Insurance Information -->
        <div class="form-section" id="section3">
            <!-- <h2>Insurance Information</h2> -->
            <div class="form-group">
                <label for="provider">SEO  description </label>
                <input type="text" id="provider" value="<?php echo $data[0]['description']?>" required>
            </div>
            <div class="form-group">
            <label for="provider">SEO  Title </label>

                <input type="text" id="policyNumber"  value="<?php echo $data[0]['Title']?>"required>
            </div>
            <div class="form-group">
                <label for="groupNumber">Contact Person </label>
                <input type="text" id="groupNumber"  value="<?php echo $data[0]['Contact_Person']?>">
            </div>
            <div class="btn-group">
                <button type="button" class="btn-prev">Previous</button>
                <button type="submit" class="btn-submit">Submit</button>
            </div>
        </div>
    </form>

    <div class="success-message">
        <i class="fas fa-check-circle"></i>
        Form submitted successfully!
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
  <script src="<?php echo base_url("assets/js/companysetting.js")?>"></script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

  </body>
</html>
