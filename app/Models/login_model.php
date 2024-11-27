<?php

namespace App\Models;

use CodeIgniter\Model;

class login_model extends Model
{
    protected $table = 'form';
    protected $protectFields = false;
    protected $allowedfield = ['name','email'];
    
    public function insert_blog($blogdata,$filename ){
        $blogdata = [
            'image' => $filename ,
            'name' => $blogdata["name"] ,
            'date' => $blogdata["date"] ,
            'email' => $blogdata["email"],
            'number' => $blogdata["number"],
            'title' => $blogdata["title"] ,
            'gender' => $blogdata["gender"] ,
            'description' => $blogdata["description"],
            'user_id' => $blogdata["user_id"],
            'category_for' => $blogdata["category_for"],


        ];
        // print_r($blogdata);die;

        $insert = $this->db->table('blog')->insert($blogdata);
        return $insert;
        
    }

    public function select_user_data(){
        $id =  session('id');
        $query = $this->db->query("SELECT * FROM blog  ");
        return  $result = $query->getResult();

   
    }
    
    public function user_edit_data($id){

        $query = $this->db->query("SELECT * FROM blog WHERE id = ' $id' ");
        return  $result = $query->getResult();
    }

    public function update_data($data){
       
        $id = $data['id'];
     
     $db      = \Config\Database::connect();
        $model= $db->table('blog');
      $check =   $model->where('id', $id )->set(['name'=>$data['name'],'date'=>$data['date'],'email'=>$data['email'],
      'title'=>$data['title'],'gender'=>$data['gender'],'description'=>$data['description'],'category_for'=>$data['category_for'],'number'=>$data['number']])->update();
 
        return $check;
    
    }
    public function deletedata($id){


    $builder = $this->db->table('blog');


    $builder->where('id', $id);
    $builder->delete();
        return true ;
    }

    public function select_user(){

        $query = $this->db->query("SELECT * FROM form ");
        return  $result = $query->getResult();
    }

    public function userdata($id){
        $query = $this->db->query("SELECT * FROM form WHERE id = ' $id' ");
        return  $result = $query->getResult();
    }

    public function update_user_data($data){
        $id = $data['id'];
     
        $db      = \Config\Database::connect();
           $model= $db->table('form');
         $check =   $model->where('id', $id )->set(['name'=>$data['name'],'email'=>$data['email'],'password'=>$data['password'],
         'number'=>$data['number']])->update();
    
           return $check;
    }
    public function deleteuser($id){
        // echo $id ; die ;
        $builder = $this->db->table('form');
        $builder->where('id', $id);
        $builder->delete();
            return true ;
    }
    public function get_profile_data(    $id ){
        $query = $this->db->query("SELECT * FROM form WHERE id = ' $id' ");
        return  $result = $query->getResult();

    }
    public function update_profile_data( $data ){
        $id = session('id');
   
        $db      = \Config\Database::connect();
        $model= $db->table('form');
      $check =   $model->where('id', $id )->set(['name'=>$data['username'],'email'=>$data['email'],'password'=>$data['password'],
      'number'=>$data['number']])->update();
 
        return $check;
    }
    public function get_company_data(){
        $query = $this->db->query("SELECT * FROM companydata ");
        return  $result = $query->getResult();
    }

  
    public function   get_company_country(){
        $query = $this->db->query("SELECT * FROM country ");
        return  $result = $query->getResult();
    }

    public function update_company_data($data){
        $db      = \Config\Database::connect();
        $check = $this->db->table('company_update_data')->insert($data );
        return $check;

    }

    public function insert_pages_data($data){
        $db      = \Config\Database::connect();
        $check = $this->db->table('pages')->insert($data );
        return $check;
    }

    public function get_pages_data(){
        $query = $this->db->query("SELECT * FROM pages ");
     $result = $query->getResult();
     return  $result;
    }

    public function get_edit_page_data($id){
        $query = $this->db->query("SELECT * FROM pages WHERE id = ' $id' ");
        return  $result = $query->getResult();
    }

