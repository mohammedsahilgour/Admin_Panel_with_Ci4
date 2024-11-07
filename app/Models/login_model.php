<?php

namespace App\Models;

use CodeIgniter\Model;

class login_model extends Model
{
    protected $table = 'form';
    protected $protectFields = false;
    protected $allowedfield = ['name','email'];
    
    public function insert_blog( $blogdata ){

        // print_r( $blogdata );
        // die;
        $this->db->table('blog')->insert($blogdata );
        // echo "done";
        // die;
        
    }
   
}

?>