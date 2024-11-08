<?php
        include("inc/header.php");
    ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

      <link rel="stylesheet" href="<?php echo base_url('assets/css/userblog.css')?>" />
<style>
    /* ------------------- */


h1.fourth { 
	font-weight: 700;
    margin-left:-900px;
    margin-bottom: 30px;
}

h1.fourth span {
	border-bottom: 1px solid transparent;
	transition: all 0.2s ease;
}

h1.fourth:hover span {
	border-bottom: 1px solid whitesmoke;
}

h1.fourth span:first-child {
	font-weight: 300;
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
             include("inc/leftside.php");
        ?>
          <!-- Navbar -->
          <div class="content-wrapper">
            <!-- Content -->
         
             <?php
                    include("inc/navbar.php");
                    ?>
             <!-- main content starrt -->
            
          <div class="container-xxl flex-grow-1 container-p-">
          <div class="container">
  <div class="table-wrapper">

  <div class="container">

    <?php
   
     $data=json_decode(json_encode(  $data),true);?>
	<h1 class="fourth " style='color:blue'><span>User</span><span>Table</span></h1>
  
   
    <!-- ?> -->
  
  <table class="rwd-table">
    <tbody>
      <tr>
        <th> s.no</th>
        <th> User Name</th>
        <th>email</th>
        <th>number</th>
        
        <th colspan='2'>Action </th>
      
      </tr>
      <?php $count = 1;?>
      <?php foreach($data as $user_data){?>
      <tr>
  

      <td data-th="Supplier Code">
      <?php  echo $count ++?>
        </td>
        <td data-th="name">
        <?php echo $user_data['name'] ?>
        </td>
        <td data-th="email">
        <?php echo $user_data['email'] ?>

        </td>
        <td data-th="password">
        <?php echo $user_data['number'] ?>

        </td>
      
        <td data-th="delete">
        <?php echo anchor('edituser?id='.$user_data['id'] , '
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
        </svg>
        
        ', 'id="$row->id"'); ?>
        </td>
        <td data-th="edit">
        <?php echo anchor('deleteuser?id='.$user_data['id'] , '
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
      </svg>
        ', 'id="$row->id"'); ?>

        </td>
   
      </tr>
      <?php }?>
   
 
    </tbody>
  </table>

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