    public function update_edit_page_data($data){
        $id = $data["id"];
        $db      = \Config\Database::connect();

        $model= $db->table('pages');
        $check =   $model->where('id', $id )->set(['title'=>$data['title'],'Date'=>$data['date'],'email'=>$data['email'],
      'Number'=>$data['number'],'Description'=>$data['description'],'Gender'=>$data['gender']])->update();
 
        return $check;
    }

    public function delete_edit_page_data($id){
        $builder = $this->db->table('pages');
        $builder->where('id', $id);
        $builder->delete();
            return true ;
    }

    public function save_news_data($newsdata,$filename){
        $newsdata = [
            'image' => $filename ,
            'name' => $newsdata["name"] ,
            'date' => $newsdata["date"] ,
            'email' => $newsdata["email"],
            'number' => $newsdata["number"],
            'title' => $newsdata["title"] ,
            'gender' => $newsdata["gender"] ,
            'description' => $newsdata["description"],
            'category_for' => $newsdata["category_for"],

           

        ];
        // print_r($blogdata);die;

        $insert = $this->db->table('news')->insert($newsdata);
        return $insert;
       
    }

    public function news_table_data(){

    $query = $this->db->query("SELECT * FROM news ");
        return  $result = $query->getResult();
    }

    public function edit_news__data($id ){
        
    $query = $this->db->query("SELECT * FROM news where id='$id' ");
    return  $result = $query->getResult();
    }

    public function update_news_data( $data ){
        $id = $data["id"];
        // print_r($id);die;
        $db      = \Config\Database::connect();
        $model= $db->table('news ');
        $check =   $model->where('id', $id )->set(['name'=>$data['name'],'title'=>$data['title'],'Date'=>$data['date'],'email'=>$data['email'],
      'Number'=>$data['number'],'Description'=>$data['description'],'Gender'=>$data['gender'],'category_for'=>$data['category_for']])->update();
 
        return $check;
    }

    public function delete_news_data($id){
        $builder = $this->db->table('news');
        $builder->where('id', $id);
        $builder->delete();
            return true ;
    }

    public function save_menu_data($data){
        $insert = $this->db->table('menu')->insert($data);
        return $insert;
    }

    public function menu_table(){
        $query = $this->db->query("SELECT * FROM menu");
        return  $result = $query->getResult();
    }

    public function get_menu_data( $id ){
        $query = $this->db->query("SELECT * FROM menu where id='$id' ");
        return  $result = $query->getResult();
    }

    public function update_menu_data($data){
       $id = $data["id"];
        $db      = \Config\Database::connect();
        $model= $db->table('menu');
        $check =   $model->where('id', $id )->set(['menu_for'=>$data['menu_for'],'Permission'=>$data['Permission']])->update();
        return $check;
    }

    public function delete_menu_data($id){

        $builder = $this->db->table('menu');
        $builder->where('id', $id);
        $builder->delete();
            return true ;
    }

    public function save_json_output($data){
        $id = $data["id"];
        // print_r($id);die;
        $db      = \Config\Database::connect();
        $model= $db->table('menu');
        $check =   $model->where('id', $id )->set(['json_output'=>$data['jsonoutput']])->update();
        return $check;
    }

    public function select_leftside_bar(){
        $query = $this->db->query("SELECT * FROM menu where id='16'");
        return  $result = $query->getRowArray();
    }
    public function select_menu_bar_data($id){
        $query = $this->db->query("SELECT * FROM menu where id='$id' ");
        return  $result = $query->getRowArray();

    }
    public function save_sidebar_menu($data){
        $insert = $this->db->table('leftsidebar')->insert($data);
        return $insert;
    }

    public function get_health_blog(){
        $query = $this->db->query("SELECT * FROM blog where category_for='Health' ");
        return  $result = $query->getResult();
    }
    public function edit_health_blog($id){
        // echo $id;die;
        $query = $this->db->query("SELECT * FROM blog where id='$id' ");
        return  $result = $query->getResult();
    }

    public function update_health_blog($data){
        $id = $data["id"];
        // print_r($data);die;
        $db      = \Config\Database::connect();
        $model= $db->table('blog');
        $check =  $model->where('id', $id )->set(['name'=>$data['name'],'title'=>$data['title'],'Date'=>$data['date'],'email'=>$data['email'],
        'Number'=>$data['number'],'Description'=>$data['description'],'Gender'=>$data['gender'],"category_for"=>$data['category_for']])->update();
        return $check;
    }
    public function get_education_blog(){
        $query = $this->db->query("SELECT * FROM blog where category_for='Education' ");
        return  $result = $query->getResult();
    }

