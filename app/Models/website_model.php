<?php

namespace App\Models;

use CodeIgniter\Model;

class website_model extends Model
{
    protected $table = 'form';
    protected $protectFields = false;
    protected $allowedfield = ['name','email'];
    

    public function get_blog_data(){
        // $id =  session('id');
        $query = $this->db->query("SELECT * FROM blog ");

        return  $result = $query->getResult();
        
    }

    public function contact_us( $data){
        $insert = $this->db->table('contactus')->insert($data);
        return $insert;

    }

    public function get_news_data(){
        $query = $this->db->query("SELECT * FROM news ");

        return  $result = $query->getResult();
    }
}
?>