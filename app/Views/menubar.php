<?php
        include("inc/header.php");
    ?>
      <link rel="stylesheet" href="<?php echo base_url('assets/css/blogpost.css')?>" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <link rel="stylesheet" href="bootstrap-iconpicker/css/bootstrap-iconpicker.min.css">
    <style>
.list-group {
    /* display: -ms-flexbox; */
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    padding-left: 0;
    margin-bottom: 0;
    border-radius: .25rem;
    width: 32%;
    /* margin-left: 30px; */
    margin-top: 100px;
}

.border-primary {
    border-color: #007bff !important;
    width: 30%;
    /* position: relative; */
    /* margin-top: 0px; */
    position: absolute;
    top: 70px;
    left: 63%;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #e9ecef;
    opacity: 1;
    width: 45%;
    /* position: absolute; */
    top: -50;
    /* left: 68%; */
}
.h3, h3 {
    font-size: 1.75rem;
    margin-top: 4%;
}
    </style>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <div class="layout-page">

          <div class="content-wrapper">
 
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
            <?php
         include("inc/leftside.php");
        ?>
           
<div class="container">
<ul id="myEditor" class="sortableLists list-group">
</ul>
<div class="card border-primary mb-3">
    <div class="card-header bg-primary text-white">Edit item</div>
   <?php
  //  print_r($leftsidebar);
   
   ?>
        <div class="card-body">
        <form id="frmEdit" class="form-horizontal">
        <div class="form-group">
        <label for="text">Text</label>
        <div class="input-group">
        <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
        <div class="input-group-append">
        <button type="button" id="myEditor_icon" class="btn btn-outline-secondary"></button>
        </div>
        </div>
        <input type="hidden" name="icon" class="item-menu">
        </div>
        <div class="form-group">
        <label for="href">URL</label>
        <input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
        </div>
        <div class="form-group">
        <label for="target">Target</label>
        <select name="target" id="target" class="form-control item-menu">
        <option value="_self">Self</option>
        <option value="_blank">Blank</option>
        <option value="_top">Top</option>
        </select>
        </div>
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control item-menu" id="title" placeholder="Title">
        </div>
        <div class="form-group">
        <label for="title">Permission </label>
        <input type="text" name="Permission" class="form-control item-menu" id="Permission" placeholder="Permission">
        </div>
        </form>
        </div>
    <div class="card-footer">
        <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
        <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
    </div>
</div>

<div class="output-section">
            <h3>Generated Menu JSON</h3>
            <form action="<?php echo base_url("savejsonoutput")?>" method="POST">

            <button type="button" id="outputbtn" class="btn btn-success">Output </button><br><br>
            <!-- <button type="button" id="remove" class="btn btn-danger">remove </button> -->
            <br><br>
            <textarea id="myTextarea" class="form-control" rows="8" name="jsonoutput" readonly required></textarea>
            <input type="hidden" name="id" value="<?php echo $id ?>"><br>
            <input type="submit" value="save"class="btn btn-primary">
            </form>
        
        </div>
</div>

<!-- end  -->
 
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


    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js"></script>
    <script type="text/javascript" src="bootstrap-iconpicker/js/bootstrap-iconpicker.min.js"></script>
    <script type="text/javascript" src="bootstrap-iconpicker/js/jquery-menu-editor.min.js"></script>
</body>
</html>
<script>
    var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
    var sortableListOptions = {
        placeholderCss: {'background-color': "#cccccc"}
    };
var editor = new MenuEditor('myEditor', 
            { 
            listOptions: sortableListOptions, 
            iconPicker: iconPickerOptions,
            maxLevel: 2,
            });
    editor.setForm($('#frmEdit'));
    editor.setUpdateButton($('#btnUpdate'));
    $("#btnUpdate").click(function(){
        editor.update();
    });
    $('#btnAdd').click(function(){
        editor.add();
    });

[
	{
		"href": "http://home.com",
		"icon": "fas fa-home",
		"text": "Home",
		"target": "_top",
		"title": "My Home"
	},
	{
		"icon": "fas fa-chart-bar",
		"text": "Opcion2"
	},
	{
		"icon": "fas fa-bell",
		"text": "Opcion3"
	},
	{
		"icon": "fas fa-crop",
		"text": "Opcion4"
	},
	{
		"icon": "fas fa-flask",
		"text": "Opcion5"
	},
	{
		"icon": "fas fa-map-marker",
		"text": "Opcion6"
	},
	{
		"icon": "fas fa-search",
		"text": "Opcion7",
		"children": [
			{
				"icon": "fas fa-plug",
				"text": "Opcion7-1",
				"children": [
					{
						"icon": "fas fa-filter",
						"text": "Opcion7-1-1"
					}
				]
			}
		]
	}
]
var arrayjson = [{"href":"localhost:8080/userblogs","icon":"fas fa-home","text":"blogs", "target": "_top", "title": "Userblogs"},
{"href":"localhost:8080/userblogs","icon":"fas fa-home","text":"menu", "target": "_top", "title": "menu"},

{"href":"http://localhost:8080/companysection","title":"company setting","icon":"fas fa-bell","text":"company setting"},
{"href":"http://localhost:8080/newstable","icon":"fas fa-crop","text":"news","title":"news"},
{"href":"http://localhost:8080/pagetable","icon":"fas fa-flask","text":"pages","title":"pages"},
{"href":"http://localhost:8080/usersection","icon":"fas fa-home","text":"user", "target": "_top", "title": "user"},
{"icon":"fas fa-search","text":"Add","children":[{"icon":"fas fa-plug","text":"default","children":[{"icon":"fas fa-filter","text":"Opcion7-1-1"}]}]}];
editor.setData(arrayjson);
// var str = editor.getString();
// console.log(str)
$("#outputbtn").click(function(){
    var str = editor.getString();
    $("#myTextarea").text(str);
    // console.log(str)
})

$("#remove").click(function(){
  var str ="";

  $("#myTextarea").text(str);

})

</script>