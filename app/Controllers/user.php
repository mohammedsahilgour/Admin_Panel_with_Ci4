<?php

namespace App\Controllers;
 use App\models\user_model;
 use App\models\login_model;
 use App\models\MenuModel;
 use App\models\blogmodel;
 use App\models\blog_edu_model;
 use App\models\news_model;
 use App\models\news_health_model;
 use App\models\news_edu_model;
 use App\models\user_data_table_model;
 use App\models\page_data_table_model;
 use App\models\menu_data_table_model;
 use App\models\company_table_model ;





class user extends BaseController
{
    public function index()
    {
        helper('form');
        $data = $this->request->getPost();

        if (!$this->validateData($data, [
            // Validation rules
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'number' => 'required',
        ])) {
          
            // print_r($data);die;
            return view('register');
        }else{

            $model = new user_model();
            $model->insert($data);
            echo "sucess";
            die;
            return view('formsuccess');
        }

    }
    public function blogpage(){
        return view('blogpost');

    }

    // open login page //
    public function loginpage(){
       
     return view('login');
    }

// validate and redirect //
    public function userlogin(){
       
        $data =$this->request->getPost();

       if (!$this->validateData($data, [

        'email' => 'required',
        'password' => 'required',
          
        ])) {
            return view('login');
        }else{

            $model = new login_model();
            $userdata =  $model->where(['email'=>$data['email'],'password'=>$data['password']])-> first();
            // print_r();
       
          $this->session->set('id',$userdata['id']);
          $this->session->set('username',$userdata['name']);

          
           
            if($userdata){
                echo "login in ";
                // return view('inc/header');

                return redirect()->to('userblogs'); 

                // here 
             
            }else{
                echo "not ";
            
            }
         
        }
       
    }

    // store blog
    public function insertblogpost(){
       $blogdata = $this->request->getPost();
            //    print_r($blogdata);die;
            $blogfile= $this->request->getFile("image");
            $f = $blogfile->getClientName();
            $filename = str_replace(" ","",$f);
                // print_r( $filename);
                // die;
            $blogfile->move(ROOTPATH."public/uploadimg", $filename);
            
            if(! $this->ValidateData($blogdata,[
                'email' => 'required',
                'date' => 'required',
                'email' => 'required',
                'number' => 'required',
                'title' => 'required',
                'gender' => 'required',
                'description' => 'required',

            ])){
                return view('blogpost');

            }else{
                // echo "sxcdc";
                $model = new login_model();

                $insertdata = $model->insert_blog($blogdata, $filename);
                // echo "upload";
                // die;
                return view('blogpost');

            }
            }

    public function table(){
        $model = new login_Model();
        $search = $this->request->getPost('search')['value'] ?? '';  // search value
        $start = $this->request->getPost('start') ?? 0;  // start for pagination
        $length = $this->request->getPost('length') ?? 10;  // length for pagination
        $draw = $this->request->getPost('draw') ?? 1;  // DataTables draw
        $start_date = $this->request->getPost('start_date') ?? null;
        $end_date = $this->request->getPost('end_date') ?? null;
    
        // Order details
        $order_column = $this->request->getPost('order')[0]['column'] ?? 0;
        $order_dir = $this->request->getPost('order')[0]['dir'] ?? 'asc';
    
        // Define column names for ordering
        $columns = ['id', 'name', 'title', 'email', 'category_for'];
        $order_by = $columns[$order_column] ?? 'id';
    
        // Fetch filtered blogs
        $blogs = $model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date);
    
        // Get the total number of records (without filters)
        $totalRecords = $model->countAllBlogs();
    
        // Get the total number of filtered records (with search and date filters)
        $filteredRecords = $model->countFilteredBlogs($search, $start_date, $end_date);
    
        // Prepare data for DataTables
        $counter = $start + 1;
        $data = [];
    