    public function edit_education_blog($id){
        $query = $this->db->query("SELECT * FROM blog where id='$id' ");
        return  $result = $query->getResult();
    }

    public function update_education_blog($data){
        $id = $data["id"];
        // print_r($data);die;
        $db      = \Config\Database::connect();
        $model= $db->table('blog');
        $check =  $model->where('id', $id )->set(['name'=>$data['name'],'title'=>$data['title'],'Date'=>$data['date'],'email'=>$data['email'],
        'Number'=>$data['number'],'Description'=>$data['description'],'Gender'=>$data['gender'],"category_for"=>$data['category_for']])->update();
        return $check;
    }

    public function get_health_news(){
        $query = $this->db->query("SELECT * FROM news where category_for='Health' ");
        return  $result = $query->getResult();
    }
    public function edit_health_news($id){
        $query = $this->db->query("SELECT * FROM news where id='$id' ");
        return  $result = $query->getResult();
    }
    public function update_health_news($data){
        $id = $data["id"];
        // print_r($data);die;
        $db      = \Config\Database::connect();
        $model= $db->table('news');
        $check =  $model->where('id', $id )->set(['name'=>$data['name'],'title'=>$data['title'],'Date'=>$data['date'],'email'=>$data['email'],
        'Number'=>$data['number'],'Description'=>$data['description'],'Gender'=>$data['gender'],"category_for"=>$data['category_for']])->update();
        return $check;
    }
    public function get_education_news(){
        $query = $this->db->query("SELECT * FROM news where category_for='Education' ");
        return  $result = $query->getResult();
    }

    public function edit_education_news($id){
        $query = $this->db->query("SELECT * FROM news where id='$id' ");
        return  $result = $query->getResult();
    }
    public function update_education_news($data){
        $id = $data["id"];
        // print_r($data);die;
        $db      = \Config\Database::connect();
        $model= $db->table('news');
        $check =  $model->where('id', $id )->set(['name'=>$data['name'],'title'=>$data['title'],'Date'=>$data['date'],'email'=>$data['email'],
        'Number'=>$data['number'],'Description'=>$data['description'],'Gender'=>$data['gender'],"category_for"=>$data['category_for']])->update();
        return $check;
    }

    public function getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date)
    {
        $builder = $this->builder('blog');
    
        // Add search conditions
        if (!empty($search)) {
            $builder->groupStart()
                    ->like('name', $search)
                    ->orLike('title', $search)
                    ->orLike('category_for', $search)
                    ->groupEnd();
        }
    
        // Add date filter if provided
        if (!empty($start_date) && !empty($end_date)) {
            $builder->where('date >=', $start_date)
                    ->where('date <=', $end_date);
        }
    
        // Add order by condition
        if (!empty($order_by) && !empty($order_dir)) {
            $builder->orderBy($order_by, $order_dir);
        } else {
            $builder->orderBy('id', 'asc'); // Default order by ID ascending
        }
    
        // Apply limits for pagination
        $builder->limit($length, $start);
    
        // Select the necessary fields (including 'title')
        $builder->select('id, name, title, email, category_for, date');
    
        // Execute the query and return the result
        return $builder->get()->getResultArray();
    }
    
    public function countAllBlogs()
    {
        return $this->builder('blog')->countAllResults();
    }
    
    public function countFilteredBlogs($search, $start_date = null, $end_date = null)
    {
        $builder = $this->builder('blog');
    
        // Add search conditions
        if (!empty($search)) {
            $builder->like('name', $search)
                    ->orLike('title', $search)
                    ->orLike('category_for', $search);
        }
    
        // Add date filter if provided
        if (!empty($start_date) && !empty($end_date)) {
            $builder->where('date >=', $start_date)
                    ->where('date <=', $end_date);
        }
    
        // Return the count of filtered results
        return $builder->countAllResults();
    }
    

}
?>