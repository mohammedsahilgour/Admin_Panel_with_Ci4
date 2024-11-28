<?php
        include("inc/header.php");
    ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

      <link rel="stylesheet" href="<?php echo base_url('assets/css/userblog.css')?>" />
      <style>
    /* ------------------- */

.fourth{
  margin-top:100px;
}
h1.fourth { 
	font-weight: 700;
    margin-left:-900px;
    /* margin-bottom: 30px; */
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
.dataTables_wrapper {
    position: relative;
    clear: both;
    margin-left: 30px;
    width: 105%;
    /* margin-top: -8%; */
    margin-top: -58px;
}
label {
    display: inline-block;
    margin-bottom: 8px;
}
table.dataTable tbody th, table.dataTable tbody td {
    padding: 8px 10px;
    background: white;
    color: black;
}
.filter{
  margin-left:30px;
  margin-top: 28px;

}
/* General container styling */
.filter-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 13px;
    background-color: #f8f9fa; /* Light gray background */
    border: 1px solid #ddd; /* Subtle border */
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Slight shadow for depth */
    margin: 20px auto; /* Center with top and bottom spacing */
    max-width: 600px; /* Limit max width */
    margin-top:-50px;
    margin-left:20px;
}

/* Individual filter styling */
.filter {
    display: flex;
    flex-wrap: wrap; /* Wrap for smaller screens */
    gap: 10px; /* Space between items */
    align-items: center;
}

/* Labels */
.filter label {
    font-size: 16px;
    color: #333; /* Dark gray text */
    margin-right: 5px;
}

/* Input fields */
.filter input[type="date"] {
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    transition: border-color 0.3s;
}

.filter input[type="date"]:focus {
    border-color: #007bff; /* Highlight border on focus */
}

/* Filter button */
.filter button {
    padding: 8px 15px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff; /* Blue button */
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.filter button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

/* Responsive design */
@media (max-width: 480px) {
    .filter-container {
        padding: 15px;
    }
    .filter {
        flex-direction: column; /* Stack elements on smaller screens */
        align-items: flex-start;
    }
    .filter button {
        align-self: center; /* Center button */
    }
}
---------------- */
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
    	<h1 class="fourth " style='color:blue'><span style="margin-left:20px">Education</span><span>Blogs</span></h1>
      <div class="add-more-btn"  style="margin-left:100px">
    <a href="<?php echo base_url('blogpost')?>" style="margin-top:-150px"class="btn btn-outline-primary">Add Blogs </a>
    
    </div>
    <div class="filter-container">
    <div class="filter">
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate">
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate">
        <button id="filterButton">Filter</button>
    </div>
</div>
  <table class="rwd-table"id="blogTable">
  <thead>
    <tr>
      <th>S.No</th>
      <th>Author Name</th>
      <th>Date</th>
      <th>Category</th>
      <th>Title</th>
      <th>Email</th>
      <!-- <th>Title</th>
      <th>Category</th> -->
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
      <?php $count = 1;?>
      <?php
      // print_r($data);die;
      
      ?>
      <tbody>
     
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    const table = $('#blogTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('user/blogeducationtable') ?>",
            "type": "POST",
            "data": function (d) {
                d.start_date = $('#startDate').val(); 
                d.end_date = $('#endDate').val();    
            },
            "dataSrc": function (json) {
                // If the response structure is valid, DataTables will render the data.
                console.log(json); // Check if the data is coming correctly
                return json.data;
            }
        },
        "columns": [
          { "data": 0 }, // For s.no (This will be manually handled in the loop)
            { "data": 1 }, // Author Name
            { "data": 4 }, // Date
            { "data": 3 }, // Image (add image URL here if needed)
            { "data": 2 }, // Title
            { "data": 5 }, // Category for
            { "data": 6, "orderable": false}, // Edit link
            { "data": 7 , "orderable": false}  // Delete link
        ],
        "pageLength": 4,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "order": [[0, 'asc']],
        "info": true
    });

    $('#filterButton').on('click', function () {
        table.ajax.reload();
    });
});

</script>
  </body>
</html>