        foreach ($blogs as $blog) {
            $data[] = [
                $counter++,
                esc($blog['name']),
                esc($blog['title']),
                esc($blog['category_for']),
                esc($blog['date']),
                esc($blog['email']),
                "<a href='" . base_url('editblog?id=' . $blog['id']) . "' class='edit-btn'>Edit</a>",
                "<a href='" . base_url('deleteblog?id=' . $blog['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
            ];
        }
    
        // Return the JSON response for DataTables
        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            "data" => $data // Array of blog data
        ];
    
        return $this->response->setJSON($response);
    }
    public function blogeducationtable(){
                $model = new blog_edu_model();
                $search = $this->request->getPost('search')['value'] ?? '';  // search value
                $start = $this->request->getPost('start') ?? 0;  // start for pagination
                $length = $this->request->getPost('length') ?? 10;  // length for pagination
                $draw = $this->request->getPost('draw') ?? 1;  // DataTables draw
                $start_date = $this->request->getPost('start_date') ?? null;
                $end_date = $this->request->getPost('end_date') ?? null;
            
                // Order details
                $order_column = $this->request->getPost('order')[0]['column'] ?? 0;
                $order_dir = $this->request->getPost('order')[0]['dir'] ?? 'asc';
            
                // Define column names for ordering
                $columns = ['id', 'name', 'title', 'email', 'category_for'];
                $order_by = $columns[$order_column] ?? 'id';
            
                // Fetch filtered blogs
                $blogs = $model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date);
            
                // Get the total number of records (without filters)
                $totalRecords = $model->countAllBlogs();
            
                // Get the total number of filtered records (with search and date filters)
                $filteredRecords = $model->countFilteredBlogs($search, $start_date, $end_date);
            
