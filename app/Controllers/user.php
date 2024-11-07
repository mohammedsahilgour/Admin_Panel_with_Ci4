<?php

namespace App\Controllers;
 use App\models\user_model;
 use App\models\login_model;


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

                return view('blogpost');
             
            }else{
                echo "not ";
            
            }
         
        }
       
    }

    // store blog
    public function blogpost(){
       $blogdata = $this->request->getPost();
    //    print_r( $blogdata );
    //    die;
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

        $insertdata = $model->insert_blog($blogdata);
        return view('blogpost');

       }
    }

}
