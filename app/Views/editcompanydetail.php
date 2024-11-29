<?php
include("inc/header.php");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="<?php echo base_url('assets/css/userblog.css')?>" />
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #e5e9f2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.form-container {
    background: #fff;
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    animation: slideIn 1s ease-out;
    transform: translateY(-50px);
    margin-top: 15%;
    margin-left: 30%;
}

h2 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 24px;
    color: #333;
    font-weight: 600;
    animation: fadeInText 1.5s ease-out;
}

.input-group {
    margin-bottom: 20px;
}

label {
    font-size: 16px;
    margin-bottom: 8px;
    display: block;
    color: #555;
}

input, select {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    transition: all 0.3s ease;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
}

input:focus, select:focus {
    border-color: #3498db;
    background-color: #e1f0ff;
    box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
    transform: translateY(-3px);
}

button {
    width: 100%;
    padding: 12px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

button:hover {
    background-color: #2980b9;
    transform: translateY(-3px);
}

button:active {
    transform: translateY(0);
}

@keyframes fadeInText {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideIn {
    0% {
        opacity: 0;
        transform: translateY(-30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>

<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- left sider -->
    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      <?php
      include("inc/leftside.php");
      ?>
      <!-- Navbar -->
      <div class="content-wrapper">
      <div class="form-container">
        <h2> Edit Company Details</h2>
        <form action="<?php echo base_url("updatecompanydetail")?>" method="POST">
            <div class="input-group">
                <label for="company-name">Company Name</label>
                <input type="text" id="company_name" value="<?php echo $data[0]['company_name']?>"name="company_name" required>
            </div>
            <input type="hidden" name="id"value="<?php echo $data[0]['id']?>">

              <div class="input-group">
                    <label for="company-type">Company Type</label>
                    <select id="company-type" name="company_type" required>
                        <option value="" disabled selected>
                            <?php echo isset($data[0]['company_type']) && !empty($data[0]['company_type']) 
                                ? htmlspecialchars($data[0]['company_type']) 
                                : 'Select Company Type'; ?>
                        </option>
                        <option value="private" <?php echo ($data[0]['company_type'] === 'private') ? 'selected' : ''; ?>>
                            Private
                        </option>
                        <option value="public" <?php echo ($data[0]['company_type'] === 'public') ? 'selected' : ''; ?>>
                            Public
                        </option>
                        <option value="nonprofit" <?php echo ($data[0]['company_type'] === 'nonprofit') ? 'selected' : ''; ?>>
                            Nonprofit
                        </option>
                    </select>
                </div>
            <div class="input-group">
                <label for="company-email">Company Email</label>
                <input type="email" value="<?php echo $data[0]['company_email']?>" id="company-email" name="company_email" required>
            </div>
            <div class="input-group">
                <label for="company-date">Date</label>
                <input 
                    type="date" 
                    id="company-date" 
                    name="date" 
                    value="<?php echo isset($data[0]['date']) ? htmlspecialchars($data[0]['date']) : ''; ?>" 
                    required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
        <?php
        include("inc/navbar.php");
        ?>
        <!-- main content start -->

                <!-- end -->
              </div>
            </div>
          </div>
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