                // Prepare data for DataTables
                $counter = $start + 1;
                $data = [];
            // print_r($blogs);die;
                foreach ($blogs as $blog) {
                    $data[] = [
                        $counter++,
                        esc($blog['name']),
                        esc($blog['title']),
                        esc($blog['category_for']),
                        esc($blog['date']),
                        esc($blog['email']),
                        "<a href='" . base_url('editblog?id=' . $blog['id']) . "' class='edit-btn'>Edit</a>",
                        "<a href='" . base_url('deleteblog?id=' . $blog['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"  
                    ];
                }
            
                // Return the JSON response for DataTables
                $response = [
                    "draw" => intval($draw),
                    "recordsTotal" => $totalRecords,
                    "recordsFiltered" => $filteredRecords,
                    "data" => $data // Array of blog data
                ];
            
                return $this->response->setJSON($response);
    }

    public function bloghealthtable(){
                $model = new blogmodel();
                $search = $this->request->getPost('search')['value'] ?? '';  // search value
                $start = $this->request->getPost('start') ?? 0;  // start for pagination
                $length = $this->request->getPost('length') ?? 10;  // length for pagination
                $draw = $this->request->getPost('draw') ?? 1;  // DataTables draw
                $start_date = $this->request->getPost('start_date') ?? null;
                $end_date = $this->request->getPost('end_date') ?? null;
            
                // Order details
                $order_column = $this->request->getPost('order')[0]['column'] ?? 0;
                $order_dir = $this->request->getPost('order')[0]['dir'] ?? 'asc';
            
                // Define column names for ordering
                $columns = ['id', 'name', 'title', 'email', 'category_for'];
                $order_by = $columns[$order_column] ?? 'id';
            
                // Fetch filtered blogs
                $blogs = $model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date);
            
                // Get the total number of records (without filters)
                $totalRecords = $model->countAllBlogs();
            
                // Get the total number of filtered records (with search and date filters)
                $filteredRecords = $model->countFilteredBlogs($search, $start_date, $end_date);
            
                // Prepare data for DataTables
                $counter = $start + 1;
                $data = [];
            // print_r($blogs);die;
                foreach ($blogs as $blog) {
                    $data[] = [
                        $counter++,
                        esc($blog['name']),
                        esc($blog['title']),
                        esc($blog['category_for']),
                        esc($blog['date']),
                        esc($blog['email']),
                        "<a href='" . base_url('editblog?id=' . $blog['id']) . "' class='edit-btn'>Edit</a>",
                        "<a href='" . base_url('deleteblog?id=' . $blog['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"  
                    ];
                }
            
                // Return the JSON response for DataTables
                $response = [
                    "draw" => intval($draw),
                    "recordsTotal" => $totalRecords,
                    "recordsFiltered" => $filteredRecords,
                    "data" => $data // Array of blog data
                ];
            
                return $this->response->setJSON($response);
    }

    public function newshealthtable(){
                $model = new news_health_model();
                $search = $this->request->getPost('search')['value'] ?? '';  // search value
                $start = $this->request->getPost('start') ?? 0;  // start for pagination
                $length = $this->request->getPost('length') ?? 10;  // length for pagination
                $draw = $this->request->getPost('draw') ?? 1;  // DataTables draw
                $start_date = $this->request->getPost('start_date') ?? null;
                $end_date = $this->request->getPost('end_date') ?? null;
            
                // Order details
                $order_column = $this->request->getPost('order')[0]['column'] ?? 0;
                $order_dir = $this->request->getPost('order')[0]['dir'] ?? 'asc';
            
                // Define column names for ordering
                $columns = ['id', 'name', 'title', 'email', 'category_for'];
                $order_by = $columns[$order_column] ?? 'id';
            
                // Fetch filtered blogs
                $blogs = $model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date);
            
                // Get the total number of records (without filters)
                $totalRecords = $model->countAllBlogs();
            
                // Get the total number of filtered records (with search and date filters)
                $filteredRecords = $model->countFilteredBlogs($search, $start_date, $end_date);
            
                // Prepare data for DataTables
                $counter = $start + 1;
                $data = [];
            // print_r($blogs);die;
                foreach ($blogs as $blog) {
                    $data[] = [
                        $counter++,
                        esc($blog['name']),
                        esc($blog['title']),
                        esc($blog['category_for']),
                        esc($blog['date']),
                        esc($blog['email']),
                        "<a href='" . base_url('editnews?id=' . $blog['id']) . "' class='edit-btn'>Edit</a>",
                        "<a href='" . base_url('deletenews?id=' . $blog['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"  
                    ];
                }
            
                // Return the JSON response for DataTables
                $response = [
                    "draw" => intval($draw),
                    "recordsTotal" => $totalRecords,
                    "recordsFiltered" => $filteredRecords,
                    "data" => $data // Array of blog data
                ];
            
                return $this->response->setJSON($response);
    }
    public function newseducationtable(){
                $model = new news_edu_model();
                $search = $this->request->getPost('search')['value'] ?? '';  // search value
                $start = $this->request->getPost('start') ?? 0;  // start for pagination
                $length = $this->request->getPost('length') ?? 10;  // length for pagination
                $draw = $this->request->getPost('draw') ?? 1;  // DataTables draw
                $start_date = $this->request->getPost('start_date') ?? null;
                $end_date = $this->request->getPost('end_date') ?? null;
            
                // Order details
                $order_column = $this->request->getPost('order')[0]['column'] ?? 0;
                $order_dir = $this->request->getPost('order')[0]['dir'] ?? 'asc';
            
                // Define column names for ordering
                $columns = ['id', 'name', 'title', 'email', 'category_for'];
                $order_by = $columns[$order_column] ?? 'id';
            
                // Fetch filtered blogs
                $blogs = $model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date);
            
                // Get the total number of records (without filters)
                $totalRecords = $model->countAllBlogs();
            
                // Get the total number of filtered records (with search and date filters)
                $filteredRecords = $model->countFilteredBlogs($search, $start_date, $end_date);
            
                // Prepare data for DataTables
                $counter = $start + 1;
                $data = [];
            // print_r($blogs);die;
                foreach ($blogs as $blog) {
                    $data[] = [
                        $counter++,
                        esc($blog['name']),
                        esc($blog['title']),
                        esc($blog['category_for']),
                        esc($blog['date']),
                        esc($blog['email']),
                        "<a href='" . base_url('editnews?id=' . $blog['id']) . "' class='edit-btn'>Edit</a>",
                        "<a href='" . base_url('deletenews?id=' . $blog['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"  
                    ];
                }
            
                // Return the JSON response for DataTables
                $response = [
                    "draw" => intval($draw),
                    "recordsTotal" => $totalRecords,
                    "recordsFiltered" => $filteredRecords,
                    "data" => $data // Array of blog data
                ];
            
                return $this->response->setJSON($response);
}

public function getmenutabledata(){
    $model = new menu_data_table_model();
    $search = $this->request->getPost('search')['value'] ?? '';  // search value
    $start = $this->request->getPost('start') ?? 0;  // start for pagination
    $length = $this->request->getPost('length') ?? 10;  // length for pagination
    $draw = $this->request->getPost('draw') ?? 1;  // DataTables draw
    $start_date = $this->request->getPost('start_date') ?? null;
    $end_date = $this->request->getPost('end_date') ?? null;

    // Order details
    $order_column = $this->request->getPost('order')[0]['column'] ?? 0;
    $order_dir = $this->request->getPost('order')[0]['dir'] ?? 'asc';

    // Define column names for ordering
    $columns = ['id', 'title', 'Number', 'email','Date'];
    $order_by = $columns[$order_column] ?? 'id';

    // Fetch filtered blogs
    $blogs = $model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date);

    // Get the total number of records (without filters)
    $totalRecords = $model->countAllBlogs();

    // Get the total number of filtered records (with search and date filters)
    $filteredRecords = $model->countFilteredBlogs($search, $start_date, $end_date);

    // Prepare data for DataTables
    $counter = $start + 1;
    $data = [];
        
    foreach ($blogs as $blog) {
        $data[] = [
            $counter++,
            // esc($blog['title']),
            esc($blog['menu_for']),
            esc($blog['permission']),
            // esc($blog['Date']),
            "<a href='" . base_url('editmenu?id=' . $blog['id']) . "' class='edit-btn'>Edit</a>",
           
            "<a href='" . base_url('deletecompanydetail?id=' . $blog['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>",
             "<a href='" . base_url('menubar?id=' . $blog['id']) . "' class='edit-btn'>Add menu</a>"
        ];
    }

    // Return the JSON response for DataTables
    $response = [
        "draw" => intval($draw),
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => $filteredRecords,
        "data" => $data // Array of blog data
    ];

    return $this->response->setJSON($response);
}
public function pagedatatable(){
    $model = new page_data_table_model();
    $search = $this->request->getPost('search')['value'] ?? '';  // search value
    $start = $this->request->getPost('start') ?? 0;  // start for pagination
    $length = $this->request->getPost('length') ?? 10;  // length for pagination
    $draw = $this->request->getPost('draw') ?? 1;  // DataTables draw
    $start_date = $this->request->getPost('start_date') ?? null;
    $end_date = $this->request->getPost('end_date') ?? null;

    // Order details
    $order_column = $this->request->getPost('order')[0]['column'] ?? 0;
    $order_dir = $this->request->getPost('order')[0]['dir'] ?? 'asc';

    // Define column names for ordering
    $columns = ['id', 'title', 'Number', 'email','Date'];
    $order_by = $columns[$order_column] ?? 'id';

    // Fetch filtered blogs
    $blogs = $model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date);

    // Get the total number of records (without filters)
    $totalRecords = $model->countAllBlogs();

    // Get the total number of filtered records (with search and date filters)
    $filteredRecords = $model->countFilteredBlogs($search, $start_date, $end_date);

    // Prepare data for DataTables
    $counter = $start + 1;
    $data = [];
        
    foreach ($blogs as $blog) {
        $data[] = [
            $counter++,
            esc($blog['title']),
            esc($blog['email']),
            esc($blog['Number']),
            esc($blog['Date']),
            "<a href='" . base_url('editpage?id=' . $blog['id']) . "' class='edit-btn'>Edit</a>",
            "<a href='" . base_url('updatepagedata?id=' . $blog['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
        ];
    }

    // Return the JSON response for DataTables
    $response = [
        "draw" => intval($draw),
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => $filteredRecords,
        "data" => $data // Array of blog data
    ];

    return $this->response->setJSON($response);
}
public function userdatatable(){
    $model = new user_data_table_model();
    $search = $this->request->getPost('search')['value'] ?? '';  // search value
    $start = $this->request->getPost('start') ?? 0;  // start for pagination
    $length = $this->request->getPost('length') ?? 10;  // length for pagination
    $draw = $this->request->getPost('draw') ?? 1;  // DataTables draw
    $start_date = $this->request->getPost('start_date') ?? null;
    $end_date = $this->request->getPost('end_date') ?? null;

    // Order details
    $order_column = $this->request->getPost('order')[0]['column'] ?? 0;
    $order_dir = $this->request->getPost('order')[0]['dir'] ?? 'asc';

    // Define column names for ordering
    $columns = ['id', 'name', 'password', 'email', 'number'];
    $order_by = $columns[$order_column] ?? 'id';

    // Fetch filtered blogs
    $blogs = $model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date);

    // Get the total number of records (without filters)
    $totalRecords = $model->countAllBlogs();

    // Get the total number of filtered records (with search and date filters)
    $filteredRecords = $model->countFilteredBlogs($search, $start_date, $end_date);

    // Prepare data for DataTables
    $counter = $start + 1;
    $data = [];
        
    foreach ($blogs as $blog) {
        $data[] = [
            $counter++,
            esc($blog['name']),
            esc($blog['password']),
            esc($blog['number']),
            "<a href='" . base_url('edituser?id=' . $blog['id']) . "' class='edit-btn'>Edit</a>",
            "<a href='" . base_url('deleteuser?id=' . $blog['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
        ];
    }

    // Return the JSON response for DataTables
    $response = [
        "draw" => intval($draw),
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => $filteredRecords,
        "data" => $data // Array of blog data
    ];

    return $this->response->setJSON($response);
}
    public function getnewstable(){
        $model = new news_model();
        $search = $this->request->getPost('search')['value'] ?? '';  // search value
        $start = $this->request->getPost('start') ?? 0;  // start for pagination
        $length = $this->request->getPost('length') ?? 10;  // length for pagination
        $draw = $this->request->getPost('draw') ?? 1;  // DataTables draw
        $start_date = $this->request->getPost('start_date') ?? null;
        $end_date = $this->request->getPost('end_date') ?? null;
    
        // Order details
        $order_column = $this->request->getPost('order')[0]['column'] ?? 0;
        $order_dir = $this->request->getPost('order')[0]['dir'] ?? 'asc';
    
        // Define column names for ordering
        $columns = ['id', 'name', 'title', 'email', 'category_for'];
        $order_by = $columns[$order_column] ?? 'id';
    
        // Fetch filtered blogs
        $blogs = $model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date);
    
        // Get the total number of records (without filters)
        $totalRecords = $model->countAllBlogs();
    
        // Get the total number of filtered records (with search and date filters)
        $filteredRecords = $model->countFilteredBlogs($search, $start_date, $end_date);
    
        // Prepare data for DataTables
        $counter = $start + 1;
        $data = [];
    
        foreach ($blogs as $blog) {
            $data[] = [
                $counter++,
                esc($blog['name']),
                esc($blog['title']),
                esc($blog['category_for']),
                esc($blog['date']),
                esc($blog['email']),
                "<a href='" . base_url('editnews?id=' . $blog['id']) . "' class='edit-btn'>Edit</a>",
                "<a href='" . base_url('deletenews?id=' . $blog['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
            ];
        }
    
        // Return the JSON response for DataTables
        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            "data" => $data // Array of blog data
        ];
    
        return $this->response->setJSON($response);
    }
    public function userblogs()
        {
            return view("userblog");
        }



    public function editblog(){
       
        $id = $_GET['id'];
   
        $model = new login_model();
      $data =   $model->user_edit_data($id);
   
      return view('editblog',['data'=>$data]);
    }
   
    public function updateblog(){
            $data = $this->request->getPost();
        //  print_r($data);
        //  die;
            $model = new login_model();
            $data = $model->update_data($data);
        
            if($data){
                // return view('editblog');
                return redirect()->to('userblogs'); 
            }else{
                echo "dedec";
                die;

            }

        }

    public function deleteblog(){
        // echo "cdc";
        $id = $_GET['id'];
        
        $model = new login_model();
        $delete = $model->deletedata($id);
        if($delete== true ){
            return redirect()->to('userblogs'); 

        }
    }

    // user table 
    public function usersection(){
        // $model = new login_model();
        // $data =  $model->select_user();
        // $leftsidebar =  $model->select_leftside_bar();
        // $leftsidebar=json_decode(json_encode($leftsidebar),true);
        //  view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);
        return view('usertable');
      
    }
    public function edituser(){
        $id = $_GET['id'];
        
        $model = new login_model();
       $data =  $model->userdata($id);
       $data=json_decode(json_encode($data),true);
        return view ('edituser',['data'=>$data]);
      
    }
    public function updateuserdata(){
        $data = $this->request->getPost();
     
        $model = new login_model();
        $model->update_user_data($data);
        return redirect()->to('usersection'); 

    }
    public function deleteuser(){
        $id = $_GET['id'];
        $model = new login_model();
      $delete =   $model->deleteuser($id);
      return redirect()->to('usersection'); 
      
        
    }
    public function myprofile(){
      $id = session('id');
      $model = new login_model();
        $data =   $model->get_profile_data( $id );
        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
        view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);
        return view('myprofile',['data' => $data]);
    }
    
    public function updatemyprofile(){
        $data = $this->request->getPost();
        $model = new login_model();
        $model->update_profile_data( $data );
        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
        view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);
        return redirect()->to('myprofile'); 

    }

    public function companysection(){
        $model = new login_model();
        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
         view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);
        $model = new login_model();
        $data =   $model->get_company_data();
        $country =  $model->get_company_country();

      
        return view('companysetting',['data'=>$data ,'country'=>$country]);
    }

    public function companydataupdate(){
     $data = $this->request->getPost();

     $model = new login_model();
     $model->update_company_data($data);
     return redirect()->to('companysection'); 

    }

    public function pagesform(){
        $model = new login_model();
        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
         view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);
        return view('pagesform');
    }

    public function insertpagesdata(){
         $data = $this->request->getPost();
        $model = new login_model();
        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
        view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);
        $model->insert_pages_data($data);
        return redirect()->to('pagesform'); 
    
    }

    public function pagetable(){
        // $model = new login_model();
        // $leftsidebar =  $model->select_leftside_bar();
        // $leftsidebar=json_decode(json_encode($leftsidebar),true);
        //  view('inc/leftside' , ['leftsidebar'=> $leftsidebar]); 
        // $data =  $model->get_pages_data();
        // $data=json_decode(json_encode($data),true);
        return view('pagetable');
    }

    public function editpage(){
        $id = $_GET['id'];
        $model = new login_model();
        $data =  $model->get_edit_page_data($id);
        $data=json_decode(json_encode($data),true);
        return view('editpage',['data'=>$data]);
    }

    public function updatepagedata(){
        $data = $this->request->getPost();
        $model = new login_model();
        $data =  $model->update_edit_page_data($data);
        return redirect()->to('pagetable'); 

    }

    public function deletepagedata(){
        $id = $_GET["id"];
        $model = new login_model();
        $data =  $model->delete_edit_page_data($id);
        return redirect()->to('pagetable'); 
        
    }
    
    public function newspost(){
        $model = new login_model();

        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
        view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);

        return view("newspost");
    }

    public function newssave(){
        $model = new login_model();

            $leftsidebar =  $model->select_leftside_bar();
            $leftsidebar=json_decode(json_encode($leftsidebar),true);
            $newsdata = $this->request->getPost();
            $blogfile= $this->request->getFile("image");
            $f = $blogfile->getClientName();
            $filename = str_replace(" ","",$f);
            $blogfile->move(ROOTPATH."public/uploadimg", $filename);
    
            if(! $this->ValidateData($newsdata,[
            'email' => 'required',
            'date' => 'required',
            'email' => 'required',
            'number' => 'required',
            'title' => 'required',
            'gender' => 'required',
            'description' => 'required',
    
            ])){
            view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);

            return view('newspost');
    
            }else{
                $model = new login_model();
                $data =  $model->save_news_data($newsdata,$filename);
            view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);

                return redirect()->to('newspost'); 
            }
    }

    public function newstable(){
        // echo "scec";die;
        //     $model = new login_model();
        //     $leftsidebar =  $model->select_leftside_bar();
        //     $leftsidebar=json_decode(json_encode($leftsidebar),true);
        //    $data =  $model->news_table_data();
        //   $data=json_decode(json_encode($data),true);

        //    print_r($data);
        //    die;
        view('inc/leftside' );

            return view("newstable");
    }

    public function editnews(){
        $id = $_GET['id'];
        $model = new login_model();
        $data =  $model->edit_news__data($id );
       $data=json_decode(json_encode($data),true);
         return view("editnews",["data" => $data]);
    }

    public function updatenews(){
        $data =   $this->request->getPost();
        //   print_r($data);die;
        $model = new login_model();
        $data =  $model->update_news_data($data);
        return redirect()->to('newstable'); 
    }

    public function deletenews(){
        $id = $_GET['id'];
        $model = new login_model();
        $data =  $model->delete_news_data($id);
        return redirect()->to('newstable'); 
    }

    public function menusection(){
        $model = new login_model();
        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
        view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);
        return view("menusection");
    }

    public function savemenu(){
        $model = new login_model();
        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
        view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);
        $data = $this->request->getPost();
        $model = new login_model();
        $model->save_menu_data($data );
        return redirect()->to('menusection'); 

    }

    public function menulist(){
        // $model = new login_model();
        // $data =  $model->menu_table();
        // $data=json_decode(json_encode($data),true);
        return view("menutable");
    }

    public function editmenu(){
        $id = $_GET['id'];
        // echo $id ; die;
        $model = new login_model();

        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
        view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);

        $data = $model->get_menu_data( $id );
        $data=json_decode(json_encode($data),true);
        // print_r($data);die;
        return view("editmenu",['data'=>$data]);
    }

    public function updatemenu(){
        $data = $this->request->getPost();
        // print_r($data);die;
        $model = new login_model();
        $model->update_menu_data($data);
        return redirect()->to('menulist'); 
    }

    public function deletemenudata(){
        $id = $_GET['id'];
        // echo $id ;
        $model = new login_model();
        $model->delete_menu_data( $id);
        return redirect()->to('menulist'); 
    }

    public function menubar(){
        $id = $_GET['id'];
        // print_r($id);die;
        $model = new login_model();
       $menudata =  $model->select_menu_bar_data($id);
       $menudata=json_decode(json_encode($menudata),true);
        // $menuModel = new MenuModel();
        // $menudata = $menuModel->getMenu();

        return view("menubar",['id'=>$id,"menudata"=>$menudata]);
    }

    public function savejsonoutput(){
        $data = $this->request->getPost();
        $model = new login_model();
        $model->save_json_output($data);
        return redirect()->to('menulist'); 
    }
    public function savesidebarmenu(){
     
        $getdata = $this->request->getPost();
        $id = $getdata['id'];

        $data =[
            'name'=>$getdata['name'],
            'icon'=>$getdata['icon'],
            'href'=>$getdata['href'],
            'target'=>$getdata['target'],
            'title'=>$getdata['title'],
            'Permission'=>$getdata['Permission'],

        ];

        $model = new login_model();
        $model->save_sidebar_menu($data);
        return redirect()->to('menubar?id=' . $id);
    }

    public function bloghealthcategory(){
        //     $model = new login_model();
        //    $data =  $model->get_health_blog();
        //    $data=json_decode(json_encode($data),true);

        return  view("healthblog"); 
    
       
    }

    public function edithealthblog(){
        $id = $_GET['id'];
        $model = new login_model();
        $data =  $model->edit_health_blog($id);
        $data=json_decode(json_encode($data),true);
        // print_r($data);die;
        return  view("edithealthblog",['data'=>$data]); 
    }

    public function updatehealthblog(){
        $data = $this->request->getPost();
        $model = new login_model();
        $model->update_health_blog($data);
        return redirect()->to('bloghealthcategory'); 
    }
    public function educationblog(){
        // $model = new login_model();
        // $data =  $model->get_education_blog();
        // $data=json_decode(json_encode($data),true);
 
        return  view("educationblog"); 
    }

    public function editeducationblog(){
        $id = $_GET['id'];
        $model = new login_model();
        $data =  $model->edit_education_blog($id);
        $data=json_decode(json_encode($data),true);
        return  view("editeducationhblog",['data'=>$data]); 
      
    }

    public function updateeducationblog(){
        $data = $this->request->getPost();
        $model = new login_model();
        $model->update_education_blog($data);
        return redirect()->to('educationblog'); 
    }

    public function healthnews(){
        //     $model = new login_model();
        //    $data =  $model->get_health_news();
        //    $data=json_decode(json_encode($data),true);

        return  view("healthnews"); 
    }
    
    public function edithealthnews(){
        $id = $_GET['id'];
        $model = new login_model();
        $data =  $model->edit_health_news($id);
        $data=json_decode(json_encode($data),true);
        return  view("edithealthnews",['data'=>$data]); 
    }

    public function updatehealthnews(){
        $data = $this->request->getPost();
        $model = new login_model();
        $model->update_health_news($data);
        return redirect()->to('healthnews'); 
    }
    public function educationnews(){
        // $model = new login_model();
        // $data =  $model->get_education_news();
        // $data=json_decode(json_encode($data),true);
 
        return  view("educationnews"); 
    }

    public function editeducationnews(){

        $id = $_GET['id'];
        $model = new login_model();
        $data =  $model->edit_education_news($id);
        $data=json_decode(json_encode($data),true);
        return  view("editeducationnews",['data'=>$data]); 
    }

    public function updateeducationnews(){
        $data = $this->request->getPost();
        $model = new login_model();
        $model->update_education_news($data);
        return redirect()->to('educationnews'); 
    }


    public function addcompanydetail(){
        return view("addcompanydetail");
    }

    public function savecompanydetail(){

        $data = $this->request->getPost();
        $model = new login_model();
        $model->save_company_detail($data);
        return view("addcompanydetail");

    }

    public function companylist(){
        $model  = new login_model();
      $data =   $model->get_user_companyaddress_data();
      $data=json_decode(json_encode($data),true);

        return view("companylist",['data'=>$data]);
    }
    
    public function companydetaildatatable(){
        $model = new company_table_model();
        $search = $this->request->getPost('search')['value'] ?? '';  // search value
        $start = $this->request->getPost('start') ?? 0;  // start for pagination
        $length = $this->request->getPost('length') ?? 10;  // length for pagination
        $draw = $this->request->getPost('draw') ?? 1;  // DataTables draw
        $start_date = $this->request->getPost('start_date') ?? null;
        $end_date = $this->request->getPost('end_date') ?? null;
    
        // Order details
        $order_column = $this->request->getPost('order')[0]['column'] ?? 0;
        $order_dir = $this->request->getPost('order')[0]['dir'] ?? 'asc';
    
        // Define column names for ordering
        $columns = ['id', 'company_name', 'company_type', 'company_email', 'date'];
        $order_by = $columns[$order_column] ?? 'id';
    
        // Fetch filtered blogs
        $blogs = $model->getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date);
    
        // Get the total number of records (without filters)
        $totalRecords = $model->countAllBlogs();
    
        // Get the total number of filtered records (with search and date filters)
        $filteredRecords = $model->countFilteredBlogs($search, $start_date, $end_date);
    
        // Prepare data for DataTables
        $counter = $start + 1;
        $data = [];
    
        foreach ($blogs as $blog) {
            $data[] = [
                $counter++,
                esc($blog['company_name']),
                esc($blog['company_type']),
                esc($blog['company_email']),
                esc($blog['date']),
                // esc($blog['email']),
                "<a href='" . base_url('editcompanydetail?id=' . $blog['id']) . "' class='edit-btn'>Edit</a>",
                "<a href='" . base_url('deletedatatableblog?id=' . $blog['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>",
                "<button class='btn btn-primary view-address-btn' data-company-id='" . $blog['id'] . "'>View Address</button>"

            ];
        }
    
        // Return the JSON response for DataTables
        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            "data" => $data // Array of blog data
        ];
    
        return $this->response->setJSON($response);
    }

    public function editcompanydetail(){

        $id = $_GET['id'];
        $model = new login_model();
      $data =  $model->get_company_detail($id);
      $data=json_decode(json_encode($data),true);
      return view("editcompanydetail",['data'=>$data]);

    }

    public function updatecompanydetail(){
        $data = $this->request->getPost();
        // print_r($data);die;
        $model = new login_model();
        $model->update_company_detail($data);
        return redirect()->to('companylist'); 


    }

    public function deletecompanydetail(){
        $id = $_GET['id'];
        echo "delete pending";
        echo $id ; die;
    }


    public function deletedatatableblog(){
        $id = $_GET['id'];
       $model = new login_model();
     $delete =   $model->delete_company_detail($id);
       if($delete ==  true ){
        return redirect()->to('companylist'); 

       }

    }


    // public function savemoreaddress(){
    //     $data = $this->request->getPost();
    //     print_r($data);die;
    //     $model = new login_model();
    //     $model->save_company_data($data);
    //     return redirect()->to('companylist'); 


    // }

    public function savemoreaddress() {
        $data = $this->request->getPost();
        $insertData = [];
        foreach ($data['address'] as $key => $value) {
            $insertData[] = [
                'address' => $value,
                'latitude' => $data['latitude'][$key],
                'longitude' => $data['longitude'][$key],
                'mobile' => $data['mobile'][$key],
                'user_id' => $data['user_id'][$key],
                'id' => $data['id']
            ];
        }
        $id = $insertData[0]['id'];
        $model = new login_model();
       $check =  $model->save_company_data_batch($insertData); // Use a batch insert method
       if($check==true){
        echo "doen";die;
       }
        return redirect()->to('companylist');
    }
    
    public function editcompanyaddressdata(){

        $id = $_GET['id'];
        // echo $id ; die;\
        $model = new login_model();
        $data = $model->fetch_company_address_of_user($id);
        $data=json_decode(json_encode($data),true);
        return view("editcompanyaddressdata",['data'=>$data]);
    }

    public function updatecompanyaddressdata(){
        $data = $this->request->getPost();
        $model = new login_model();
        $model->updatecompanyaddressdata($data);
        return redirect()->to('companylist');

    }

    public function deletecompanyaddressdata(){
        echo "data delete is pending";die;
    }
}

