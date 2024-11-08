<?php

namespace App\Models;

use CodeIgniter\Model;

class login_model extends Model
{
    protected $table = 'form';
    protected $protectFields = false;
    protected $allowedfield = ['name','email'];
    
    public function insert_blog( $blogdata ){

        $this->db->table('blog')->insert($blogdata );
        
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
      'title'=>$data['title'],'gender'=>$data['gender'],'description'=>$data['description'],'number'=>$data['number']])->update();
 
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
}
?>