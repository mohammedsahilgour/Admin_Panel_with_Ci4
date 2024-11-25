<?php

namespace App\Controllers;
 use App\models\user_model;
 use App\models\login_model;
 use App\models\MenuModel;



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
          
            print_r($data);die;
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

    // user blog table //
    public function userblogs(){
        $model = new login_model();
       $data =  $model->select_user_data();
         return view('userblog' , ['data'=> $data]);
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
        $model = new login_model();
        $data =  $model->select_user();
        // print_r($data);
        // die;
        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
         view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);
        return view('usertable' , ['data'=> $data]);
      
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
        $model = new login_model();
        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
         view('inc/leftside' , ['leftsidebar'=> $leftsidebar]); 
      $data =  $model->get_pages_data();
      $data=json_decode(json_encode($data),true);
    return view('pagetable',['data'=>$data]);
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
        $model = new login_model();
        $leftsidebar =  $model->select_leftside_bar();
        $leftsidebar=json_decode(json_encode($leftsidebar),true);
       $data =  $model->news_table_data();
      $data=json_decode(json_encode($data),true);

    //    print_r($data);
    //    die;
    view('inc/leftside' , ['leftsidebar'=> $leftsidebar]);

        return view("newstable",["data" => $data]);
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
        $model = new login_model();
        $data =  $model->menu_table();
        $data=json_decode(json_encode($data),true);
        return view("menutable",['data'=>$data]);
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

}
